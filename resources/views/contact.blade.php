@extends('layouts.app')

@section('title', 'Hubungi Kami - Profil Perusahaan')
@section('description', 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi')
@section('keywords', 'kontak, hubungi, dukungan, kolaborasi')

@section('content')
    <!-- Contact Header Section -->
    <section class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden group">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 bg-white">
            <picture>
                <source srcset="{{ isset($about) && $about->getFirstMedia('image') ? $about->getFirstMedia('image')->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                <img src="{{ isset($about) && $about->getFirstMedia('image') ? $about->getFirstMedia('image')->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                     alt="Background Hubungi Kami" 
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
                            Hubungi Kami
                        </li>
                    </ol>
                </nav>

                <div data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="text-4xl md:text-5xl lg:text-5xl xl:text-6xl font-bold mb-4 text-white leading-tight font-serif" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                        Hubungi Kami
                    </h1>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <p class="text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed">
                        Kami ingin mendengar dari Anda. Hubungi kami hari ini!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Content Section -->
    <section class="py-24 bg-[#FFE08F]">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Mari Terhubung</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                    Hubungi Kami
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Punya pertanyaan atau ingin bekerja sama dengan kami?
                    Hubungi kami!</p>
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
                    <p class="text-gray-600 leading-relaxed">
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
        </div>
    </section>


@endsection
