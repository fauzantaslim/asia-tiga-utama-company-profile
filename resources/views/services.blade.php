@extends('layouts.app')

@section('title', 'Layanan Kami - Profil Perusahaan')
@section('description', 'Jelajahi berbagai layanan profesional komprehensif kami')
@section('keywords', 'layanan, solusi, layanan profesional')

@section('content')
    <!-- Services Header Section -->
    <section class="relative py-24 overflow-hidden bg-[#BF1A1A]">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-300 opacity-10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div data-aos="fade-down" data-aos-duration="1000">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-white leading-tight">
                    Layanan Kami
                </h1>
            </div>

            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <p class="text-xl md:text-2xl mb-10 text-white/90 max-w-3xl mx-auto leading-relaxed">
                    Solusi komprehensif yang disesuaikan dengan kebutuhan bisnis Anda
                </p>
            </div>
        </div>
    </section>

    <!-- Services Content Section -->
    <section class="py-24 bg-[#FFE08F]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#060771] font-semibold uppercase tracking-wider text-sm">Apa Yang Kami Tawarkan</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-4 text-[#060771]">
                    Layanan Kami
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Solusi profesional yang dirancang untuk membantu bisnis
                    Anda berkembang</p>

                <!-- See all services link -->
                <div class="mt-6">
                    <a href="{{ route('services') }}"
                        class="inline-flex items-center text-[#BF1A1A] font-semibold hover:text-[#FF6C0C] gap-2">
                        Lihat Semua Layanan
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
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
        </div>
    </section>

@endsection
