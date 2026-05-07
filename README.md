# Asia Tiga Utama — Company Profile

Website company profile untuk **Asia Tiga Utama** yang dibangun dengan Laravel 12, Filament 4, dan Tailwind CSS 4. Dilengkapi dengan CMS admin panel, SEO tools, response caching, serta navigasi SPA menggunakan Hotwire Turbo.

---

## Tech Stack

| Layer | Teknologi |
|---|---|
| **Backend** | PHP 8.2+, Laravel 12 |
| **Admin Panel** | Filament 4 |
| **Frontend** | Blade, Alpine.js, Tailwind CSS 4, Vite 7 |
| **SPA Navigation** | Hotwire Turbo |
| **UI Components** | Swiper.js, AOS (Animate On Scroll), NProgress, Fancybox |
| **PDF Flipbook** | PDF.js, PageFlip |
| **Media Library** | Spatie Media Library + Filament Plugin |
| **SEO** | Artesaos SEOTools, Spatie Sitemap |
| **Caching** | Spatie Response Cache |
| **Image Processing** | Intervention Image |
| **Activity Log** | Spatie Activity Log |
| **Google Fonts** | Spatie Laravel Google Fonts |
| **Database** | MySQL |

---

## Fitur Utama

- **Homepage SPA** — Landing page lengkap dengan hero slider, about, services, portfolio, gallery, blog, dan contact dalam satu halaman
- **Admin Panel (Filament 4)** — Kelola semua konten website melalui dashboard admin yang modern
- **Blog** — Sistem blog dengan views counter, artikel terkait, dan pagination
- **Portfolio** — Showcase proyek dengan media management
- **Gallery** — Galeri foto dengan lightbox (Fancybox)
- **PDF Flipbook** — Tampilan dokumen PDF interaktif dengan efek page-flip
- **Dynamic Sitemap** — Sitemap XML otomatis untuk SEO
- **SEO Optimized** — Meta tags, Open Graph, Twitter Card, dan JSON-LD terstruktur
- **Response Caching** — Performa cepat dengan caching pada setiap halaman
- **Activity Logging** — Pencatatan aktivitas pada setiap perubahan data
- **Image Processing** — Optimasi gambar otomatis via Intervention Image

---

## Struktur Proyek

```
├── app/
│   ├── Console/              # Artisan commands
│   ├── Filament/Resources/   # Admin panel resources (CRUD)
│   │   ├── Abouts/
│   │   ├── BlogPosts/
│   │   ├── CompanyInfos/
│   │   ├── GalleryImages/
│   │   ├── Heroes/
│   │   ├── Portofolios/
│   │   ├── Services/
│   │   ├── Users/
│   │   └── ActivityLogResource.php
│   ├── Http/Controllers/
│   │   └── CompanyProfileController.php   # Controller utama
│   ├── Models/               # Eloquent models
│   │   ├── About.php
│   │   ├── BlogPost.php
│   │   ├── CompanyInfo.php
│   │   ├── GalleryImage.php
│   │   ├── Hero.php
│   │   ├── Portfolio.php
│   │   ├── Service.php
│   │   └── User.php
│   ├── Observers/            # Model observers (cache invalidation & logging)
│   ├── Providers/
│   ├── Services/
│   │   └── ImageProcessingService.php
│   └── Traits/
│       └── LogsActivity.php
├── database/
│   ├── migrations/           # Skema database
│   └── seeders/              # Data awal (heroes, about, services, dll.)
├── resources/
│   ├── css/                  # Stylesheet (Tailwind CSS)
│   ├── js/
│   │   ├── app.js            # Entry point (Alpine, Swiper, Turbo, AOS)
│   │   └── flipbook.js       # PDF flipbook module
│   └── views/
│       ├── layouts/          # Layout templates
│       ├── spa.blade.php     # Homepage SPA
│       ├── about.blade.php
│       ├── blog.blade.php
│       ├── blog-detail.blade.php
│       ├── contact.blade.php
│       ├── gallery.blade.php
│       ├── portfolio.blade.php
│       ├── services.blade.php
│       └── errors/           # Custom error pages
├── routes/
│   └── web.php               # Route definitions
├── composer.json
├── package.json
└── vite.config.js
```

---

## Halaman & Route

| Route | Nama | Deskripsi |
|---|---|---|
| `/` | `home` | Homepage dengan semua section |
| `/about` | `about` | Halaman tentang perusahaan |
| `/services` | `services` | Daftar layanan (paginated) |
| `/portfolio` | `portfolio` | Showcase portofolio (paginated) |
| `/gallery` | `gallery` | Galeri foto (paginated) |
| `/blog` | `blog.index` | Daftar artikel blog (paginated) |
| `/blog/{slug}` | `blog.detail` | Detail artikel blog |
| `/contact` | `contact` | Halaman kontak |
| `/sitemap.xml` | — | Dynamic XML sitemap |
| `/admin` | — | Filament admin panel |

---

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL
- Ekstensi PHP: `gd` atau `imagick` (untuk Intervention Image)

---

## Instalasi

### 1. Clone Repository

```bash
git clone <repository-url>
cd asia-tiga-utama-company-profile
```

### 2. Setup Otomatis (Rekomendasi)

Project ini menyediakan script setup yang menjalankan semua langkah instalasi sekaligus:

```bash
composer setup
```

Script ini akan menjalankan:
- `composer install` — Install dependensi PHP
- Copy `.env.example` → `.env`
- `php artisan key:generate` — Generate application key
- `php artisan migrate --force` — Jalankan migrasi database
- `npm install` — Install dependensi Node.js
- `npm run build` — Build asset frontend

### 3. Konfigurasi Environment

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=asia_tiga_utama_company_profile
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Seed Database (Opsional)

Untuk mengisi data awal (demo):

```bash
php artisan db:seed
```

Ini akan membuat:
- User admin default (`test@example.com` / `password`)
- Data hero, about, services, portfolio, gallery, blog, dan company info

### 5. Link Storage

```bash
php artisan storage:link
```

---

## Menjalankan Aplikasi

### Mode Development

Gunakan script `composer dev` yang menjalankan semua service secara bersamaan:

```bash
composer dev
```

Script ini akan menjalankan secara paralel:
- **Server** — `php artisan serve`
- **Queue** — `php artisan queue:listen --tries=1`
- **Vite** — `npm run dev` (hot reload)

### Build Production

```bash
npm run build
```

---

## Admin Panel

Akses admin panel melalui `/admin`. Login menggunakan akun yang sudah di-seed atau buat akun baru:

```bash
php artisan make:filament-user
```

### Resource yang Tersedia

| Resource | Deskripsi |
|---|---|
| Heroes | Kelola hero slider pada homepage |
| Abouts | Informasi tentang perusahaan |
| Services | Daftar layanan perusahaan |
| Portofolios | Proyek dan portofolio |
| Gallery Images | Galeri foto |
| Blog Posts | Artikel dan berita |
| Company Infos | Informasi umum perusahaan (nama, kontak, meta SEO) |
| Users | Manajemen pengguna |
| Activity Log | Log aktivitas perubahan data |

---

## Testing

```bash
composer test
```

Atau jalankan langsung:

```bash
php artisan test
```

---

## Lisensi

MIT
