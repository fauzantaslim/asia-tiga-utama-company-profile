@extends('layouts.app')

@section('title', $post->meta_title ?? $post->title)
@section('description', $post->meta_description ?? Str::limit(strip_tags($post->content), 155))
@section('keywords', $post->meta_keywords ?? 'blog, article, news')
@section('og-image', $post->getFirstMedia('image') ? $post->getFirstMedia('image')->getUrl() :
    'https://via.placeholder.com/1200x630.png')

    @php
        $image = $post->getFirstMedia('image');
    @endphp

@section('content')
    <!-- Blog Detail Header -->
    <section class="relative pt-28 pb-20 overflow-hidden bg-[#060771]">
        <div class="absolute inset-0 z-0 bg-[#060771]">
            <picture>
                <source srcset="{{ $image ? $image->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                <img src="{{ $image ? $image->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}" alt="Background" class="w-full h-full object-cover opacity-30 mix-blend-luminosity">
            </picture>
            <div class="absolute inset-0 bg-gradient-to-r from-[#060771]/90 via-[#060771]/70 to-transparent"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="max-w-4xl">
                    <!-- Breadcrumbs -->
                <nav aria-label="Breadcrumb" class="mb-6 flex" data-aos="fade-down" data-aos-duration="1000">
                    <ol class="inline-flex items-center space-x-2 text-sm">
                        <li>
                            <a href="{{ url('/') }}" class="text-[#BF1A1A] font-bold">Beranda</a>
                        </li>
                        <li>
                            <span class="text-white font-bold mx-1"><i class="fas fa-chevron-right text-[10px]"></i></span>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}" class="text-[#BF1A1A] font-bold">Blog</a>
                        </li>
                        <li>
                            <span class="text-white font-bold mx-1"><i class="fas fa-chevron-right text-[10px]"></i></span>
                        </li>
                        <li aria-current="page">
                            <span class="text-white font-semibold">{{ $post->title }}</span>
                        </li>
                    </ol>
                </nav>

                <div data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
                    <h1 class="text-3xl md:text-5xl font-bold mb-8 text-white leading-tight">
                        {{ $post->title }}
                    </h1>
                </div>

                <div class="flex flex-col space-y-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <div class="flex flex-col space-y-3">
                        <div class="flex items-center text-white/90 text-sm">
                            <i class="far fa-calendar mr-3 text-white/70"></i>
                            <span>{{ \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('l, d F Y') }}</span>
                        </div>
                        <div class="flex items-center text-white/90 text-sm">
                            <i class="fas fa-pen-nib mr-3 text-white/70"></i>
                            <span>Penulis: {{ $post->author ?? 'Admin Asia Tiga Utama' }}</span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6 pt-4">
                        <!-- Views -->
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white bg-white/5">
                                <i class="far fa-eye text-sm"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-white font-bold text-sm" id="blog-view-count">{{ $post->views_count }} kali</span>
                                <span class="text-white/70 text-xs">Berita ini dilihat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 lg:gap-12">
                <!-- Main Content (Left Side) -->
                <div class="w-full lg:w-8/12">
                    <div class=" flex-shrink-0 overflow-hidden shadow-sm bg-gray-100 rounded-2xl p-1 border border-gray-100" data-aos="fade-up" data-aos-duration="1000">
                        <picture>
                            <source
                                srcset="{{ $image ? $image->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                type="image/webp">
                            <img loading="lazy" src="{{ $image ? $image->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 rounded-xl" style="aspect-ratio: 2/1;">
                        </picture>
                    </div>

                    <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed my-8" data-aos="fade-up" data-aos-duration="1000">
                        {!! $post->content !!}
                    </div>

                    <!-- Social Share -->
                    <div class="mt-12 pt-8 border-t border-gray-200" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="1000">
                        <h3 class="text-xl font-bold mb-4 text-[#060771]">Bagikan artikel ini</h3>
                        <div class="flex space-x-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank"
                                class="w-12 h-12 bg-[#060771] rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-md">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                target="_blank"
                                class="w-12 h-12 bg-[#00acee] rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-md">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current() . ' - ' . Str::limit(strip_tags($post->content), 100)) }}"
                                target="_blank"
                                class="w-12 h-12 bg-[#25D366] rounded-xl flex items-center justify-center text-white hover:scale-110 transition-all duration-300 shadow-md">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar (Right Side) -->
                <div class="w-full lg:w-4/12">
                    <div class="sticky top-28" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                        <div class="mb-4 border-b border-gray-200 pb-2 relative">
                            <h3 class="text-xl font-bold text-[#060771] uppercase inline-block m-0">
                                Blog Terkait
                            </h3>
                            <div class="absolute -bottom-[1px] left-0 w-20 h-1 bg-[#BF1A1A]"></div>
                        </div>

                        <div class="flex flex-col">
                            @forelse($relatedPosts->take(5) as $relatedPost)
                            @php
                                $relatedImage = $relatedPost->getFirstMedia('image');
                            @endphp
                            <a href="{{ route('blog.detail', $relatedPost->slug) }}" class="group flex space-x-4 items-start py-5 border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors">
                                <div class="w-24 h-24 flex-shrink-0 overflow-hidden shadow-sm bg-gray-100 rounded-2xl p-1 border border-gray-100">
                                    <picture>
                                        <source srcset="{{ $relatedImage ? $relatedImage->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                                        <img loading="lazy" src="{{ $relatedImage ? $relatedImage->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                                            alt="{{ $relatedPost->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 rounded-xl">
                                    </picture>
                                </div>
                                <div class="flex-1 min-w-0 pt-1">
                                    <h4 class="text-[15px] font-bold text-[#060771] group-hover:text-[#BF1A1A] transition-colors leading-snug mb-2 line-clamp-3">
                                        {{ $relatedPost->title }}
                                    </h4>
                                    <div class="flex items-center text-gray-500 text-[13px] gap-1">
                                        <span>{{ $relatedPost->category->name ?? 'Pemerintahan' }}</span>
                                        <span class="px-1">|</span>
                                        <span>{{ \Carbon\Carbon::parse($relatedPost->created_at)->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="text-center py-8 bg-gray-50 rounded-xl rounded-2xl border border-dashed border-gray-200">
                                <i class="fas fa-newspaper text-3xl text-gray-300 mb-2"></i>
                                <p class="text-gray-500 text-sm">Belum ada berita terkait.</p>
                            </div>
                            @endforelse
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const url = "{{ route('blog.increment.view', $post->id) }}";
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.success && data.views_count) {
                const viewCountEl = document.getElementById('blog-view-count');
                if (viewCountEl) {
                    viewCountEl.innerHTML = data.views_count + ' kali';
                }
            }
        })
        .catch(error => console.error('Error incrementing view count:', error));
    });
</script>
@endpush
