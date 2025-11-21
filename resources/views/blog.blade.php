@extends('layouts.app')

@section('title', 'Blog - Profil Perusahaan')
@section('description', 'Tetap terupdate dengan berita dan wawasan terbaru kami')
@section('keywords', 'blog, berita, update perusahaan, wawasan')

@section('content')
    <!-- Blog Header Section -->
    <section class="relative py-24 overflow-hidden bg-[#BF1A1A]">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-300 opacity-10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div data-aos="fade-down" data-aos-duration="1000">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-white leading-tight">
                    Blog Kami
                </h1>
            </div>

            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <p class="text-xl md:text-2xl mb-10 text-white/90 max-w-3xl mx-auto leading-relaxed">
                    Tetap terupdate dengan berita terbaru, wawasan, dan tren industri kami
                </p>
            </div>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Update Terbaru</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                    Postingan Blog
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Temukan pemikiran, berita, dan wawasan industri kami</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($blogPosts as $index => $post)
                    <article data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000"
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl border border-gray-100"
                        style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                        <div class="relative overflow-hidden" style="aspect-ratio: 1.618/1;">
                            <img src="{{ $post->getFirstMedia('image') ? $post->getFirstMedia('image')->getUrl() : 'https://via.placeholder.com/500x300' }}"
                                alt="{{ $post->title }}" class="w-full h-full object-cover"
                                style="transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);">

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
                                style="transition: color 0.3s cubic-bezier(0.4, 0, 0.2, 1);">
                                {{ $post->title }}
                            </h3>
                            <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">
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
                    <div class="col-span-3 text-center py-12 bg-[#FFE08F]">

                        <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">Tidak ada postingan blog yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($blogPosts->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="flex items-center space-x-2">
                        {{ $blogPosts->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
