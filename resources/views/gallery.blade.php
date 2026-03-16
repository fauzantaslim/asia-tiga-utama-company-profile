@extends('layouts.app')

@section('title', 'Galeri - Profil Perusahaan')
@section('description', 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami')
@section('keywords', 'galeri, foto, gambar, momen')

@section('content')
    <!-- Gallery Header Section -->
    <section class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden group">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 bg-[#0B2F23]">
            <picture>
                <source srcset="{{ asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                <img src="{{ asset('images/placeholders/no-image-placeholder.svg') }}"
                     alt="Background Galeri" 
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
                            Galeri
                        </li>
                    </ol>
                </nav>

                <div data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="text-4xl md:text-5xl lg:text-5xl xl:text-6xl font-bold mb-4 text-white leading-tight font-serif" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                        Galeri
                    </h1>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <p class="text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed">
                        Menangkap momen-momen yang mendefinisikan perjalanan kami
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Content Section -->
    <section class="py-24 bg-[#FFE08F]" x-data="{ lightbox: false, currentImage: '' }">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Cerita Visual</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 bg-[#060771] bg-clip-text text-transparent">
                    Galeri
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Jelajahi koleksi momen-momen berkesan kami</p>


            </div>

            <div id="gallery-posts-container">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @forelse($galleryImages as $index => $image)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 50 }}" data-aos-duration="800"
                        class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl cursor-pointer"
                        style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);" x-data="{ imageHover: false }"
                        @mouseenter="imageHover = true" @mouseleave="imageHover = false"
                        @click="lightbox = true; currentImage = '{{ $image->getFirstMedia('image') ? $image->getFirstMedia('image')->getUrl('preview') : 'https://via.placeholder.com/500x300' }}'">
                        <picture>
                            <source
                                srcset="{{ $image->getFirstMedia('image') ? $image->getFirstMedia('image')->getUrl('webp') : 'https://via.placeholder.com/500x300.webp' }}"
                                type="image/webp">
                            <img src="{{ $image->getFirstMedia('image') ? $image->getFirstMedia('image')->getUrl('preview') : 'https://via.placeholder.com/500x300' }}"
                                alt="{{ $image->caption ?? 'Gallery Image' }}" class="w-full h-64 object-cover"
                                style="transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);"
                                :style="imageHover ? 'transform: scale(1.1) rotate(2deg)' : 'transform: scale(1) rotate(0deg)'">
                        </picture>

                        <!-- Overlay with Icon -->
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent flex items-center justify-center"
                            style="transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1);"
                            :style="imageHover ? 'opacity: 1' : 'opacity: 0'">
                            <i class="fas fa-search-plus text-white text-3xl"
                                style="transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);"
                                :style="imageHover ? 'transform: scale(1) rotate(0deg)' : 'transform: scale(0) rotate(-180deg)'"></i>
                        </div>

                        @if ($image->caption)
                            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent"
                                style="transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);"
                                :style="imageHover ? 'transform: translateY(0)' : 'transform: translateY(100%)'">
                                <p class="text-white text-sm font-medium">{{ $image->caption }}</p>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-4 text-center py-12" data-aos="fade-up">
                        <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">Tidak ada gambar galeri yang tersedia saat ini.</p>
                    </div>
                @endforelse
                </div>
                <!-- Pagination -->
                @if ($galleryImages->hasPages())
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
                                            <option value="8" {{ request('per_page', 8) == 8 ? 'selected' : '' }}>8</option>
                                            <option value="16" {{ request('per_page') == 16 ? 'selected' : '' }}>16</option>
                                            <option value="32" {{ request('per_page') == 32 ? 'selected' : '' }}>32</option>
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
                                    <span>dari total <span class="font-bold text-gray-800">{{ $galleryImages->total() }}</span></span>
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
                                                @for ($i = 1; $i <= $galleryImages->lastPage(); $i++)
                                                    { number: {{ $i }}, url: '{{ $galleryImages->url($i) }}', selected: {{ $galleryImages->currentPage() == $i ? 'true' : 'false' }} }{{ $i < $galleryImages->lastPage() ? ',' : '' }}
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
                                                @for ($i = 1; $i <= $galleryImages->lastPage(); $i++)
                                                    <option value="{{ $galleryImages->url($i) }}" {{ $galleryImages->currentPage() == $i ? 'selected' : '' }}>{{ $i }}</option>
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
                                    <span>dari <span class="font-bold text-gray-800">{{ $galleryImages->lastPage() }}</span></span>
                                </div>
                                <div class="flex items-center gap-4">
                                    @if ($galleryImages->onFirstPage())
                                        <span class="text-gray-300 px-1 cursor-not-allowed">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                    @else
                                        <a href="{{ $galleryImages->previousPageUrl() }}" class="ajax-page-link text-gray-500 hover:text-[#060771] px-1 transition-colors">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    @endif
                                    
                                    <!-- Vertical Divider b/w arrows -->
                                    <div class="h-4 w-px bg-gray-200"></div>

                                    @if ($galleryImages->hasMorePages())
                                        <a href="{{ $galleryImages->nextPageUrl() }}" class="ajax-page-link text-[#060771] hover:text-green-800 font-bold px-1 transition-colors">
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

        <!-- Lightbox Modal -->
        <div x-show="lightbox" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="lightbox = false"
            class="fixed inset-0 bg-black/90 backdrop-blur-sm z-50 flex items-center justify-center p-4"
            style="display: none;">
            <button @click="lightbox = false"
                class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300 transition-colors">
                <i class="fas fa-times"></i>
            </button>
            <div class="max-w-5xl w-full" @click.stop>
                <picture>
                    <source :src="currentImage.replace('/preview', '/webp')" type="image/webp">
                    <img :src="currentImage" class="w-full rounded-2xl shadow-2xl">
                </picture>
            </div>
        </div>
    </section>


@endsection
