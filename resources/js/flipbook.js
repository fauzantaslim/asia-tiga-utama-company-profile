import { PageFlip } from 'page-flip';
import * as pdfjsLib from 'pdfjs-dist';
// Explicitly import worker
import pdfWorker from 'pdfjs-dist/build/pdf.worker.mjs?url';

pdfjsLib.GlobalWorkerOptions.workerSrc = pdfWorker;

export async function initFlipbook(container, pdfUrl) {
    const loadingEl = document.getElementById('flipbook-loading');
    const controlsEl = document.getElementById('flipbook-controls');
    
    // Clear previously rendered content to avoid duplicates from turbo cache
    container.innerHTML = '';

    try {
        const loadingTask = pdfjsLib.getDocument({
            url: pdfUrl,
            disableAutoFetch: true,
            disableStream: true,
            disableRange: true
        });
        const pdf = await loadingTask.promise;
        const numPages = pdf.numPages;

        document.getElementById('page-total').textContent = numPages;

        const bookEl = document.createElement('div');
        bookEl.className = 'flipbook';
        container.appendChild(bookEl);

        // Render first page to get target width and height
        const page1 = await pdf.getPage(1);
        const viewport1 = page1.getViewport({ scale: 1 });
        let targetWidth = viewport1.width;
        let targetHeight = viewport1.height;
        
        let scale = 1.5; // Scale for better image quality
        let maxCanvasWidth = viewport1.width * scale;
        let maxCanvasHeight = viewport1.height * scale;

        // Create page elements first
        for (let pageNum = 1; pageNum <= numPages; pageNum++) {
            const pageEl = document.createElement('div');
            // Adding a subtle gradient or border so pages look distinct
            pageEl.className = 'page relative bg-white overflow-hidden flex items-center justify-center border-l border-gray-100';
            
            const canvas = document.createElement('canvas');
            canvas.className = 'max-w-full max-h-full object-contain';
            canvas.width = maxCanvasWidth;
            canvas.height = maxCanvasHeight;
            
            pageEl.appendChild(canvas);
            bookEl.appendChild(pageEl);

            // Fetch and render the page on the canvas async
            pdf.getPage(pageNum).then(page => {
                const viewport = page.getViewport({ scale: maxCanvasWidth / page.getViewport({scale: 1}).width });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderContext = {
                    canvasContext: canvas.getContext('2d'),
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }

        // Hide loading indicator
        loadingEl.style.display = 'none';
        container.classList.remove('hidden');
        controlsEl.classList.remove('hidden');
        controlsEl.classList.add('flex');

        // Initialize PageFlip
        const pageFlip = new PageFlip(bookEl, {
            width: targetWidth, 
            height: targetHeight,
            size: 'stretch', // stretch allows using min/max constraints
            minWidth: 300,
            maxWidth: targetWidth,
            minHeight: 400,
            maxHeight: targetHeight,
            maxShadowOpacity: 0.5,
            showCover: true,
            mobileScrollSupport: true,
            usePortrait: true
        });

        pageFlip.loadFromHTML(bookEl.querySelectorAll('.page'));

        document.getElementById('btn-prev').addEventListener('click', () => {
            pageFlip.flipPrev();
        });

        document.getElementById('btn-next').addEventListener('click', () => {
            pageFlip.flipNext();
        });

        pageFlip.on('flip', (e) => {
            document.getElementById('page-current').textContent = e.data + 1;
        });

    } catch (error) {
        console.error('Error loading PDF flipbook:', error);
        loadingEl.style.display = '';
        container.classList.add('hidden');
        controlsEl.classList.remove('flex');
        controlsEl.classList.add('hidden');
        loadingEl.className = 'text-center p-8 bg-red-50 rounded-2xl w-full border border-red-100 shadow-sm mt-8';
        loadingEl.innerHTML = `
            <i class="fas fa-exclamation-triangle text-red-500 fa-3x mb-4"></i>
            <p class="text-red-700 font-bold text-lg mb-2">Gagal Memuat Pratinjau Dokumen</p>
            <p class="text-red-500 mt-2">Terjadi kesalahan teknis saat merender dokumen PDF interaktif: ${error.message}</p>
            <a href="${pdfUrl}" target="_blank" class="inline-flex items-center mt-6 px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition shadow">
                Buka Dokumen PDF Secara Langsung <i class="fas fa-external-link-alt ml-2"></i>
            </a>`;
    }
}
