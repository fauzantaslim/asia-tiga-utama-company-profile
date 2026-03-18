<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - Sedang Dalam Pemeliharaan</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --color-navy: #060771;
            --color-red: #BF1A1A;
            --color-gold: #FFE08F;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-navy) 0%, #0a0b8f 40%, var(--color-red) 100%);
            overflow: hidden;
            position: relative;
            font-family: 'Inter', sans-serif;
            color: white;
        }

        .bg-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.05;
            background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0);
            background-size: 32px 32px;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: float 8s ease-in-out infinite;
            pointer-events: none;
        }

        .orb-1 { width: 400px; height: 400px; background: var(--color-gold); opacity: 0.15; top: -100px; right: -100px; }
        .orb-2 { width: 300px; height: 300px; background: var(--color-red); opacity: 0.12; bottom: -80px; left: -80px; animation-delay: -3s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .error-card {
            position: relative;
            z-index: 10;
            max-width: 600px;
            width: 90%;
            text-align: center;
            padding: 3rem 2rem;
        }

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
            filter: drop-shadow(0 4px 30px rgba(255, 224, 143, 0.3));
        }

        @keyframes shimmer {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

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

        .icon-inner {
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

        .icon-inner i { font-size: 2rem; color: var(--color-gold); }

        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.2; }
            100% { transform: scale(1); opacity: 0.5; }
        }

        .glass-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--color-gold), var(--color-red));
            border-radius: 2px;
            margin: 1.5rem auto;
        }

        h1 { font-size: 1.75rem; font-weight: 700; margin-bottom: 0.75rem; }
        p { font-size: 1.1rem; color: rgba(255,255,255,0.7); line-height: 1.7; margin-bottom: 2rem; }

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

        .fade-in-up { animation: fadeInUp 0.8s ease-out forwards; opacity: 0; }
        .d1 { animation-delay: 0.15s; }
        .d2 { animation-delay: 0.3s; }
        .d3 { animation-delay: 0.45s; }
        .d4 { animation-delay: 0.6s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 640px) {
            .error-card { padding: 2rem 1.5rem; }
            h1 { font-size: 1.4rem; }
            p { font-size: 1rem; }
        }
    </style>
</head>

<body>
    <div class="bg-pattern"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="error-card">
        <div class="fade-in-up">
            <div class="error-code">503</div>
        </div>
        <div class="fade-in-up d1">
            <div class="error-icon-wrapper">
                <div class="icon-inner">
                    <i class="fas fa-tools"></i>
                </div>
            </div>
        </div>
        <div class="glass-divider fade-in-up d2"></div>
        <h1 class="fade-in-up d2">Sedang Dalam Pemeliharaan</h1>
        <p class="fade-in-up d3">Maaf, saat ini kami sedang melakukan pemeliharaan untuk meningkatkan layanan. Kami akan segera kembali. Terima kasih atas kesabaran Anda.</p>
        <div class="fade-in-up d4">
            <a href="/" class="btn-primary">
                <i class="fas fa-home"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</body>

</html>
