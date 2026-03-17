@extends('layouts.app')

@section('title', 'Tentang Kami - Profil Perusahaan')
@section('description', 'Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami')
@section('keywords', 'tentang, perusahaan, visi, misi')

@section('content')
    <!-- About Header Section -->
    <section class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden group">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 bg-[#0B2F23]">
            <picture>
                <source srcset="{{ isset($about) && $about->getFirstMedia('image') ? $about->getFirstMedia('image')->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                <img src="{{ isset($about) && $about->getFirstMedia('image') ? $about->getFirstMedia('image')->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                     alt="Background Tentang Kami" 
                     class="absolute inset-0 w-full h-full object-cover opacity-20 mix-blend-luminosity">
            </picture>

            <!-- Gradient to ensure readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#060771]/90 via-[#060771]/70 to-transparent z-10"></div>
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
                            Tentang Kami
                        </li>
                    </ol>
                </nav>

                <div data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="text-4xl md:text-5xl lg:text-5xl xl:text-6xl font-bold mb-4 text-white leading-tight font-serif" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                        Tentang Kami
                    </h1>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <p class="text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed">
                        Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right" data-aos-duration="1000">
                    <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Siapa Kami</span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 mt-3 text-[#060771]">
                        Cerita Kami
                    </h2>
                    <div class="text-gray-700 text-lg leading-relaxed mb-6 text-justify">
                        {{ isset($about->description) ? $about->description : 'Kami adalah perusahaan profesional yang berdedikasi untuk menyediakan layanan berkualitas kepada klien kami. Dengan bertahun-tahun pengalaman di industri ini, kami telah membangun reputasi kuat dalam hal keunggulan dan kepuasan pelanggan.' }}
                    </div>

                    <!-- Download Company Profile Button -->
                    @if(isset($companyInfo) && $companyInfo->hasMedia('company_profile'))
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ $companyInfo->getFirstMediaUrl('company_profile') }}"
                            class="inline-flex items-center px-6 py-3 bg-[#060771] text-white font-semibold rounded-lg shadow-lg hover:bg-[#040550] transition-all duration-300 transform hover:-translate-y-1"
                            download="Company_Profile_Asia_Tiga_Utama.pdf"
                            target="_blank">
                            <i class="fas fa-file-pdf mr-2"></i>
                            Unduh Profil Perusahaan
                            <i class="fas fa-download ml-2"></i>
                        </a>
                        <button type="button" 
                                onclick="document.getElementById('flipbook-section').scrollIntoView({behavior: 'smooth'})"
                                class="inline-flex items-center px-6 py-3 bg-white text-[#060771] border-2 border-[#060771] font-semibold rounded-lg shadow-lg hover:bg-gray-50 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-book-open mr-2"></i>
                            Baca Online
                        </button>
                    </div>
                    @endif
                </div>

                <div data-aos="fade-left" data-aos-duration="1000" class="relative">
                    <!-- Image with decorative elements -->
                    <div class="relative">
                        <div
                            class="absolute -top-6 -left-6 w-full h-full bg-gradient-to-br from-[#FFE08F] to-[#060771] rounded-2xl -z-10">
                        </div>
                        <picture>
                            <source
                                srcset="{{ $about && $about->getFirstMedia('image') ? $about->getFirstMedia('image')->getUrl('webp') : 'https://via.placeholder.com/500x300.webp' }}"
                                type="image/webp">
                            <img loading="lazy" src="{{ $about && $about->getFirstMedia('image') ? $about->getFirstMedia('image')->getUrl('preview') : 'https://via.placeholder.com/500x300' }}"
                                alt="{{ isset($about->title) ? $about->title : 'About Our Company' }}"
                                class="rounded-2xl shadow-2xl w-full object-cover" style="aspect-ratio: 1.618/1;">
                        </picture>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission Cards -->
            <div class="grid md:grid-cols-2 gap-8 mt-20">
                <div data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000"
                    class="group relative overflow-hidden bg-[#060771] p-10 rounded-3xl shadow-xl hover:bg-[#040550] transition-all duration-300 transform hover:-translate-y-1">
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
                    class="group relative overflow-hidden bg-[#060771] p-10 rounded-3xl shadow-xl hover:bg-[#040550] transition-all duration-300 transform hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-bullseye text-white text-3xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-4 text-white">Misi Kami</h3>
                        <div class="text-white/90 text-lg leading-relaxed text-justify prose prose-invert max-w-none">
                            {!! isset($about->mission) ? $about->mission : 'Memberikan layanan luar biasa yang melampaui ekspektasi klien kami sambil mempertahankan standar tertinggi integritas dan profesionalisme.' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    @if(isset($companyInfo) && $companyInfo->hasMedia('company_profile'))
    <!-- Flipbook Section -->
    <section id="flipbook-section" class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Pratinjau Dokumen</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-3 text-[#060771]">
                    Profil Perusahaan
                </h2>
                <p class="text-gray-600 mt-4">Baca dokumen profil perusahaan kami secara interaktif langsung dari browser Anda.</p>
            </div>
            
            <div class="flex justify-center flex-col items-center max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                <!-- Loading Indicator -->
                <div id="flipbook-loading" class="text-center py-16 bg-white w-full rounded-2xl shadow-xl border border-gray-100 flex flex-col items-center justify-center">
                    <i class="fas fa-circle-notch fa-spin fa-3x text-[#060771] mb-6"></i>
                    <p class="text-lg text-gray-700 font-medium">Mempersiapkan dokumen interaktif...</p>
                    <p class="text-sm text-gray-500 mt-2">Halaman sedang dimuat</p>
                </div>

                <!-- Flipbook Container -->
                <div class="w-full relative flex justify-center mt-8">
                    <div id="flipbook-container" class="hidden w-full max-w-[1000px] flex justify-center" data-pdf-url="{{ $companyInfo->getFirstMediaUrl('company_profile') }}">
                        <!-- Flipbook will be injected here -->
                    </div>
                </div>
                
                <!-- Controls -->
                <div id="flipbook-controls" class="mt-12 items-center justify-center space-x-6 hidden bg-white px-8 py-4 rounded-full shadow-lg border border-gray-100">
                    <button id="btn-prev" class="w-10 h-10 flex items-center justify-center bg-gray-100 text-[#060771] rounded-full hover:bg-[#060771] hover:text-white transition-colors focus:outline-none">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="text-gray-800 font-bold min-w-[120px] text-center">
                        <span id="page-current" class="text-[#060771]">1</span> <span class="text-gray-400 font-normal mx-1">/</span> <span id="page-total">-</span>
                    </span>
                    <button id="btn-next" class="w-10 h-10 flex items-center justify-center bg-gray-100 text-[#060771] rounded-full hover:bg-[#060771] hover:text-white transition-colors focus:outline-none">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <!-- Small reminder to click on sides -->
                    <span class="text-xs text-gray-500 hidden md:block ml-4 italic">atau klik/geser ujung halaman</span>
                </div>
            </div>
        </div>
    </section>
    @endif

@endsection
