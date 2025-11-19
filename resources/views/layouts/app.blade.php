<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    {{-- Responsive --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Title default, bisa di-overwrite --}}
    <title>@yield('title', 'Company Profile')</title>

    {{-- Deskripsi default --}}
    <meta name="description" content="@yield('description', 'Company Profile resmi kami')">

    {{-- Keywords --}}
    <meta name="keywords" content="@yield('keywords', 'company profile, jasa, layanan')">

    {{-- Tambahan meta dari page --}}
    @yield('meta')

    {{-- Tailwind CDN (atau pakai Vite jika mau) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    {{-- Google Fonts --}}
    @googlefonts

    {{-- Custom CSS jika dibutuhkan --}}
    @stack('styles')

    <style>
        html {
            scroll-behavior: smooth;
            /* biar klik navbar smooth scroll */
        }
    </style>
</head>

<body class="font-sans text-gray-800">

    {{-- NAVBAR --}}
    <header class="fixed top-0 left-0 right-0 bg-white shadow z-50">
        <div class="container mx-auto flex items-center justify-between py-4 px-4">

            <a href="/" class="text-xl font-semibold">Company</a>

            <nav class="space-x-6 hidden md:flex">
                <a href="#hero" class="hover:text-blue-600">Home</a>
                <a href="#about" class="hover:text-blue-600">About</a>
                <a href="#services" class="hover:text-blue-600">Services</a>
                <a href="#portfolio" class="hover:text-blue-600">Portfolio</a>
                <a href="#gallery" class="hover:text-blue-600">Gallery</a>
                <a href="#blog" class="hover:text-blue-600">Blog</a>
                <a href="#contact" class="hover:text-blue-600">Contact</a>
            </nav>

            {{-- Mobile menu button --}}
            <button id="menu-btn" class="md:hidden focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
            <a href="#hero" class="block py-2">Home</a>
            <a href="#about" class="block py-2">About</a>
            <a href="#services" class="block py-2">Services</a>
            <a href="#portfolio" class="block py-2">Portfolio</a>
            <a href="#gallery" class="block py-2">Gallery</a>
            <a href="#blog" class="block py-2">Blog</a>
            <a href="#contact" class="block py-2">Contact</a>
        </div>
    </header>

    {{-- CONTENT --}}
    <main class="pt-20">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-900 text-gray-300 py-10 mt-20">
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
                        <a href="#" class="hover:text-white">Instagram</a>
                        <a href="#" class="hover:text-white">LinkedIn</a>
                        <a href="#" class="hover:text-white">Facebook</a>
                    </div>
                </div>
            </div>

            <div class="text-center text-sm mt-10 border-t border-gray-700 pt-6">
                © {{ date('Y') }} Company. All rights reserved.
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    @stack('scripts')

    <script>
        // Toggle mobile menu
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = documecompany_infosnt.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
