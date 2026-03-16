@extends('layouts.app')

@section('title', 'Layanan Kami - Profil Perusahaan')
@section('description', 'Jelajahi berbagai layanan profesional komprehensif kami')
@section('keywords', 'layanan, solusi, layanan profesional')

@section('content')
    <!-- Services Header Section -->
    <section class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden group">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 bg-[#0B2F23]">
            <picture>
                <source srcset="{{ asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                <img src="{{ asset('images/placeholders/no-image-placeholder.svg') }}"
                     alt="Background Layanan Kami" 
                     class="absolute inset-0 w-full h-full object-cover opacity-20 mix-blend-luminosity">
            </picture>

            <!-- Gradient to ensure readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#060771]/90 via-[#060771]/70 to-[#060771]/50 z-10"></div>
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
                            Layanan Kami
                        </li>
                    </ol>
                </nav>

                <div data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="text-4xl md:text-5xl lg:text-5xl xl:text-6xl font-bold mb-4 text-white leading-tight font-serif" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                        Layanan Kami
                    </h1>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <p class="text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed">
                        Solusi komprehensif yang disesuaikan dengan kebutuhan bisnis Anda
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Content Section -->
    <section class="py-24 bg-[#FFE08F]">
        <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Apa Yang Kami Tawarkan</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                    Layanan Kami
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Solusi profesional yang dirancang untuk membantu bisnis
                    Anda berkembang</p>


            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($services as $index => $service)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000"
                        x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false"
                        class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100 relative overflow-hidden"
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
                                :style="hovered ? 'color: rgba(255, 255, 255, 0.9)' : 'color: #4b5563'">
                                {{ $service->description }}</p>

                            <!-- Read more link -->

                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12" data-aos="fade-up">
                        <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">Tidak ada layanan yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
            <!-- Pagination -->
            @if ($services->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="flex items-center space-x-2">
                        {{ $services->links('vendor.pagination.tailwind-custom') }}
                    </div>
                </div>
            @endif
        </div>
        </div>
    </section>

@endsection
