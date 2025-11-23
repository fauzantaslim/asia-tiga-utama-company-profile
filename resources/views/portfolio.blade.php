@extends('layouts.app')

@section('title', 'Portofolio Kami - Profil Perusahaan')
@section('description', 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami')
@section('keywords', 'portofolio, proyek, pencapaian, pekerjaan')

@section('content')
    <!-- Portfolio Header Section -->
    <section class="relative py-24 overflow-hidden bg-[#BF1A1A]">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-300 opacity-10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div data-aos="fade-down" data-aos-duration="1000">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-white leading-tight">
                    Portofolio Kami
                </h1>
            </div>

            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <p class="text-xl md:text-2xl mb-10 text-white/90 max-w-3xl mx-auto leading-relaxed">
                    Menampilkan proyek-proyek terbaik dan pencapaian kami
                </p>
            </div>
        </div>
    </section>

    <!-- Portfolio Content Section -->
    <section class="py-24 bg-white" x-data="{ selectedPortfolio: null }">
        <div class="container mx-auto px-4 ">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Pekerjaan Kami</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                    Portofolio Kami
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Jelajahi proyek-proyek sukses dan pencapaian kami</p>
            </div>

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
                <div class="mt-12 flex justify-center">
                    <div class="flex items-center space-x-2">
                        {{ $portfolios->links('vendor.pagination.tailwind-custom') }}
                    </div>
                </div>
            @endif
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
    </section>

@endsection
