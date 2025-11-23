@extends('layouts.app')

@section('title', 'Hubungi Kami - Profil Perusahaan')
@section('description', 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi')
@section('keywords', 'kontak, hubungi, dukungan, kolaborasi')

@section('content')
    <!-- Contact Header Section -->
    <section class="relative py-24 overflow-hidden bg-[#BF1A1A]">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-300 opacity-10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div data-aos="fade-down" data-aos-duration="1000">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-white leading-tight">
                    Hubungi Kami
                </h1>
            </div>

            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <p class="text-xl md:text-2xl mb-10 text-white/90 max-w-3xl mx-auto leading-relaxed">
                    Kami ingin mendengar dari Anda. Hubungi kami hari ini!
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Content Section -->
    <section class="py-24 bg-[#FFE08F]">
        <div class="container mx-auto px-4">
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
    </section>


@endsection
