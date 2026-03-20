<!DOCTYPE html>
<html lang="id" data-turbo="true">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
        
    <title>@yield('title', 'Profil Perusahaan')</title>
    <meta name="description" content="@yield('description', 'Profil resmi perusahaan kami')">
    <meta name="keywords" content="@yield('keywords', 'profil perusahaan, jasa, layanan')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}" />


    {{-- Favicon --}}
    @if (isset($companyInfo) && $companyInfo->getFirstMedia('logo_website'))
        <link rel="icon" type="image/x-icon"
            href="{{ $companyInfo->getFirstMedia('logo_website')->getUrl('webp') }}">
    @else
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
    @endif

    @yield('meta')
    {!! SEO::generate() !!}
    <meta property="og:image" content="@yield('og-image', 'https://via.placeholder.com/1200x630.png')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    @googlefonts
    @stack('styles')



    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    {{-- Organization Structured Data --}}

    <style>
        html {
            scroll-behavior: smooth;

        }

        /* Glassmorphism Effect */
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.08);
        }

        /* Logo Animation */
        .logo-icon {
            transition: transform 0.3s ease;
        }

        .logo-wrapper:hover .logo-icon {
            transform: rotate(360deg);
        }

        /* Nav Link Hover Effect */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            width: 0;
            height: 2px;
            background: #BF1A1A;
            transition: width 0.3s ease, left 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        /* WhatsApp Button Gradient */
        .whatsapp-btn {
            background: #25D366;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px 0 rgba(37, 211, 102, 0.3);
        }

        .whatsapp-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px 0 rgba(37, 211, 102, 0.4);
        }

        /* Mobile Menu Glass Effect */
        .mobile-menu-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 16px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.1);
        }

        /* Smooth entrance animation */
        .nav-enter {
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Swiper custom styles */
        .hero-background-swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            width: 100%;
            height: 100%;
        }

        /* Swiper Navigation Buttons */
        .swiper-button-next,
        .swiper-button-prev {
            color: white;
            background: rgba(191, 26, 26, 0.3);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            margin-top: -25px;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(191, 26, 26, 0.5);
            transform: scale(1.1);
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 20px;
            font-weight: bold;
        }

        /* Swiper Pagination */
        .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.5);
            opacity: 1;
            width: 12px;
            height: 12px;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background: white;
            transform: scale(1.2);
        }

        .swiper-pagination {
            bottom: 30px;
        }

        /* Line clamp utility classes */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Hide scrollbar for horizontal scroll containers */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
</head>

<body class="font-sans text-gray-800 bg-[#FFE08F]">

    {{-- GLASSMORPHISM NAVBAR --}}
    <header class="fixed top-0 left-0 right-0 glass-nav z-50 nav-enter" x-data="{ mobileMenuOpen: false }" x-init="$watch('mobileMenuOpen', value => console.log('Menu:', value))">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between h-24">

                {{-- LEFT: Logo & Brand Name --}}
                <a href="/" class="logo-wrapper flex items-center gap-3 group"
                    @click.prevent="mobileMenuOpen = false; window.location.href = '/'">
                    @if (isset($companyInfo) && $companyInfo->getFirstMedia('logo_website'))
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center overflow-hidden">
                            <picture>
                                <source srcset="{{ $companyInfo->getFirstMedia('logo_website')->getUrl('webp') }}"
                                    type="image/webp">
                                <img src="{{ $companyInfo->getFirstMedia('logo_website')->getUrl('thumb') }}"
                                    alt="{{ $companyInfo->website_name ?? 'Logo Perusahaan' }}"
                                    class="w-full h-full object-contain">
                            </picture>
                        </div>
                    @else
                        <div class="w-10 h-10 bg-[#BF1A1A] rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-rocket text-white text-xl"></i>
                        </div>
                    @endif
                    <div class="sm:block">
                        <h1 class="text-xl font-bold text-[#BF1A1A]">
                            CV.
                            {{ isset($companyInfo) && $companyInfo->website_name ? $companyInfo->website_name : 'Perusahaan Anda' }}
                        </h1>
                        <p class="text-xs text-gray-500">
                            {{ isset($companyInfo) ? 'Spesialis Perbaikan Dinamo Industri' : 'Solusi Profesional' }}
                        </p>
                    </div>
                </a>

                {{-- CENTER: Navigation Menu --}}
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}"
                        class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Beranda</a>
                    <a href="{{ route('about') }}"
                        class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Tentang</a>
                    <a href="{{ route('services') }}"
                        class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Layanan</a>
                    <a href="{{ route('portfolio') }}"
                        class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Portofolio</a>
                    <a href="{{ route('gallery') }}"
                        class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Galeri</a>
                    <a href="{{ route('blog.index') }}"
                        class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Blog</a>
                    <a href="{{ route('contact') }}"
                        class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Kontak</a>
                </nav>

                {{-- RIGHT: WhatsApp Button --}}
                <div class="hidden lg:block">
                    <a href="{{ isset($companyInfo) && $companyInfo->phone ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $companyInfo->phone) : 'https://wa.me/6281234567890' }}"
                        target="_blank"
                        class="whatsapp-btn flex items-center gap-2 px-6 py-3 rounded-full text-white font-semibold bg-[#25D366] hover:bg-[#128C7E]">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span>Hubungi Kami</span>
                    </a>
                </div>

                {{-- Mobile Menu Button --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden p-2 rounded-lg hover:bg-gray-100 focus:outline-none transition">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Mobile Menu Dropdown --}}
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" @click.away="mobileMenuOpen = false"
                class="lg:hidden pb-4">
                <div class="mobile-menu-glass mt-2 p-4 space-y-1">
                    <a href="{{ route('home') }}" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition"
                        @click.prevent="mobileMenuOpen = false; setTimeout(() => window.location.href = '{{ route('home') }}', 100)">
                        Beranda</a>
                    <a href="{{ route('about') }}" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition"
                        @click="mobileMenuOpen = false">Tentang</a>
                    <a href="{{ route('services') }}" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition"
                        @click="mobileMenuOpen = false">Layanan</a>
                    <a href="{{ route('portfolio') }}" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition"
                        @click="mobileMenuOpen = false">Portofolio</a>
                    <a href="{{ route('gallery') }}" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition"
                        @click="mobileMenuOpen = false">Galeri</a>
                    <a href="{{ route('blog.index') }}"
                        class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition"
                        @click="mobileMenuOpen = false">Blog</a>
                    <a href="{{ route('contact') }}" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition"
                        @click="mobileMenuOpen = false">Kontak</a>

                    {{-- WhatsApp Button for Mobile --}}
                    <a href="{{ isset($companyInfo) && $companyInfo->phone ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $companyInfo->phone) : 'https://wa.me/6281234567890' }}"
                        target="_blank"
                        class="whatsapp-btn flex items-center justify-center gap-2 py-3 px-4 rounded-lg text-white font-semibold mt-4">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span>Hubungi Kami</span>
                    </a>
                </div>
            </div>
            </div>
        </div>
    </header>

    {{-- CONTENT --}}
    <main class="pt-24">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-[#060771] text-gray-300 py-10 " data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-4 gap-6">
                <div data-aos="fade-right" data-aos-delay="100">
                    <div class="flex items-center gap-3 mb-4">
                        @if (isset($companyInfo) && $companyInfo->getFirstMedia('logo_website'))
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center overflow-hidden">
                                <picture>
                                    <source srcset="{{ $companyInfo->getFirstMedia('logo_website')->getUrl('webp') }}"
                                        type="image/webp">
                                    <img src="{{ $companyInfo->getFirstMedia('logo_website')->getUrl('thumb') }}"
                                        alt="{{ $companyInfo->website_name ?? 'Logo Perusahaan' }}"
                                        class="w-full h-full object-contain">
                                </picture>
                            </div>
                        @else
                            <div class="w-12 h-12 bg-[#BF1A1A] rounded-xl flex items-center justify-center">
                                <i class="fas fa-rocket text-white text-xl"></i>
                            </div>
                        @endif
                        <h4 class="font-semibold text-white text-xl">
                            {{ isset($companyInfo) && $companyInfo->website_name ? $companyInfo->website_name : 'Perusahaan' }}
                        </h4>
                    </div>
                    <p class="text-sm mt-3 text-justify " data-aos="fade-up" data-aos-delay="200">
                        Sebagai mitra ahli dalam general repairing mesin industri, kami menyediakan solusi teknis
                        menyeluruh mulai dari gulung ulang (rewinding) Electro Motor AC/DC dan Generator, hingga
                        perbaikan sistem mekanikal pada Transformator, Submersible Pump, serta Compressor Chiller.
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="font-semibold text-white">Kontak</h4>
                    <ul class="text-sm mt-3 space-y-2">
                        @if (isset($companyInfo))
                            @if ($companyInfo->address)
                                <li class="flex items-start" data-aos="fade-up" data-aos-delay="300">
                                    <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                                    <span>{{ $companyInfo->address }}</span>
                                </li>
                            @endif
                            @if ($companyInfo->phone)
                                <li class="flex items-center" data-aos="fade-up" data-aos-delay="400">
                                    <i class="fas fa-phone mr-2"></i>
                                    <span>{{ $companyInfo->phone }}</span>
                                </li>
                            @endif
                            @if ($companyInfo->email)
                                <li class="flex items-center" data-aos="fade-up" data-aos-delay="500">
                                    <i class="fas fa-envelope mr-2"></i>
                                    <span>{{ $companyInfo->email }}</span>
                                </li>
                            @endif
                        @else
                            <li class="flex items-start" data-aos="fade-up" data-aos-delay="300">
                                <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                                <span>123 Business Street, City, Country</span>
                            </li>
                            <li class="flex items-center" data-aos="fade-up" data-aos-delay="400">
                                <i class="fas fa-phone mr-2"></i>
                                <span>+1 234 567 890</span>
                            </li>
                            <li class="flex items-center" data-aos="fade-up" data-aos-delay="500">
                                <i class="fas fa-envelope mr-2"></i>
                                <span>info@company.com</span>
                            </li>
                        @endif
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <h4 class="font-semibold text-white">Navigasi</h4>
                    <ul class="text-sm mt-3 space-y-2">
                        <li data-aos="fade-up" data-aos-delay="400"><a href="{{ route('home') }}"
                                class="hover:text-white">Beranda</a></li>
                        <li data-aos="fade-up" data-aos-delay="500"><a href="{{ route('about') }}"
                                class="hover:text-white">Tentang</a></li>
                        <li data-aos="fade-up" data-aos-delay="600"><a href="{{ route('services') }}"
                                class="hover:text-white">Layanan</a></li>
                        <li data-aos="fade-up" data-aos-delay="700"><a href="{{ route('portfolio') }}"
                                class="hover:text-white">Portofolio</a></li>
                        <li data-aos="fade-up" data-aos-delay="800"><a href="{{ route('gallery') }}"
                                class="hover:text-white">Galeri</a></li>
                        <li data-aos="fade-up" data-aos-delay="900"><a href="{{ route('blog.index') }}"
                                class="hover:text-white">Blog</a></li>
                        <li data-aos="fade-up" data-aos-delay="1000"><a href="{{ route('contact') }}"
                                class="hover:text-white">Kontak</a></li>
                    </ul>
                </div>

                <div data-aos="fade-left" data-aos-delay="400">
                    <h4 class="font-semibold text-white">Ikuti Kami</h4>
                    <div class="flex gap-4 mt-3">
                        @if (isset($companyInfo))
                            @if ($companyInfo->instagram)
                                <a href="{{ $companyInfo->instagram }}" target="_blank" class="hover:text-white"
                                    data-aos="zoom-in" data-aos-delay="500">Instagram</a>
                            @endif
                            @if ($companyInfo->facebook)
                                <a href="{{ $companyInfo->facebook }}" target="_blank" class="hover:text-white"
                                    data-aos="zoom-in" data-aos-delay="600">Facebook</a>
                            @endif
                            @if ($companyInfo->youtube)
                                <a href="{{ $companyInfo->youtube }}" target="_blank" class="hover:text-white"
                                    data-aos="zoom-in" data-aos-delay="700">YouTube</a>
                            @endif
                        @else
                            <a href="#" class="hover:text-white" data-aos="zoom-in"
                                data-aos-delay="500">Instagram</a>
                            <a href="#" class="hover:text-white" data-aos="zoom-in"
                                data-aos-delay="600">Youtube</a>
                            <a href="#" class="hover:text-white" data-aos="zoom-in"
                                data-aos-delay="700">Facebook</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="text-center text-sm mt-10 border-t border-gray-700 pt-6" data-aos="fade-up"
                data-aos-delay="500">
                © {{ date('Y') }}
                {{ isset($companyInfo) && $companyInfo->website_name ? $companyInfo->website_name : 'Perusahaan' }}.
                Hak
                Cipta Dilindungi.
            </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            // Options
            Thumbs: {
                type: "classic",
            },
        });
        
        // Add active state to nav links based on scroll
        const sections = document.querySelectorAll('section[id]');

        // Initialize AOS animations
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                once: true,
                easing: 'ease-in-out'
            });
        });
    </script>
</body>

</html>
