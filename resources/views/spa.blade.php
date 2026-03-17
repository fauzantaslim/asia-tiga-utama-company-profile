@extends('layouts.app')

@section('title', isset($companyInfo->meta_title) ? $companyInfo->meta_title : 'Company Profile')
@section('description',
    isset($companyInfo->meta_description)
    ? $companyInfo->meta_description
    : 'Profil Perusahaan
    resmi kami')
@section('keywords',
    isset($companyInfo->meta_keywords)
    ? $companyInfo->meta_keywords
    : 'profil perusahaan, jasa,
    layanan')

@section('content')
    <!-- Hero Section with Parallax & Gradient -->
    <section id="hero" class="relative h-screen overflow-hidden bg-[#BF1A1A]" x-data="{ visible: true }">
        <!-- Swiper Background -->
        <div class="hero-background-swiper absolute inset-0 z-0">
            <div class="swiper-wrapper">
                <!-- Check if we have hero records -->
                @if (isset($hero) && $hero->isNotEmpty())
                    <!-- Loop through each hero record -->
                    @foreach ($hero as $heroItem)
                        <!-- Check if this hero item has background images -->
                        @if ($heroItem->getMedia('background_image')->count() > 0)
                            <!-- Loop through each background image of this hero item -->
                            @foreach ($heroItem->getMedia('background_image') as $image)
                                <div class="swiper-slide">
                                    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                                        style="background-image: url('{{ $image->getUrl() }}');">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                @endif

                <!-- Default backgrounds if no hero images exist -->
                @php
                    $hasHeroImages = false;
                    if (isset($hero) && $hero->isNotEmpty()) {
                        foreach ($hero as $heroItem) {
                            if ($heroItem->getMedia('background_image')->count() > 0) {
                                $hasHeroImages = true;
                                break;
                            }
                        }
                    }
                @endphp
                @if (!$hasHeroImages)
                    <div class="swiper-slide">
                        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                            style="background-image: url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1950&q=80');">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-[#060771]/80 via-[#BF1A1A]/60 to-[#FFE08F]/50">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                            style="background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1950&q=80');">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-[#060771]/80 via-[#BF1A1A]/60 to-[#FFE08F]/50">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Add Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10 h-full flex flex-col justify-center">
            <div class="max-w-7xl mx-auto">
                <div data-aos="fade-down" data-aos-duration="1000">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 text-white leading-tight">
                        {{ isset($hero) && $hero->isNotEmpty() && isset($hero->first()->title) ? $hero->first()->title : 'Welcome to Our Company' }}
                    </h1>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <p class="text-xl md:text-2xl mb-10 text-white/90 max-w-3xl mx-auto leading-relaxed">
                        {{ isset($hero) && $hero->isNotEmpty() && isset($hero->first()->subtitle) ? $hero->first()->subtitle : 'We provide excellent services for your business needs' }}
                    </p>
                </div>

                <div data-aos="zoom-in" data-aos-delay="400" data-aos-duration="1000">
                    <a href="#contact"
                        class="inline-block bg-white text-[#060771] px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-white/30 hover:scale-105">
                        {{ isset($hero) && $hero->isNotEmpty() && isset($hero->first()->button_text) ? $hero->first()->button_text : 'Get Started' }}
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce" data-aos="fade-up"
            data-aos-delay="800">
            <i class="fas fa-chevron-down text-white text-3xl opacity-70"></i>
        </div>
    </section>

    <!-- About Us and Vision Mission Section with Golden Ratio Layout -->
    <section id="about" class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- About Section -->
            <div class="grid md:grid-cols-2 gap-16 items-center mb-24">
                <div data-aos="fade-right" data-aos-duration="1000">
                    <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Siapa Kami</span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 mt-3 text-[#060771]">
                        Tentang Kami
                    </h2>
                    <div class="text-gray-700 text-lg leading-relaxed mb-6 line-clamp-3 text-justify">
                        {{ isset($about->description) ? $about->description : 'Kami adalah perusahaan profesional yang berdedikasi untuk menyediakan layanan berkualitas kepada klien kami. Dengan bertahun-tahun pengalaman di industri ini, kami telah membangun reputasi kuat dalam hal keunggulan dan kepuasan pelanggan.' }}
                    </div>
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center text-[#BF1A1A] font-semibold hover:text-[#FF6C0C] gap-2 mb-6">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right"></i>
                    </a>

                    <!-- Stats Counter with Alpine.js -->
                    <div class="grid grid-cols-3 gap-6 mt-8" x-data="{
                        stats: [
                            { value: 0, target: 100, label: 'Projects', suffix: '+' },
                            { value: 0, target: 50, label: 'Clients', suffix: '+' },
                            { value: 0, target: 15, label: 'Years', suffix: '+' }
                        ],
                        animated: false,
                        animateCounter(stat) {
                            const duration = 2000; // 2 seconds
                            const startTime = Date.now();
                            const startValue = 0;

                            const animate = () => {
                                const currentTime = Date.now();
                                const elapsed = currentTime - startTime;
                                const progress = Math.min(elapsed / duration, 1);

                                // Easing function for smooth animation
                                const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                                stat.value = Math.floor(startValue + (stat.target - startValue) * easeOutQuart);

                                if (progress < 1) {
                                    requestAnimationFrame(animate);
                                } else {
                                    stat.value = stat.target;
                                }
                            };

                            requestAnimationFrame(animate);
                        },
                        init() {
                            // Trigger animation when element is visible
                            const observer = new IntersectionObserver((entries) => {
                                entries.forEach(entry => {
                                    if (entry.isIntersecting && !this.animated) {
                                        this.animated = true;
                                        this.stats.forEach(stat => {
                                            this.animateCounter(stat);
                                        });
                                    }
                                });
                            }, { threshold: 0.5 });

                            observer.observe(this.$el);
                        }
                    }">
                        <template x-for="(stat, index) in stats" :key="index">
                            <div class="text-center p-4 bg-[#FFE08F] rounded-xl" data-aos="zoom-in"
                                :data-aos-delay="(index + 1) * 100">
                                <div class="text-3xl font-bold text-[#BF1A1A]">
                                    <span x-text="Math.floor(stat.value)"></span><span x-text="stat.suffix"></span>
                                </div>
                                <div class="text-sm text-[#060771] mt-1" x-text="stat.label"></div>
                            </div>
                        </template>
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-duration="1000" class="relative">
                    <!-- Image with decorative elements -->
                    <div class="relative">
                        <div
                            class="absolute -top-6 -left-6 w-full h-full bg-gradient-to-br from-[#FFE08F] to-[#060771] rounded-2xl -z-10">
                        </div>
                        @php $aboutMedia = ($about && $about->getFirstMedia('image')) ? $about->getFirstMedia('image') : null; @endphp
                        <picture>
                            <source
                                srcset="{{ $aboutMedia ? $aboutMedia->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                type="image/webp">
                            <img src="{{ $aboutMedia ? $aboutMedia->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                alt="{{ isset($about->title) ? $about->title : 'About Our Company' }}"
                                class="rounded-2xl shadow-2xl w-full object-cover" style="aspect-ratio: 1.618/1;">
                        </picture>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission Cards -->
            <div class="grid md:grid-cols-2 gap-8">
                <div data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000"
                    class="group relative overflow-hidden bg-[#060771] p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-eye text-white text-3xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-4 text-white">Visi Kami</h3>
                        <div class="text-white/90 text-lg leading-relaxed text-justify prose prose-invert max-w-none">
                            {!! isset($about->vision) ? $about->vision : 'Menjadi perusahaan terkemuka di industri kami, dikenal karena inovasi, kualitas, dan kepuasan pelanggan.' !!}
                        </div>
                    </div>
                </div>

                <div data-aos="flip-right" data-aos-delay="200" data-aos-duration="1000"
                    class="group relative overflow-hidden bg-[#060771] p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-bullseye text-white text-3xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-4 text-white">Misi Kami</h3>
                        <div class="text-white text-lg leading-relaxed text-justify prose prose-invert max-w-none">
                            {!! isset($about->mission) ? $about->mission : 'Memberikan layanan luar biasa yang melampaui ekspektasi klien kami sambil mempertahankan standar tertinggi integritas dan profesionalisme.' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </section>

    <!-- Services Section with Horizontal Scroll -->
    <section id="services" class="py-24 bg-[#FFE08F]" x-data="{ scrollPosition: 0 }">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <div>
                    <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Apa Yang Kami
                        Tawarkan</span>
                    <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                        Layanan Kami
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl text-justify mx-auto">Solusi komprehensif yang disesuaikan
                        dengan
                        kebutuhan
                        bisnis Anda
                    </p>
                </div>
            </div>

            <div class="relative">
                <!-- Scroll buttons -->
                <button @click="$refs.servicesContainer.scrollBy({ left: -300, behavior: 'smooth' })"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-[#060771] w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button @click="$refs.servicesContainer.scrollBy({ left: 300, behavior: 'smooth' })"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-[#060771] w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Services container with horizontal scroll -->
                <div x-ref="servicesContainer" class="flex overflow-x-auto gap-8 pb-4 scrollbar-hide"
                    style="scroll-behavior: smooth;">
                    @forelse($services as $index => $service)
                        <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000"
                            x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false"
                            class="flex-shrink-0 w-80 group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100 relative overflow-hidden"
                            style="transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);">

                            <!-- Gradient overlay on hover -->
                            <div class="absolute inset-0 bg-gradient-to-br from-[#FFE08F] to-[#060771] rounded-2xl"
                                style="opacity: 0; transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);"
                                :style="hovered ? 'opacity: 1' : 'opacity: 0'">
                            </div>

                            <div class="relative z-10">
                                <div class="text-5xl mb-6 text-[#BF1A1A]"
                                    style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);"
                                    :style="hovered ? 'color: white; transform: scale(1.1) rotate(5deg)' : 'color: #BF1A1A'">
                                    @if (isset($service->icon))
                                        {!! $service->icon !!}
                                    @else
                                        <i class="fas fa-cogs"></i>
                                    @endif
                                </div>
                                <h3 class="text-2xl font-bold mb-4 text-[#060771]"
                                    style="transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);"
                                    :style="hovered ? 'color: white' : 'color: #060771'">{{ $service->title }}</h3>
                                <p class="leading-relaxed text-justify line-clamp-3"
                                    style="transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);"
                                    :style="hovered ? 'color: rgba(255, 255, 255, 0.9)' : 'color: #4b5563'"
                                    title="{{ $service->description }}">
                                    {{ $service->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12" data-aos="fade-up">
                            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg">Tidak ada layanan yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        </div>

        <!-- See all services link -->
        <div class="text-center mt-8" data-aos="fade-up">
            <a href="{{ route('services') }}"
                class="inline-block bg-white text-[#060771] px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-white/30 hover:scale-105">
                Lihat Semua
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Portfolio Section with Horizontal Scroll -->
    <section id="portfolio" class="py-24 bg-white" x-data="{ selectedPortfolio: null }">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <div>
                    <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Pekerjaan Kami</span>
                    <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                        Portofolio Kami
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Menampilkan proyek-proyek terbaik dan pencapaian
                        kami
                    </p>
                </div>
            </div>

            <div class="relative">
                <!-- Scroll buttons -->
                <button @click="$refs.portfolioContainer.scrollBy({ left: -300, behavior: 'smooth' })"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-[#060771] w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button @click="$refs.portfolioContainer.scrollBy({ left: 300, behavior: 'smooth' })"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-[#060771] w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Portfolio container with horizontal scroll -->
                <div x-ref="portfolioContainer" class="flex overflow-x-auto gap-8 pb-4 scrollbar-hide"
                    style="scroll-behavior: smooth;">
                    @forelse($portfolios as $index => $portfolio)
                        @php
                            $portfolioImage = $portfolio->getFirstMedia('image');
                            $portfolioData = $portfolio->toArray();
                            $portfolioData['image_url'] = $portfolioImage ? $portfolioImage->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg');
                            $portfolioData['image_webp_url'] = $portfolioImage ? $portfolioImage->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg');
                        @endphp
                        <div data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000"
                            class="flex-shrink-0 w-80 group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl border border-gray-100"
                            style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);"
                            @click='selectedPortfolio = @json($portfolioData)'>
                            <div class="relative overflow-hidden" style="aspect-ratio: 1.618/1;">
                                <picture>
                                    <source
                                        srcset="{{ $portfolio->getFirstMedia('image') ? $portfolio->getFirstMedia('image')->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                        type="image/webp">
                                    <img src="{{ $portfolio->getFirstMedia('image') ? $portfolio->getFirstMedia('image')->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                        alt="{{ $portfolio->title }}" class="w-full h-full object-cover cursor-pointer"
                                        style="transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);">
                                </picture>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2 text-[#060771]"
                                    style="transition: color 0.3s cubic-bezier(0.4, 0, 0.2, 1);"
                                    title="{{ $portfolio->title }}">
                                    {{ $portfolio->title }}</h3>
                                <p class="text-gray-600 leading-relaxed text-justify line-clamp-3"
                                    title="{{ $portfolio->description }}">
                                    {{ Str::limit($portfolio->description, 100) }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12" data-aos="fade-up">
                            <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg">Tidak ada item portofolio yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
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
                            <source :src="selectedPortfolio?.image_webp_url" type="image/webp">
                            <img :src="selectedPortfolio?.image_url" class="w-full h-full object-cover">
                        </picture>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-3xl font-bold mb-4 text-[#060771]" x-text="selectedPortfolio?.title"></h3>
                    <div class="prose max-w-none" x-html="selectedPortfolio?.description"></div>
                </div>
            </div>
        </div>
        <!-- See all portfolio link -->
        <div class="text-center mt-8" data-aos="fade-up">
            <a href="{{ route('portfolio') }}"
                class="inline-block bg-white text-[#060771] px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-white/30 hover:scale-105">
                Lihat Semua
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Gallery Section with Horizontal Scroll -->
    <section id="gallery" class="py-24 bg-[#FFE08F]" x-data="{ lightbox: false, currentImage: '' }">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <div>
                    <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Cerita Visual</span>
                    <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                        Galeri
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Menangkap momen-momen yang mendefinisikan perjalanan
                        kami</p>
                </div>
            </div>

            <div class="relative">
                <!-- Scroll buttons -->
                <button @click="$refs.galleryContainer.scrollBy({ left: -300, behavior: 'smooth' })"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-[#060771] w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button @click="$refs.galleryContainer.scrollBy({ left: 300, behavior: 'smooth' })"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-[#060771] w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Gallery container with horizontal scroll -->
                <div x-ref="galleryContainer" class="flex overflow-x-auto gap-4 pb-4 scrollbar-hide"
                    style="scroll-behavior: smooth;">
                    @forelse($galleryImages as $index => $image)
                        <div data-aos="fade-up" data-aos-delay="{{ $index * 50 }}" data-aos-duration="800"
                            class="flex-shrink-0 w-80 group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl cursor-pointer"
                            style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);" x-data="{ imageHover: false }"
                            @mouseenter="imageHover = true" @mouseleave="imageHover = false">
                            <a href="{{ $image->getFirstMedia('image') ? $image->getFirstMedia('image')->getUrl() : asset('images/placeholders/no-image-placeholder.svg') }}"
                               data-fancybox="gallery"
                               data-caption="{{ $image->caption ?? '' }}"
                               class="block w-full h-full">
                                <picture>
                                    <source
                                        srcset="{{ $image->getFirstMedia('image') ? $image->getFirstMedia('image')->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                        type="image/webp">
                                    <img src="{{ $image->getFirstMedia('image') ? $image->getFirstMedia('image')->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                        alt="{{ $image->caption ?? 'Gallery Image' }}" class="w-full h-64 object-cover"
                                        style="transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);"
                                        :style="imageHover ? 'transform: scale(1.1) rotate(2deg)' :
                                            'transform: scale(1) rotate(0deg)'">
                                </picture>

                            <!-- Overlay with Icon -->
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent flex items-center justify-center"
                                style="transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1);"
                                :style="imageHover ? 'opacity: 1' : 'opacity: 0'">
                                <i class="fas fa-search-plus text-white text-3xl"
                                    style="transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);"
                                    :style="imageHover ? 'transform: scale(1) rotate(0deg)' :
                                        'transform: scale(0) rotate(-180deg)'"></i>
                            </div>

                            @if ($image->caption)
                                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"
                                    style="transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);"
                                    :style="imageHover ? 'transform: translateY(0)' : 'transform: translateY(100%)'">
                                    <p class="text-white text-sm font-medium" title="{{ $image->caption }}">
                                        {{ $image->caption }}</p>
                                </div>
                            @endif
                            </a>
                        </div>
                    @empty
                        <div class="text-center py-12" data-aos="fade-up">
                            <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg">Tidak ada gambar galeri yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        </div>

        <!-- See all gallery link -->
        <div class="text-center mt-8" data-aos="fade-up">
            <a href="{{ route('gallery') }}"
                class="inline-block bg-white text-[#060771] px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-white/30 hover:scale-105">
                Lihat Semua
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Blog Section with Horizontal Scroll -->
    <section id="blog" class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <div>
                    <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Wawasan & Update</span>
                    <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                        Postingan Blog Terbaru
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Tetap terupdate dengan blog dan wawasan terbaru
                        kami
                    </p>
                </div>
            </div>

            <div class="relative">
                <!-- Scroll buttons -->
                <button @click="$refs.blogContainer.scrollBy({ left: -300, behavior: 'smooth' })"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-[#060771] w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button @click="$refs.blogContainer.scrollBy({ left: 300, behavior: 'smooth' })"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-[#060771] w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Blog container with horizontal scroll -->
                <div x-ref="blogContainer" class="flex overflow-x-auto gap-8 pb-4 scrollbar-hide"
                    style="scroll-behavior: smooth;">
                    @forelse($blogPosts as $index => $post)
                        <article data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000"
                            class="flex-shrink-0 w-80 group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl border border-gray-100"
                            style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                            <div class="relative overflow-hidden" style="aspect-ratio: 1.618/1;">
                                <picture>
                                    <source
                                        srcset="{{ $post->getFirstMedia('image') ? $post->getFirstMedia('image')->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                        type="image/webp">
                                    <img src="{{ $post->getFirstMedia('image') ? $post->getFirstMedia('image')->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                        alt="{{ $post->title }}" class="w-full h-full object-cover"
                                        style="transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);">
                                </picture>

                                <!-- Date Badge -->
                                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg"
                                    style="transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                                    <span class="text-sm font-bold text-[#060771]">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ $post->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-3 text-[#060771] line-clamp-2"
                                    style="transition: color 0.3s cubic-bezier(0.4, 0, 0.2, 1);"
                                    title="{{ $post->title }}">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3 text-justify">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>

                                <a href="{{ route('blog.detail', $post->slug) }}"
                                    class="inline-flex items-center text-[#BF1A1A] font-semibold hover:text-[#FF6C0C] gap-2"
                                    style="transition: gap 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);">
                                    Baca Selengkapnya
                                    <i class="fas fa-arrow-right"
                                        style="transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);"></i>
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-12" data-aos="fade-up">
                            <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 text-lg">Tidak ada postingan blog yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        </div>
        </div>

        <!-- See all blog posts link -->
        <div class="text-center mt-8" data-aos="fade-up">
            <a href="{{ route('blog.index') }}"
                class="inline-block bg-white text-[#060771] px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-white/30 hover:scale-105">
                Lihat Semua
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Contact and Maps Section -->
    <section id="contact" class="py-24 bg-[#FFE08F]">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Mari Terhubung</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                    Hubungi Kami
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Kami ingin mendengar dari Anda. Hubungi kami hari ini!
                </p>
            </div>

            <!-- Contact Information Cards -->
            <div class="grid md:grid-cols-3 gap-8 mb-20">
                <!-- Address Card -->
                <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                    class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl group"
                    style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                    <div class="w-16 h-16 bg-[#060771] rounded-2xl flex items-center justify-center mb-6 shadow-lg"
                        style="transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-xl mb-3 text-[#060771]">Alamat Kami</h4>
                    <p class="text-gray-600 leading-relaxed ">
                        {{ isset($companyInfo->address) ? $companyInfo->address : '123 Business Street, City, Country' }}
                    </p>
                </div>

                <!-- Phone Card -->
                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000"
                    class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl group"
                    style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                    <div class="w-16 h-16 bg-[#25D366] rounded-2xl flex items-center justify-center mb-6 shadow-lg"
                        style="transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-xl mb-3 text-[#060771]">Nomor Telepon</h4>
                    <p class="text-gray-600 leading-relaxed">
                        {{ isset($companyInfo->phone) ? $companyInfo->phone : '+1 234 567 890' }}
                    </p>
                </div>

                <!-- Email Card -->
                <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000"
                    class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl group"
                    style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                    <div class="w-16 h-16 bg-[#060771] rounded-2xl flex items-center justify-center mb-6 shadow-lg"
                        style="transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-xl mb-3 text-[#060771]">Alamat Email</h4>
                    <p class="text-gray-600 leading-relaxed break-all">
                        {{ isset($companyInfo->email) ? $companyInfo->email : 'info@company.com' }}
                    </p>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="1000">
                <h3 class="text-2xl font-bold mb-6 text-[#060771]">Ikuti Kami di Media Sosial</h3>
                <div class="flex justify-center gap-6 flex-wrap">
                    @if (isset($companyInfo->instagram))
                        <a href="{{ $companyInfo->instagram }}" target="_blank" data-aos="zoom-in" data-aos-delay="100"
                            class="group flex flex-col items-center">
                            <div
                                class="w-16 h-16 bg-[#FF6C0C] rounded-2xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-[#FF6C0C] mb-2">
                                <i class="fab fa-instagram text-2xl"></i>
                            </div>
                            <span
                                class="text-sm text-gray-600 group-hover:text-[#FF6C0C] transition-colors">Instagram</span>
                        </a>
                    @endif
                    @if (isset($companyInfo->facebook))
                        <a href="{{ $companyInfo->facebook }}" target="_blank" data-aos="zoom-in" data-aos-delay="200"
                            class="group flex flex-col items-center">
                            <div
                                class="w-16 h-16 bg-[#060771] rounded-2xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-[#060771] mb-2">
                                <i class="fab fa-facebook text-2xl"></i>
                            </div>
                            <span class="text-sm text-gray-600 group-hover:text-blue-600 transition-colors">Facebook</span>
                        </a>
                    @endif
                    @if (isset($companyInfo->youtube))
                        <a href="{{ $companyInfo->youtube }}" target="_blank" data-aos="zoom-in" data-aos-delay="300"
                            class="group flex flex-col items-center">
                            <div
                                class="w-16 h-16 bg-[#BF1A1A] rounded-2xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-[#BF1A1A] mb-2">
                                <i class="fab fa-youtube text-2xl"></i>
                            </div>
                            <span class="text-sm text-gray-600 group-hover:text-[#BF1A1A] transition-colors">YouTube</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Google Maps -->
            <div data-aos="fade-up" data-aos-duration="1000">
                <h3 class="text-3xl font-bold text-center mb-8 text-[#060771]">Temukan Kami Di Sini</h3>
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                    @if (isset($companyInfo->google_map_embed_link))
                        <div class="w-full relative" style="aspect-ratio: 2.4/1;">
                            <div class="absolute inset-0">
                                {!! str_replace(
                                    ['<iframe', 'iframe>'],
                                    ['<iframe class="w-full h-full border-0"', 'iframe>'],
                                    $companyInfo->google_map_embed_link,
                                ) !!}
                            </div>
                        </div>
                    @else
                        <div class="bg-gradient-to-br from-gray-100 to-gray-200 border-2 border-dashed border-gray-300 rounded-3xl w-full flex items-center justify-center"
                            style="aspect-ratio: 2.4/1;">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt text-6xl text-gray-400 mb-4"></i>
                                <span class="text-gray-500 text-lg font-semibold">Google Map Embed</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>



@endsection

@section('scripts')
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
@endsection
