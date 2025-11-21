@extends('layouts.app')

@section('title', $post->meta_title ?? $post->title)
@section('description', $post->meta_description ?? Str::limit(strip_tags($post->content), 160))
@section('keywords', $post->meta_keywords ?? 'blog, article, news')
@section('og-image', $post->getFirstMedia('image') ? $post->getFirstMedia('image')->getUrl() :
    'https://via.placeholder.com/1200x630.png')

@section('content')
    <!-- Blog Detail Header -->
    <section class="relative py-24 overflow-hidden bg-[#BF1A1A]">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-300 opacity-10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div data-aos="fade-down" data-aos-duration="1000">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white leading-tight">
                    {{ $post->title }}
                </h1>
            </div>

            <div class="flex justify-center items-center space-x-6 mb-10" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="1000">
                <div class="flex items-center text-white/90">
                    <i class="far fa-calendar-alt mr-2"></i>
                    <span>{{ $post->created_at->format('F d, Y') }}</span>
                </div>
                <div class="flex items-center text-white/90">
                    <i class="far fa-clock mr-2"></i>
                    <span>{{ $post->reading_time ?? '5 min read' }}</span>
                </div>
                <div class="flex items-center text-white/90">
                    <i class="far fa-user mr-2"></i>
                    <span>{{ $post->author ?? 'Admin' }}</span>
                </div>
            </div>

            <div data-aos="zoom-in" data-aos-delay="400" data-aos-duration="1000">
                <a href="{{ route('blog.index') }}"
                    class="inline-flex items-center bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-full font-semibold hover:bg-white/30 transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Blog
                </a>
            </div>
        </div>
    </section>

    <!-- Blog Content Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-8xl mx-auto">
                <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl" data-aos="fade-up" data-aos-duration="1000">
                    <img src="{{ $post->getFirstMedia('image') ? $post->getFirstMedia('image')->getUrl() : 'https://via.placeholder.com/500x300' }}"
                        alt="{{ $post->title }}" class="w-full h-auto object-cover" style="aspect-ratio: 2/1;">
                </div>

                <div class="prose prose-lg max-w-none">

                    {!! $post->content !!}
                </div>


                <!-- Social Share -->
                <div class="mt-12 pt-8 border-t border-gray-200" data-aos="fade-up" data-aos-delay="400"
                    data-aos-duration="1000">
                    <h3 class="text-xl font-bold mb-4 text-[#060771]">Bagikan artikel ini</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            target="_blank"
                            class="w-12 h-12 bg-[#060771] rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-lg">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                            target="_blank"
                            class="w-12 h-12 bg-[#FF6C0C] rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-lg">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}"
                            target="_blank"
                            class="w-12 h-12 bg-[#060771] rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-lg">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current() . ' - ' . Str::limit(strip_tags($post->content), 100)) }}"
                            target="_blank"
                            class="w-12 h-12 bg-[#25D366] rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-lg">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                        <a href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode(url()->current()) }}"
                            class="w-12 h-12 bg-[#060771] rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-lg">
                            <i class="fas fa-envelope text-xl"></i>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Related Posts Section -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Artikel Terkait</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                    Anda Mungkin Juga Menyukai
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Jelajahi lebih banyak artikel dari koleksi kami</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($relatedPosts as $index => $relatedPost)
                    <article data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000"
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl border border-gray-100"
                        style="transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                        <div class="relative overflow-hidden" style="aspect-ratio: 1.618/1;">
                            <img src="{{ $relatedPost->getFirstMedia('image') ? $relatedPost->getFirstMedia('image')->getUrl() : 'https://via.placeholder.com/500x300' }}"
                                alt="{{ $relatedPost->title }}" class="w-full h-full object-cover"
                                style="transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);">

                            <!-- Date Badge -->
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg"
                                style="transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);">
                                <span class="text-sm font-bold text-[#060771]">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ $relatedPost->created_at->format('M d, Y') }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 text-[#060771] line-clamp-2"
                                style="transition: color 0.3s cubic-bezier(0.4, 0, 0.2, 1);">
                                {{ $relatedPost->title }}
                            </h3>
                            <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">
                                {{ Str::limit(strip_tags($relatedPost->content), 120) }}
                            </p>

                            <a href="{{ route('blog.detail', $relatedPost->slug) }}"
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
                        <p class="text-gray-500 text-lg">Tidak ada postingan terkait yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
