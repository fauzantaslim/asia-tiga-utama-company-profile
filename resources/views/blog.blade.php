@extends('layouts.app')

@section('title', 'Blog - Profil Perusahaan')
@section('description', 'Tetap terupdate dengan blog dan wawasan terbaru kami')
@section('keywords', 'blog, blog, update perusahaan, wawasan')



@push('styles')
<style>
    .blog-hero-swiper .swiper-slide-active img {
        transform: scale(1.05);
        transition: transform 10s ease;
    }
    
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

@section('content')
    <!-- Blog Hero Swiper Section -->
    <section class="relative w-full h-[600px] md:h-[700px] overflow-hidden group">
        <div class="swiper blog-hero-swiper w-full h-full">
            <div class="swiper-wrapper">
                @foreach($latestPosts as $index => $post)
                @php
                    $imageHero = $post->getFirstMedia('image');
                @endphp
                <div class="swiper-slide relative w-full h-full flex items-end">
                    <div class="absolute inset-0 bg-gray-900">
                        @if($imageHero)
                            <img src="{{ $imageHero->getUrl('preview') }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-60">
                        @else
                            <img src="{{ asset('images/placeholders/no-image-placeholder.svg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-60">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-r from-[#060771]/90 via-[#060771]/70 to-transparent"></div>
                    </div>
                    
                    <div class="relative z-10 w-full pt-8 pb-8 md:pb-16">
                        <div class="container mx-auto px-4 lg:px-8">
                            <div class="max-w-7xl mx-auto">
                            <div class="w-full lg:w-3/4 xl:w-2/3" data-aos="fade-in" data-aos-duration="1000">
                                <nav aria-label="Breadcrumb" class="mb-6 flex">
                                    <ol class="inline-flex items-center space-x-2 text-sm text-blue-400 font-medium">
                                        <li>
                                            <a href="{{ route('home') }}" class="text-[#BF1A1A] font-bold">Beranda</a>
                                        </li>
                                        <li>
                                            <i class="fas fa-chevron-right text-xs mx-1 text-white text-[10px]"></i>
                                        </li>
                                        <li class="text-white font-bold opacity-90">
                                            Blog
                                        </li>
                                    </ol>
                                </nav>

                                <div class="mb-4">
                                    <h1 class="text-4xl md:text-5xl lg:text-5xl xl:text-6xl font-bold mb-6 text-white leading-tight font-serif" style="text-shadow: 0 4px 6px rgba(0,0,0,0.5);">
                                        {{ $post->title }}
                                    </h1>
                                </div>

                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-300 mb-8 opacity-90 font-medium">
                                    <div class="flex items-center">
                                        <i class="far fa-calendar-alt mr-2"></i>
                                        {{ \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('l, d F Y') }}
                                    </div>
                                    <span class="hidden md:inline">|</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-pen-nib mr-2"></i>
                                        Penulis: {{ $post->author ?? 'Admin Asia Tiga Utama' }}
                                    </div>
                                </div>

                                <a href="{{ route('blog.detail', $post->slug) }}" class="inline-flex items-center justify-center px-6 py-3 border border-gray-400 text-white hover:bg-white hover:text-black transition-all duration-300 rounded-lg text-sm font-semibold group backdrop-blur-sm">
                                    Baca Selengkapnya
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="absolute bottom-8 md:bottom-32 right-0 left-0 z-20 pointer-events-none">
                <div class="container mx-auto px-4 lg:px-8">
                    <div class="max-w-7xl mx-auto flex justify-end">
                        <div class="flex items-center gap-4 backdrop-blur-md bg-black/30 px-5 py-2.5 rounded-full border border-white/20 text-white pointer-events-auto">
                            <button class="blog-swiper-prev w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/20 transition-colors focus:outline-none">
                                <i class="fas fa-chevron-left text-sm"></i>
                            </button>
                            <div class="blog-swiper-pagination-fraction text-sm font-bold min-w-[60px] text-center tracking-widest"></div>
                            <button class="blog-swiper-next w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/20 transition-colors focus:outline-none">
                                <i class="fas fa-chevron-right text-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Update Terbaru</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                    Postingan Blog
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Temukan pemikiran, blog, dan wawasan industri kami</p>


            </div>

            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                <!-- Main Content (Left Side) -->
                <div class="w-full lg:w-8/12" id="blog-posts-container">
                    <div class="flex flex-col gap-8">
                        @if($blogPosts->isNotEmpty())
                            @php
                                $firstPost = $blogPosts->first();
                                $firstImage = $firstPost->getFirstMedia('image');
                            @endphp
                            <!-- Featured First Post -->
                            <article data-aos="fade-up" data-aos-duration="1000" class="relative rounded-2xl overflow-hidden shadow-lg group w-full h-[400px] md:h-[450px]">
                                <picture>
                                    <source srcset="{{ $firstImage ? $firstImage->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                                    <img loading="lazy" src="{{ $firstImage ? $firstImage->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}" 
                                         alt="{{ $firstPost->title }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                </picture>
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-r from-[#060771]/90 via-[#060771]/70 to-transparent"></div>
                                
                                <div class="absolute z-10 inset-0 flex flex-col justify-end p-6 md:p-8">
                                    <h3 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-4 leading-tight  transition-colors" style="text-shadow: 0 2px 4px rgba(0,0,0,0.5);">
                                        {{ $firstPost->title }}
                                    </h3>
                                    <div class="flex flex-wrap items-center text-sm text-gray-300 gap-3 mb-6 font-medium">
                                        <div class="flex items-center gap-1.5" style="text-shadow: 0 1px 3px rgba(0,0,0,0.5);">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($firstPost->created_at)->locale('id')->translatedFormat('l, d F Y') }}
                                        </div>
                                        <span class="hidden md:inline text-gray-400">|</span>
                                        <div class="flex items-center gap-1.5" style="text-shadow: 0 1px 3px rgba(0,0,0,0.5);">
                                            <i class="fas fa-pen-nib"></i>
                                            Penulis: {{ $firstPost->author ?? 'Asia Tiga Utama' }}
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('blog.detail', $firstPost->slug) }}" class="inline-flex items-center justify-center px-6 py-2.5 border border-gray-400 hover:border-white text-white hover:bg-white hover:text-black transition-all duration-300 rounded-lg text-sm font-semibold backdrop-blur-sm">
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </article>

                            <!-- Remaining Posts Grid -->
                            @if($blogPosts->count() > 1)
                                <div class="flex flex-col gap-8 mt-6">
                                    @foreach($blogPosts as $index => $post)
                                        @if($index === 0) @continue @endif
                                        @php
                                            $image = $post->getFirstMedia('image');
                                        @endphp
                                        <article data-aos="fade-up" data-aos-delay="{{ ($index - 1) * 100 }}" data-aos-duration="1000"
                                            class="group flex flex-col sm:flex-row gap-6 items-start pb-8">
                                            
                                            <!-- Image -->
                                            <div class="w-full sm:w-[280px] lg:w-[320px] flex-shrink-0">
                                                <div class="relative overflow-hidden rounded-xl aspect-[16/10]">
                                                    <picture>
                                                        <source
                                                            srcset="{{ $image ? $image->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                                            type="image/webp">
                                                        <img loading="lazy" src="{{ $image ? $image->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                                            alt="{{ $post->title }}" class="w-full h-full object-cover"
                                                            style="transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);">
                                                    </picture>
                                                </div>
                                            </div>

                                            <!-- Content -->
                                            <div class="flex-1 min-w-0 pt-2">
                                                <a href="{{ route('blog.detail', $post->slug) }}" class="block mb-2">
                                                    <h3 class="text-xl md:text-2xl font-medium text-[#060771] hover:text-[#BF1A1A] transition-colors leading-snug line-clamp-2">
                                                        {{ $post->title }}
                                                    </h3>
                                                    <p class="text-gray-600 text-sm mt-2 line-clamp-4">
                                                        {{ strip_tags($post->content) }}
                                                    </p>
                                                </a>
                                                <div class="text-gray-500 text-[14px]">
                                                    <span>{{ \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F Y') }}</span>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div class="text-center py-12 bg-[#FFE08F] rounded-2xl w-full">
                                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">Tidak ada postingan blog yang tersedia saat ini.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Pagination -->
                    @if ($blogPosts->total() > 0)
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
                                                <option value="5" {{ request('per_page', 5) == 5 ? 'selected' : '' }}>5</option>
                                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
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
                                        <span>dari total <span class="font-bold text-gray-800">{{ $blogPosts->total() }}</span></span>
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
                                                @for ($i = 1; $i <= $blogPosts->lastPage(); $i++)
                                                    { number: {{ $i }}, url: '{{ $blogPosts->url($i) }}', selected: {{ $blogPosts->currentPage() == $i ? 'true' : 'false' }} }{{ $i < $blogPosts->lastPage() ? ',' : '' }}
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
                                                @for ($i = 1; $i <= $blogPosts->lastPage(); $i++)
                                                    <option value="{{ $blogPosts->url($i) }}" {{ $blogPosts->currentPage() == $i ? 'selected' : '' }}>{{ $i }}</option>
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
                                        <span>dari <span class="font-bold text-gray-800">{{ $blogPosts->lastPage() }}</span></span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        @if ($blogPosts->onFirstPage())
                                            <span class="text-gray-300 px-1 cursor-not-allowed">
                                                <i class="fas fa-chevron-left"></i>
                                            </span>
                                        @else
                                            <a href="{{ $blogPosts->previousPageUrl() }}" class="ajax-page-link text-gray-500 hover:text-[#060771] px-1 transition-colors">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        @endif
                                        
                                        <!-- Vertical Divider b/w arrows -->
                                        <div class="h-4 w-px bg-gray-200"></div>

                                        @if ($blogPosts->hasMorePages())
                                            <a href="{{ $blogPosts->nextPageUrl() }}" class="ajax-page-link text-[#060771] hover:text-green-800 font-bold px-1 transition-colors">
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

                <!-- Sidebar (Right Side) -->
                <div class="w-full lg:w-4/12 flex flex-col gap-12 mt-12 lg:mt-0">
                    <!-- Terbaru Sidebar Widget -->
                    <div data-aos="fade-up" data-aos-duration="1000">
                        <div class="mb-6 border-b border-gray-200 pb-2 relative">
                            <h3 class="text-xl font-bold text-[#060771] uppercase inline-block m-0">
                                blog <span class="text-gray-500">TERBARU</span>
                            </h3>
                            <div class="absolute -bottom-[1px] left-0 w-full h-[1px] bg-gray-200"></div>
                            <div class="absolute -bottom-[2px] left-0 w-16 h-[3px] bg-[#BF1A1A]"></div>
                        </div>

                        <div class="flex flex-col gap-6">
                            @forelse($latestPosts as $sidebarPost)
                            @php
                                $sidebarImage = $sidebarPost->getFirstMedia('image');
                            @endphp
                            <a href="{{ route('blog.detail', $sidebarPost->slug) }}" class="group flex space-x-4 items-start pb-6 border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors rounded-lg p-2 -ml-2">
                                <div class="w-24 h-24 flex-shrink-0 overflow-hidden bg-gray-100 rounded-2xl">
                                    <picture>
                                        <source srcset="{{ $sidebarImage ? $sidebarImage->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                                        <img loading="lazy" src="{{ $sidebarImage ? $sidebarImage->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                            alt="{{ $sidebarPost->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 rounded-2xl">
                                    </picture>
                                </div>

                                <div class="flex-1 min-w-0 flex flex-col justify-between h-24 py-1">
                                    <h4 class="text-[15px] font-bold text-[#060771] group-hover:text-[#BF1A1A] transition-colors leading-snug mb-2 line-clamp-2">
                                        {{ $sidebarPost->title }}
                                    </h4>
                                    <div class="flex items-center text-gray-500 text-[12px] gap-1">
                                        <span>{{ \Carbon\Carbon::parse($sidebarPost->created_at)->locale('id')->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="text-center py-8 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                <i class="fas fa-newspaper text-3xl text-gray-300 mb-2"></i>
                                <p class="text-gray-500 text-sm">Belum ada blog terbaru.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Terpopuler Sidebar Widget -->
                    <div class="sticky top-28" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="mb-6 border-b border-gray-200 pb-2 relative">
                            <h3 class="text-xl font-bold text-[#060771] uppercase inline-block m-0">
                                blog <span class="text-gray-500">TERPOPULER</span>
                            </h3>
                            <div class="absolute -bottom-[1px] left-0 w-full h-[1px] bg-gray-200"></div>
                            <div class="absolute -bottom-[2px] left-0 w-16 h-[3px] bg-[#BF1A1A]"></div>
                        </div>

                        <div class="flex flex-col gap-4">
                            @forelse($popularPosts as $index => $popularPost)
                            <a href="{{ route('blog.detail', $popularPost->slug) }}" class="group flex space-x-4 items-start pb-4 border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors rounded-lg p-2 -ml-2">
                                <div class="text-4xl font-extrabold text-gray-200 group-hover:text-[#060771] transition-colors w-8 text-center" style="font-family: serif; line-height: 1;">
                                    {{ $index + 1 }}
                                </div>
                                <div class="flex-1 min-w-0 pt-1">
                                    <h4 class="text-[14px] font-bold text-[#060771] group-hover:text-[#BF1A1A] transition-colors leading-snug mb-1 line-clamp-2">
                                        {{ $popularPost->title }}
                                    </h4>
                                    <div class="text-gray-500 text-[12px]">
                                        {{ \Carbon\Carbon::parse($popularPost->created_at)->locale('id')->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="text-center py-8 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                <p class="text-gray-500 text-sm">Belum ada blog terpopuler.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


@endsection

@push('scripts')
<script>
    document.addEventListener('turbo:load', function() {
        if(document.querySelector('.blog-hero-swiper')) {
            const blogHeroSwiper = new window.Swiper('.blog-hero-swiper', {
                modules: [window.SwiperModules.Autoplay, window.SwiperModules.EffectFade, window.SwiperModules.Navigation, window.SwiperModules.Pagination],
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.blog-swiper-next',
                    prevEl: '.blog-swiper-prev',
                },
                pagination: {
                    el: '.blog-swiper-pagination-fraction',
                    type: 'fraction',
                    renderFraction: function (currentClass, totalClass) {
                        return '<span class="' + currentClass + '"></span>' +
                               ' dari ' +
                               '<span class="' + totalClass + '"></span>';
                    }
                },
            });
        }

        // AJAX Pagination Logic (Tanpa jQuery)
        const container = document.getElementById('blog-posts-container');
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
                    const newContainer = doc.getElementById('blog-posts-container');
                    
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
