<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\GalleryImage;
use App\Models\BlogPost;
use App\Models\CompanyInfo;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CompanyProfileController extends Controller
{
    private const CACHE_TTL = 600;
    private const CACHE_TTL_SHORT = 300;
    private const CACHE_COMPANY = 'company_info';
    private const CACHE_ABOUT = 'about_first';

    private function companyInfo()
    {
        return Cache::remember(self::CACHE_COMPANY, self::CACHE_TTL, function () {
            return CompanyInfo::with('media')->first();
        });
    }

    private function aboutInfo()
    {
        return Cache::remember(self::CACHE_ABOUT, self::CACHE_TTL, function () {
            return About::with('media')->first();
        });
    }

    private function setSEO($title, $description, $keywords = null, $image = null, $type = 'website', $publishedTime = null, $modifiedTime = null, $authorName = null)
    {
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        if ($keywords) {
            SEOMeta::setKeywords($keywords);
        }
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', $type);
        OpenGraph::addProperty('locale', 'id_ID');

        TwitterCard::setTitle($title);
        TwitterCard::setDescription($description);
        TwitterCard::setType('summary_large_image');

        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::setType($type === 'article' ? 'Article' : 'WebPage');
        JsonLd::setUrl(url()->current());

        if ($type === 'article') {
            if ($publishedTime) {
                OpenGraph::addProperty('article:published_time', $publishedTime);
                JsonLd::addValue('datePublished', $publishedTime);
            }
            if ($modifiedTime) {
                OpenGraph::addProperty('article:modified_time', $modifiedTime);
                JsonLd::addValue('dateModified', $modifiedTime);
            }
            if ($authorName) {
                JsonLd::addValue('author', [
                    '@type' => 'Person',
                    'name' => $authorName
                ]);
            }
        }
        elseif (!$authorName) {
            JsonLd::addValue('author', [
                '@type' => 'Organization',
                'name' => 'Profil Perusahaan'
            ]);
        }

        if ($image) {
            OpenGraph::addImage($image);
            TwitterCard::setImage($image);
            JsonLd::addValue('image', $image);
        }
    }

    public function index()
    {
        $data = Cache::remember('homepage', self::CACHE_TTL, function () {
            return [
            'hero' => Hero::with('media')->orderBy('created_at', 'desc')->get(),
            'about' => About::with('media')->first(),
            'services' => Service::orderBy('order')->limit(8)->get(),
            'portfolios' => Portfolio::with('media')->where('is_published', true)->limit(8)->get(),
            'galleryImages' => GalleryImage::with('media')->limit(8)->get(),
            'blogPosts' => BlogPost::with('media')->where('is_published', true)->latest()->limit(8)->get(),
            'companyInfo' => CompanyInfo::with('media')->first(),
            ];
        });

        extract($data);

        $this->setSEO(
            'Beranda - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'),
            $companyInfo->meta_description ?? 'Profil resmi perusahaan kami',
            $companyInfo->meta_keywords ?? 'profil perusahaan, jasa, layanan'
        );

        return view('spa', $data);
    }

    public function about()
    {
        $data = Cache::remember('about_page', self::CACHE_TTL, function () {
            return [
            'about' => About::with('media')->first(),
            'companyInfo' => CompanyInfo::with('media')->first(),
            ];
        });

        extract($data);

        $this->setSEO(
            'Tentang Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'),
            $about->meta_description ?? 'Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami',
            $about->meta_keywords ?? 'tentang, perusahaan, visi, misi'
        );

        return view('about', $data);
    }

    public function services()
    {
        $page = request('page', 1);
        $data = Cache::remember('services_page_' . $page, self::CACHE_TTL, function () {
            return [
            'services' => Service::orderBy('order')->paginate(6),
            'about' => About::with('media')->first(),
            'companyInfo' => CompanyInfo::with('media')->first(),
            ];
        });

        extract($data);

        $this->setSEO(
            'Layanan Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'),
            $companyInfo->meta_description ?? 'Jelajahi berbagai layanan profesional komprehensif kami',
            $companyInfo->meta_keywords ?? 'layanan, solusi, layanan profesional'
        );

        return view('services', $data);
    }

    public function portfolio()
    {
        $page = request('page', 1);
        $perPage = request('per_page', 6);
        $data = Cache::remember('portfolio_page_' . $perPage . '_' . $page, self::CACHE_TTL, function () use ($perPage) {
            return [
            'portfolios' => Portfolio::with('media')->where('is_published', true)->paginate($perPage),
            'about' => About::with('media')->first(),
            'companyInfo' => CompanyInfo::with('media')->first(),
            ];
        });

        extract($data);

        $this->setSEO(
            'Portofolio Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'),
            $companyInfo->meta_description ?? 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami',
            $companyInfo->meta_keywords ?? 'portofolio, proyek, pencapaian, pekerjaan'
        );

        return view('portfolio', $data);
    }

    public function gallery()
    {
        $page = request('page', 1);
        $perPage = request('per_page', 8);
        $data = Cache::remember('gallery_page_' . $perPage . '_' . $page, self::CACHE_TTL, function () use ($perPage) {
            return [
            'galleryImages' => GalleryImage::with('media')->paginate($perPage),
            'about' => About::with('media')->first(),
            'companyInfo' => CompanyInfo::with('media')->first(),
            ];
        });

        extract($data);

        $this->setSEO(
            'Galeri - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'),
            $companyInfo->meta_description ?? 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami',
            $companyInfo->meta_keywords ?? 'galeri, foto, gambar, momen'
        );

        return view('gallery', $data);
    }

    public function contact()
    {
        $data = Cache::remember('contact_page', self::CACHE_TTL, function () {
            return [
            'about' => About::with('media')->first(),
            'companyInfo' => CompanyInfo::with('media')->first(),
            ];
        });

        extract($data);

        $this->setSEO(
            'Hubungi Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'),
            $companyInfo->meta_description ?? 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi',
            $companyInfo->meta_keywords ?? 'kontak, hubungi, dukungan, kolaborasi'
        );

        return view('contact', $data);
    }

    public function blog()
    {
        $page = request('page', 1);
        $perPage = request('per_page', 6);
        $data = Cache::remember('blog_page_' . $perPage . '_' . $page, self::CACHE_TTL, function () use ($perPage, $page) {
            Log::info('CACHE MISS: blog_page', [
                'page' => $page,
                'per_page' => $perPage,
                'url' => request()->fullUrl()
            ]);
            return [
            'latestPosts' => BlogPost::with('media')->where('is_published', true)->orderBy('created_at', 'desc')->take(5)->get(),
            'popularPosts' => BlogPost::with('media')->where('is_published', true)->orderBy('views_count', 'desc')->take(5)->get(),
            'blogPosts' => BlogPost::with('media')->where('is_published', true)->orderBy('created_at', 'desc')->paginate($perPage),
            'companyInfo' => CompanyInfo::with('media')->first(),
            ];
        });

        extract($data);

        $this->setSEO(
            'Blog - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'),
            $companyInfo->meta_description ?? 'Tetap terupdate dengan berita dan wawasan terbaru kami',
            $companyInfo->meta_keywords ?? 'blog, berita, update perusahaan, wawasan'
        );

        return view('blog', $data);
    }

    public function blogDetail($slug)
    {
        try {
            $data = Cache::remember('blog_detail_page_' . $slug, self::CACHE_TTL_SHORT, function () use ($slug) {
                Log::info('CACHE MISS: blog_detail_page_' . $slug);
                $post = BlogPost::with('media')->where('slug', $slug)->where('is_published', true)->firstOrFail();
                return [
                'post' => $post,
                'relatedPosts' => BlogPost::with('media')->where('is_published', true)->where('id', '!=', $post->id)->inRandomOrder()->limit(5)->get(),
                'companyInfo' => CompanyInfo::with('media')->first(),
                ];
            });
        }
        catch (\Exception $e) {
            Log::error('Error load blog detail', [
                'slug' => $slug,
                'message' => $e->getMessage(),
                'user_ip' => request()->ip()
            ]);

            abort(404);
        }

        extract($data);

        // Views count increment is now handled via AJAX

        $this->setSEO(
            $post->meta_title ?? $post->title,
            $post->meta_description ?? Str::limit(strip_tags($post->content), 155),
            $post->meta_keywords ?? 'blog, artikel, berita',
            $post->getFirstMedia('image') ? $post->getFirstMedia('image')->getFullUrl() : null,
            'article',
            $post->created_at->toIso8601String(),
            ($post->updated_at ?? $post->created_at)->toIso8601String(),
            $post->author ?? 'Admin'
        );

        return view('blog-detail', $data);
    }
    public function incrementBlogView($id)
    {
        try {
            $post = BlogPost::findOrFail($id);
            \App\Models\BlogPost::withoutEvents(function () use ($post) {
                $post->increment('views_count');
            });
            return response()->json(['success' => true, 'views_count' => $post->views_count]);
        }
        catch (\Exception $e) {
            Log::warning('Blog tidak ditemukan (increment view)', [
                'id' => $id,
                'user_ip' => request()->ip()
            ]);
            return response()->json(['success' => false, 'message' => 'Post not found'], 404);
        }
    }
}
