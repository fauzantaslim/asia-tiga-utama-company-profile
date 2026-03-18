<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ isset($companyInfo) && $companyInfo->website_name ? $companyInfo->website_name : 'Perusahaan' }}</title>
    <meta name="robots" content="noindex, nofollow">

    {{-- Favicon --}}
    @if (isset($companyInfo) && $companyInfo->getFirstMedia('logo_website'))
        <link rel="icon" type="image/x-icon" href="{{ $companyInfo->getFirstMedia('logo_website')->getUrl('webp') }}">
    @else
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
    @endif

    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    @googlefonts

    <style>
        /* ===== Error Page Styles ===== */
        :root {
            --color-navy: #060771;
            --color-red: #BF1A1A;
            --color-gold: #FFE08F;
            --color-orange: #FF6C0C;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-navy) 0%, #0a0b8f 40%, var(--color-red) 100%);
            overflow: hidden;
            position: relative;
        }

        /* Animated background dots pattern */
        .bg-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.05;
            background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0);
            background-size: 32px 32px;
        }

        /* Floating orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: float 8s ease-in-out infinite;
            pointer-events: none;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: var(--color-gold);
            opacity: 0.15;
            top: -100px;
            right: -100px;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 300px;
            height: 300px;
            background: var(--color-red);
            opacity: 0.12;
            bottom: -80px;
            left: -80px;
            animation-delay: -3s;
        }

        .orb-3 {
            width: 200px;
            height: 200px;
            background: var(--color-gold);
            opacity: 0.1;
            top: 50%;
            left: 50%;
            animation-delay: -5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(5deg); }
            66% { transform: translateY(10px) rotate(-3deg); }
        }

        /* Error card */
        .error-card {
            position: relative;
            z-index: 10;
            max-width: 600px;
            width: 90%;
            text-align: center;
            padding: 3rem 2rem;
        }

        /* Error code with animated gradient */
        .error-code {
            font-size: clamp(6rem, 15vw, 10rem);
            font-weight: 900;
            line-height: 1;
            background: linear-gradient(135deg, var(--color-gold) 0%, white 50%, var(--color-gold) 100%);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 3s ease-in-out infinite;
            margin-bottom: 0.5rem;
            text-shadow: none;
            filter: drop-shadow(0 4px 30px rgba(255, 224, 143, 0.3));
        }

        @keyframes shimmer {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Icon container with pulse animation */
        .error-icon-wrapper {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .error-icon-wrapper::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--color-gold), var(--color-red));
            animation: pulse-ring 2s ease-in-out infinite;
            opacity: 0.5;
        }

        .error-icon-wrapper .icon-inner {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .error-icon-wrapper .icon-inner i {
            font-size: 2rem;
            color: var(--color-gold);
        }

        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.2; }
            100% { transform: scale(1); opacity: 0.5; }
        }

        /* Title & description */
        .error-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.75rem;
        }

        .error-description {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        /* Glassmorphism divider */
        .glass-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--color-gold), var(--color-red));
            border-radius: 2px;
            margin: 1.5rem auto;
        }

        /* Buttons */
        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            background: var(--color-gold);
            color: var(--color-navy);
            font-weight: 700;
            font-size: 1rem;
            border-radius: 9999px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 4px 20px rgba(255, 224, 143, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 30px rgba(255, 224, 143, 0.4);
            background: white;
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            background: transparent;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 9999px;
            text-decoration: none;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            border-color: var(--color-gold);
            color: var(--color-gold);
            background: rgba(255, 224, 143, 0.1);
        }

        /* Animated particles */
        .particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--color-gold);
            border-radius: 50%;
            opacity: 0;
            animation: particle-float linear infinite;
        }

        @keyframes particle-float {
            0% {
                opacity: 0;
                transform: translateY(100vh) scale(0);
            }
            10% {
                opacity: 0.6;
            }
            90% {
                opacity: 0.6;
            }
            100% {
                opacity: 0;
                transform: translateY(-20px) scale(1);
            }
        }

        /* Entrance animation */
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .fade-in-up-delay-1 { animation-delay: 0.15s; }
        .fade-in-up-delay-2 { animation-delay: 0.3s; }
        .fade-in-up-delay-3 { animation-delay: 0.45s; }
        .fade-in-up-delay-4 { animation-delay: 0.6s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Bottom wave */
        .wave-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 80px;
            pointer-events: none;
        }

        .wave-bottom svg {
            width: 100%;
            height: 100%;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .error-card {
                padding: 2rem 1.5rem;
            }
            .error-title {
                font-size: 1.4rem;
            }
            .error-description {
                font-size: 1rem;
            }
            .btn-group {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <!-- Background elements -->
    <div class="bg-pattern"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <!-- Animated particles -->
    <div class="particles">
        @for ($i = 0; $i < 20; $i++)
            <div class="particle" style="
                left: {{ rand(0, 100) }}%;
                animation-duration: {{ rand(6, 14) }}s;
                animation-delay: {{ rand(0, 10) / 10 }}s;
                width: {{ rand(2, 5) }}px;
                height: {{ rand(2, 5) }}px;
                background: {{ collect(['var(--color-gold)', 'rgba(255,255,255,0.5)', 'var(--color-red)'])->random() }};
            "></div>
        @endfor
    </div>

    <!-- Error content -->
    <div class="error-card">
        <div class="fade-in-up">
            <div class="error-code">@yield('code')</div>
        </div>

        <div class="fade-in-up fade-in-up-delay-1">
            <div class="error-icon-wrapper">
                <div class="icon-inner">
                    <i class="@yield('icon', 'fas fa-exclamation-triangle')"></i>
                </div>
            </div>
        </div>

        <div class="glass-divider fade-in-up fade-in-up-delay-2"></div>

        <h1 class="error-title fade-in-up fade-in-up-delay-2">@yield('heading')</h1>
        <p class="error-description fade-in-up fade-in-up-delay-3">@yield('message')</p>

        <div class="btn-group fade-in-up fade-in-up-delay-4">
            <a href="/" class="btn-primary">
                <i class="fas fa-home"></i>
                Kembali ke Beranda
            </a>
            <a href="javascript:history.back()" class="btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Halaman Sebelumnya
            </a>
        </div>
    </div>

    <!-- Bottom wave decoration -->
    <div class="wave-bottom">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path d="M0,40 C360,80 720,0 1080,40 C1260,60 1380,50 1440,40 L1440,80 L0,80 Z"
                fill="rgba(255,224,143,0.08)" />
            <path d="M0,50 C360,20 720,70 1080,40 C1260,25 1380,35 1440,50 L1440,80 L0,80 Z"
                fill="rgba(6,7,113,0.15)" />
        </svg>
    </div>
</body>

</html>
