@extends('layouts.app')

@section('title', 'Galeri - Profil Perusahaan')
@section('description', 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami')
@section('keywords', 'galeri, foto, gambar, momen')

@section('content')
    <!-- Gallery Header Section -->
    <section class="relative py-24 overflow-hidden bg-[#BF1A1A]">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-300 opacity-10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div data-aos="fade-down" data-aos-duration="1000">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-white leading-tight">
                    Galeri
                </h1>
            </div>

            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <p class="text-xl md:text-2xl mb-10 text-white/90 max-w-3xl mx-auto leading-relaxed">
                    Menangkap momen-momen yang mendefinisikan perjalanan kami
                </p>
            </div>
        </div>
    </section>

    <!-- Gallery Content Section -->
    <section class="py-24 bg-[#FFE08F]" x-data="{ lightbox: false, currentImage: '' }">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Cerita Visual</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 bg-[#060771] bg-clip-text text-transparent">
                    Galeri
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Jelajahi koleksi momen-momen berkesan kami</p>

                <!-- See all gallery link -->
                <div class="mt-6">
                    <a href="{{ route('gallery') }}"
                        class="inline-flex items-center text-[#BF1A1A] font-semibold hover:text-[#FF6C0C] gap-2">
                        Lihat Semua Galeri
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

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
