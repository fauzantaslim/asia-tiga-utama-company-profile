<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Company Profile')</title>
    <meta name="description" content="@yield('description', 'Company Profile resmi kami')">
    <meta name="keywords" content="@yield('keywords', 'company profile, jasa, layanan')">

    @yield('meta')
    {!! SEO::opengraph()->generate() !!}
    {!! SEO::twitter()->generate() !!}
    {!! SEO::jsonLd()->generate() !!}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    @googlefonts
    @stack('styles')

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

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
    </style>
</head>

<body class="font-sans text-gray-800 bg-[#FFE08F]">

    {{-- GLASSMORPHISM NAVBAR --}}
    <header class="fixed top-0 left-0 right-0 glass-nav z-50 nav-enter">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between h-24">

                {{-- LEFT: Logo & Brand Name --}}
                <a href="/" class="logo-wrapper flex items-center gap-3 group">
                    @if (isset($companyInfo) && $companyInfo->getFirstMedia('logo_website'))
                        <div
                            class="logo-icon w-10 h-10 rounded-xl flex items-center justify-center shadow-lg overflow-hidden">
                            <img src="{{ $companyInfo->getFirstMedia('logo_website')->getUrl() }}"
                                alt="{{ $companyInfo->website_name ?? 'Company Logo' }}"
                                class="w-full h-full object-contain">
                        </div>
                    @else
                        <div
                            class="logo-icon w-10 h-10 bg-[#BF1A1A] rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-rocket text-white text-xl"></i>
                        </div>
                    @endif
                    <div class="sm:block">
                        <h1 class="text-xl font-bold text-[#BF1A1A]">
                            {{ isset($companyInfo) && $companyInfo->website_name ? $companyInfo->website_name : 'YourCompany' }}
                        </h1>
                        <p class="text-xs text-gray-500">
                            {{ isset($companyInfo) ? 'Solusi profesional untuk kebutuhan bisnis Anda' : 'Professional Solutions' }}
                        </p>
                    </div>
                </a>

                {{-- CENTER: Navigation Menu --}}
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="#hero" class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Home</a>
                    <a href="#about" class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">About</a>
                    <a href="#services" class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Services</a>
                    <a href="#portfolio" class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Portfolio</a>
                    <a href="#gallery" class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Gallery</a>
                    <a href="#blog" class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Blog</a>
                    <a href="#contact" class="nav-link text-gray-700 hover:text-[#BF1A1A] font-medium">Contact</a>
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
                <button id="menu-btn" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 focus:outline-none transition">
                    <svg id="menu-icon" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 text-gray-700 hidden" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Mobile Menu Dropdown --}}
            <div id="mobile-menu" class="lg:hidden hidden pb-4">
                <div class="mobile-menu-glass mt-2 p-4 space-y-1">
                    <a href="#hero" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition">Home</a>
                    <a href="#about" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition">About</a>
                    <a href="#services" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition">Services</a>
                    <a href="#portfolio" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition">Portfolio</a>
                    <a href="#gallery" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition">Gallery</a>
                    <a href="#blog" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition">Blog</a>
                    <a href="#contact" class="block py-3 px-4 rounded-lg hover:bg-blue-50 transition">Contact</a>

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
    </header>

    {{-- CONTENT --}}
    <main class="pt-24">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-[#060771] text-gray-300 py-10 mt-20">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <h4 class="font-semibold text-white">Company</h4>
                    <p class="text-sm mt-3">
                        Solusi profesional untuk kebutuhan bisnis Anda.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold text-white">Navigation</h4>
                    <ul class="text-sm mt-3 space-y-2">
                        <li><a href="#hero" class="hover:text-white">Home</a></li>
                        <li><a href="#about" class="hover:text-white">About</a></li>
                        <li><a href="#services" class="hover:text-white">Services</a></li>
                        <li><a href="#contact" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-white">Follow Us</h4>
                    <div class="flex gap-4 mt-3">
                        @if (isset($companyInfo))
                            @if ($companyInfo->instagram)
                                <a href="{{ $companyInfo->instagram }}" target="_blank"
                                    class="hover:text-white">Instagram</a>
                            @endif
                            @if ($companyInfo->facebook)
                                <a href="{{ $companyInfo->facebook }}" target="_blank"
                                    class="hover:text-white">Facebook</a>
                            @endif
                            @if ($companyInfo->youtube)
                                <a href="{{ $companyInfo->youtube }}" target="_blank"
                                    class="hover:text-white">YouTube</a>
                            @endif
                        @else
                            <a href="#" class="hover:text-white">Instagram</a>
                            <a href="#" class="hover:text-white">Youtube</a>
                            <a href="#" class="hover:text-white">Facebook</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="text-center text-sm mt-10 border-t border-gray-700 pt-6">
                © {{ date('Y') }}
                {{ isset($companyInfo) && $companyInfo->website_name ? $companyInfo->website_name : 'Company' }}. All
                rights reserved.
            </div>
        </div>
    </footer>

    @stack('scripts')

    <script>
        // Toggle mobile menu with animation
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Close mobile menu when clicking nav links
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });

        // Add active state to nav links based on scroll
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-[#BF1A1A]');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('text-[#BF1A1A]');
                }
            });
        });
    </script>
</body>

</html>
