@extends('layouts.app')

@section('title', 'Portofolio Kami - Profil Perusahaan')
@section('description', 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami')
@section('keywords', 'portofolio, proyek, pencapaian, pekerjaan')

@section('content')
    <!-- Portfolio Header Section -->
    <section class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden group">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 bg-[#0B2F23]">
            <picture>
                <source srcset="{{ asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                <img src="{{ asset('images/placeholders/no-image-placeholder.svg') }}"
                     alt="Background Portofolio" 
                     class="absolute inset-0 w-full h-full object-cover opacity-20 mix-blend-luminosity">
            </picture>

            <!-- Gradient to ensure readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#060771]/90 via-[#060771]/70 to-[#060771]/50 z-10"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-20">
            <div class="max-w-7xl mx-auto">
                <nav aria-label="Breadcrumb" class="mb-6 flex" data-aos="fade-in" data-aos-duration="1000">
                    <ol class="inline-flex items-center space-x-2 text-sm font-medium">
                        <li>
                            <a href="{{ route('home') }}" class="text-[#BF1A1A] font-bold transition-colors">Beranda</a>
                        </li>
                        <li>
                            <i class="fas fa-chevron-right text-xs mx-1 text-white text-[10px]"></i>
                        </li>
                        <li class="text-white font-bold opacity-90">
                            Portofolio Kami
                        </li>
                    </ol>
                </nav>

                <div data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="text-4xl md:text-5xl lg:text-5xl xl:text-6xl font-bold mb-4 text-white leading-tight font-serif" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                        Portofolio Kami
                    </h1>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <p class="text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed">
                        Menampilkan proyek-proyek terbaik dan pencapaian kami
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Content Section -->
    <section class="py-24 bg-white" x-data="{ selectedPortfolio: null }">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Pekerjaan Kami</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                    Portofolio Kami
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Jelajahi proyek-proyek sukses dan pencapaian kami</p>
            </div>

            <div id="portfolio-posts-container">
                <div class="grid md:grid-cols-3 gap-8">
                @forelse($portfolios as $index => $portfolio)
                    <div data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000"
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl border border-gray-100"
                        style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);"
                        @click="selectedPortfolio = {{ json_encode($portfolio) }}">
                        <div class="relative overflow-hidden" style="aspect-ratio: 1.618/1;">
                            <picture>
                                <source
                                    srcset="{{ $portfolio->getFirstMedia('image') ? $portfolio->getFirstMedia('image')->getUrl('webp') : 'https://via.placeholder.com/500x300.webp' }}"
                                    type="image/webp">
                                <img src="{{ $portfolio->getFirstMedia('image') ? $portfolio->getFirstMedia('image')->getUrl('preview') : 'https://via.placeholder.com/500x300' }}"
                                    alt="{{ $portfolio->title }}" class="w-full h-full object-cover cursor-pointer"
                                    style="transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);">
                            </picture>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-gray-800"
                                style="transition: color 0.3s cubic-bezier(0.4, 0, 0.2, 1);">
                                {{ $portfolio->title }}</h3>
                            <p class="text-gray-600 leading-relaxed text-justify line-clamp-3">
                                {{ Str::limit($portfolio->description, 100) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12" data-aos="fade-up">
                        <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">Tidak ada item portofolio yang tersedia saat ini.</p>
                    </div>
                @endforelse
                </div>

                <!-- Pagination -->
                @if ($portfolios->hasPages())
                    <div class="mt-8">
                        <div class="border-t border-b border-gray-100 py-3 flex flex-wrap items-center justify-between text-[14px] text-gray-600 relative">
                            <!-- Green Top Border Line -->
                            <div class="absolute top-0 left-0 w-full h-[2px] bg-[#060771]"></div>
                            
                            <!-- Left Side -->
                            <div class="flex items-center gap-4 mb-4 md:mb-0 w-full md:w-auto justify-between md:justify-start">
                                <div class="flex items-center gap-2">
                                    <span>Tampilkan</span>
                                    <div class="relative">
                                        <select class="ajax-limit-select appearance-none border border-gray-200 rounded px-3 py-1.5 pr-8 text-gray-700 focus:outline-none bg-transparent">
                                            <option value="6" {{ request('per_page', 6) == 6 ? 'selected' : '' }}>6</option>
                                            <option value="12" {{ request('per_page') == 12 ? 'selected' : '' }}>12</option>
                                            <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#060771]">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    <span>Item</span>
                                </div>
                                <!-- Vertical Divider -->
                                <div class="hidden md:block h-6 w-px bg-gray-200"></div>
                                <div class="text-right md:text-left">
                                    <span>dari total <span class="font-bold text-gray-800">{{ $portfolios->total() }}</span></span>
                                </div>
                            </div>

                            <!-- Right Side -->
                            <div class="flex items-center justify-between md:justify-end gap-2 md:gap-4 w-full md:w-auto">
                                <div class="flex items-center gap-2 border-r border-gray-200 pr-4">
                                    <span>Halaman</span>
                                        <div class="relative" x-data="{
                                            open: false,
                                            search: '',
                                            pages: [
                                                @for ($i = 1; $i <= $portfolios->lastPage(); $i++)
                                                    { number: {{ $i }}, url: '{{ $portfolios->url($i) }}', selected: {{ $portfolios->currentPage() == $i ? 'true' : 'false' }} }{{ $i < $portfolios->lastPage() ? ',' : '' }}
                                                @endfor
                                            ],
                                            get filteredPages() {
                                                if (this.search === '') return this.pages;
                                                return this.pages.filter(p => p.number.toString().includes(this.search));
                                            },
                                            selectPage(url) {
                                                this.open = false;
                                                let selectEl = this.$refs.pageSelect;
                                                if (selectEl) {
                                                    selectEl.value = url;
                                                    selectEl.dispatchEvent(new Event('change', { bubbles: true }));
                                                }
                                            }
                                        }" @click.away="open = false">
                                            
                                            <!-- Hidden select to keep existing JS logic working -->
                                            <select x-ref="pageSelect" class="ajax-page-select hidden">
                                                @for ($i = 1; $i <= $portfolios->lastPage(); $i++)
                                                    <option value="{{ $portfolios->url($i) }}" {{ $portfolios->currentPage() == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>

                                            <!-- Dropdown Trigger -->
                                            <button type="button" @click="open = !open" class="appearance-none border border-[#f5c63d] rounded px-3 py-1.5 pr-8 text-gray-700 bg-transparent focus:outline-none font-medium min-w-[70px] text-left relative flex items-center">
                                                <span x-text="pages.find(p => p.selected)?.number || 1"></span>
                                                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-[#060771]">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                </div>
                                            </button>

                                            <!-- Dropdown Content -->
                                            <div x-show="open" style="display: none;" 
                                                 x-transition:enter="transition ease-out duration-100"
                                                 x-transition:enter-start="transform opacity-0 scale-95"
                                                 x-transition:enter-end="transform opacity-100 scale-100"
                                                 x-transition:leave="transition ease-in duration-75"
                                                 x-transition:leave-start="transform opacity-100 scale-100"
                                                 x-transition:leave-end="transform opacity-0 scale-95"
                                                 class="absolute z-50 mb-1 bottom-full left-1/2 -translate-x-1/2 w-48 bg-white border border-gray-200 rounded-lg shadow-xl overflow-hidden flex flex-col">
                                                <!-- Search Input -->
                                                <div class="p-2 border-b border-gray-100 bg-white">
                                                    <div class="relative">
                                                        <span class="absolute inset-y-0 left-0 flex items-center pl-2.5 text-gray-400">
                                                            <i class="fas fa-search text-[12px]"></i>
                                                        </span>
                                                        <input type="text" x-model="search" @click.stop 
                                                               class="w-full border border-gray-300 rounded px-2 pl-8 py-1.5 text-sm focus:outline-none focus:border-[#f5c63d] focus:ring-1 focus:ring-[#f5c63d] transition-colors" 
                                                               placeholder="Cari halaman...">
                                                    </div>
                                                </div>
                                                <!-- Page List -->
                                                <ul class="max-h-56 overflow-y-auto style-scrollbar py-1">
                                                    <template x-for="page in filteredPages" :key="page.number">
                                                        <li>
                                                            <button type="button" @click="selectPage(page.url)" 
                                                                    class="w-full text-left px-4 py-2 text-sm hover:bg-gray-50 transition-colors"
                                                                    :class="{ 'bg-[#f5c63d]/10 text-[#060771] font-bold': page.selected, 'text-gray-700': !page.selected }">
                                                                <span x-text="page.number"></span>
                                                            </button>
                                                        </li>
                                                    </template>
                                                    <li x-show="filteredPages.length === 0" class="px-4 py-3 text-xs text-gray-500 text-center">
                                                        Halaman tidak ditemukan
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <span>dari <span class="font-bold text-gray-800">{{ $portfolios->lastPage() }}</span></span>
                                </div>
                                <div class="flex items-center gap-4">
                                    @if ($portfolios->onFirstPage())
                                        <span class="text-gray-300 px-1 cursor-not-allowed">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                    @else
                                        <a href="{{ $portfolios->previousPageUrl() }}" class="ajax-page-link text-gray-500 hover:text-[#060771] px-1 transition-colors">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    @endif
                                    
                                    <!-- Vertical Divider b/w arrows -->
                                    <div class="h-4 w-px bg-gray-200"></div>

                                    @if ($portfolios->hasMorePages())
                                        <a href="{{ $portfolios->nextPageUrl() }}" class="ajax-page-link text-[#060771] hover:text-green-800 font-bold px-1 transition-colors">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    @else
                                        <span class="text-gray-300 px-1 cursor-not-allowed">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Portfolio Detail Modal -->
        <div x-show="selectedPortfolio" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="selectedPortfolio = null"
            class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4"
            style="display: none;">
            <div class="max-w-4xl w-full bg-white rounded-2xl shadow-2xl overflow-hidden" @click.stop>
                <div class="relative">
                    <button @click="selectedPortfolio = null"
                        class="absolute top-4 right-4 bg-white/80 backdrop-blur-sm text-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-white transition-all z-10">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="w-full h-96">
                        <picture>
                            <source
                                :src="selectedPortfolio?.getFirstMedia('image') ? selectedPortfolio.getFirstMedia('image')
                                    .getUrl('webp') : 'https://via.placeholder.com/800x600.webp'"
                                type="image/webp">
                            <img :src="selectedPortfolio?.getFirstMedia('image') ? selectedPortfolio.getFirstMedia('image').getUrl(
                                'preview') : 'https://via.placeholder.com/800x600'"
                                class="w-full h-full object-cover">
                        </picture>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-3xl font-bold mb-4 text-[#060771]" x-text="selectedPortfolio?.title"></h3>
                    <div class="prose max-w-none" x-html="selectedPortfolio?.description"></div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection

@push('styles')
<style>
    .style-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .style-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    .style-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1; 
        border-radius: 6px;
    }
    .style-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8; 
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('turbo:load', function() {
        // AJAX Pagination Logic
        const container = document.getElementById('portfolio-posts-container');
        if (container) {
            function loadPosts(url) {
                container.style.opacity = '0.5';
                container.style.pointerEvents = 'none';

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newContainer = doc.getElementById('portfolio-posts-container');
                    
                    if (newContainer) {
                        container.innerHTML = newContainer.innerHTML;
                        window.history.pushState({path: url}, '', url);
                        
                        // Smooth scroll
                        const yOffset = -100; 
                        const y = container.getBoundingClientRect().top + window.pageYOffset + yOffset;
                        window.scrollTo({top: y, behavior: 'smooth'});

                        // Re-initialize AOS
                        if (typeof window.AOS !== 'undefined') {
                            setTimeout(() => window.AOS.refreshHard(), 100);
                        }
                    }
                    
                    container.style.opacity = '1';
                    container.style.pointerEvents = 'auto';
                })
                .catch(error => {
                    console.error('Error loading posts:', error);
                    container.style.opacity = '1';
                    container.style.pointerEvents = 'auto';
                });
            }

            container.addEventListener('click', function(e) {
                const link = e.target.closest('.ajax-page-link');
                if (link) {
                    e.preventDefault();
                    if(link.getAttribute('href')) {
                        loadPosts(link.href);
                    }
                }
            });

            container.addEventListener('change', function(e) {
                if (e.target.classList.contains('ajax-limit-select')) {
                    const url = new URL(window.location.href);
                    url.searchParams.set('per_page', e.target.value);
                    url.searchParams.set('page', 1);
                    loadPosts(url.toString());
                } else if (e.target.classList.contains('ajax-page-select')) {
                    loadPosts(e.target.value);
                }
            });
        }
    });
</script>
@endpush
