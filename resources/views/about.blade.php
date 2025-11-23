@extends('layouts.app')

@section('title', 'Tentang Kami - Profil Perusahaan')
@section('description', 'Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami')
@section('keywords', 'tentang, perusahaan, visi, misi')

@section('content')
    <!-- About Header Section -->
    <section class="relative py-24 overflow-hidden bg-[#BF1A1A]">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-300 opacity-10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div data-aos="fade-down" data-aos-duration="1000">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-white leading-tight">
                    Tentang Kami
                </h1>
            </div>

            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <p class="text-xl md:text-2xl mb-10 text-white/90 max-w-3xl mx-auto leading-relaxed">
                    Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami
                </p>
            </div>
        </div>
    </section>

    <!-- About Content Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
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
                    <div class="mt-8">
                        <a href="{{ asset('storage/company-profile.pdf') }}"
                            class="inline-flex items-center px-6 py-3 bg-[#060771] text-white font-semibold rounded-lg shadow-lg hover:bg-[#040550] transition-all duration-300 transform hover:-translate-y-1"
                            download>
                            <i class="fas fa-file-pdf mr-2"></i>
                            Unduh Profil Perusahaan
                            <i class="fas fa-download ml-2"></i>
                        </a>
                    </div>
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
                            <img src="{{ $about && $about->getFirstMedia('image') ? $about->getFirstMedia('image')->getUrl('preview') : 'https://via.placeholder.com/500x300' }}"
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
                        <p class="text-white/90 text-lg leading-relaxed text-justify">
                            {{ isset($about->vision) ? $about->vision : 'Menjadi perusahaan terkemuka di industri kami, dikenal karena inovasi, kualitas, dan kepuasan pelanggan.' }}
                        </p>
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
                        <p class="text-white/90 text-lg leading-relaxed text-justify">
                            {{ isset($about->mission) ? $about->mission : 'Memberikan layanan luar biasa yang melampaui ekspektasi klien kami sambil mempertahankan standar tertinggi integritas dan profesionalisme.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
