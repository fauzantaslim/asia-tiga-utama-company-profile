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
                <source srcset="{{ isset($about) && $about->getFirstMedia('image') ? $about->getFirstMedia('image')->getUrl('webp') : asset('images/placeholders/no-image-placeholder.svg') }}" type="image/webp">
                <img src="{{ isset($about) && $about->getFirstMedia('image') ? $about->getFirstMedia('image')->getUrl('preview') : asset('images/placeholders/no-image-placeholder.svg') }}"
                     alt="Background Layanan Kami" 
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
    <section class="py-24 bg-slate-50 relative overflow-hidden">
        <!-- Add decorative background elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#FFE08F] opacity-20 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#060771] opacity-5 rounded-full blur-3xl -ml-20 -mb-20"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-20" data-aos="fade-up">
                    <span class="inline-block py-1 px-4 rounded-full bg-[#FFE08F]/30 text-[#060771] font-semibold uppercase tracking-wider text-sm mb-4">Apa Yang Kami Tawarkan</span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-[#060771] relative inline-block">
                        Layanan Kami
                        <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#BF1A1A] rounded-full"></div>
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto mt-6 leading-relaxed">
                        Solusi profesional yang dirancang untuk membantu bisnis Anda berkembang
                    </p>
                </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $index => $service)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="1000"
                        class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 relative overflow-hidden transition-all duration-500 hover:-translate-y-2">

                        <!-- Top corner gradient accent -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-[#FFE08F]/40 to-[#060771]/10 rounded-bl-full -z-10 transition-transform duration-500 group-hover:scale-150"></div>
                        
                        <!-- Bottom bold accent line -->
                        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-[#060771] to-[#BF1A1A] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

                        <div class="relative z-10 h-full flex flex-col">
                            <div class="w-20 h-20 rounded-2xl bg-slate-50 flex items-center justify-center mb-8 shadow-inner group-hover:bg-[#060771] transition-colors duration-500">
                                <div class="text-4xl text-[#BF1A1A] group-hover:text-white transition-colors duration-500 group-hover:scale-110 transform">
                                    @if (isset($service->icon))
                                        {!! $service->icon !!}
                                    @else
                                        <i class="fas fa-cogs"></i>
                                    @endif
                                </div>
                            </div>
                            
                            <h3 class="text-2xl font-bold mb-4 text-[#060771] group-hover:text-[#BF1A1A] transition-colors duration-300">{{ $service->title }}</h3>
                            
                            <p class="text-gray-600 leading-relaxed text-left flex-grow mb-6 line-clamp-3"
                                title="{{ $service->description }}">
                                {{ $service->description }}
                            </p>
                            
                            
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-3xl shadow-sm border border-gray-100" data-aos="fade-up">
                        <i class="fas fa-inbox text-6xl text-gray-200 mb-4"></i>
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
