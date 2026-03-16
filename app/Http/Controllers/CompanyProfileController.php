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

class CompanyProfileController extends Controller
{
    public function index()
    {
        $hero = Hero::orderBy('created_at', 'desc')->get();
        $about = About::first();
        $services = Service::orderBy('order')->limit(8)->get();
        $portfolios = Portfolio::where('is_published', true)->limit(8)->get();
        $galleryImages = GalleryImage::limit(8)->get();
        $blogPosts = BlogPost::where('is_published', true)->limit(8)->get(); // Limit to 8 posts for homepage
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Beranda - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Profil resmi perusahaan kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'profil perusahaan, jasa, layanan');
        SEOMeta::setCanonical(url()->current());

        // OpenGraph
        OpenGraph::setTitle('Beranda - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Profil resmi perusahaan kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');

        // Twitter Card
        TwitterCard::setTitle('Beranda - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Profil resmi perusahaan kami');
        TwitterCard::setType('summary_large_image');

        // JSON-LD
        JsonLd::setTitle('Beranda - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        JsonLd::setDescription($companyInfo->meta_description ?? 'Profil resmi perusahaan kami');
        JsonLd::setType('WebPage');
        JsonLd::setUrl(url()->current());
        JsonLd::addValue('author', [
            '@type' => 'Organization',
            'name' => $companyInfo->website_name ?? 'Profil Perusahaan'
        ]);

        return view('spa', compact('hero', 'about', 'services', 'portfolios', 'galleryImages', 'blogPosts', 'companyInfo'));
    }

    public function about()
    {
        $about = About::first();
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Tentang Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($about->meta_description ?? 'Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami');
        SEOMeta::setKeywords($about->meta_keywords ?? 'tentang, perusahaan, visi, misi');
        SEOMeta::setCanonical(url()->current());

        // OpenGraph
        OpenGraph::setTitle('Tentang Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($about->meta_description ?? 'Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');

        // Twitter Card
        TwitterCard::setTitle('Tentang Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($about->meta_description ?? 'Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami');
        TwitterCard::setType('summary_large_image');

        // JSON-LD
        JsonLd::setTitle('Tentang Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        JsonLd::setDescription($about->meta_description ?? 'Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami');
        JsonLd::setType('WebPage');
        JsonLd::setUrl(url()->current());

        return view('about', compact('about', 'companyInfo'));
    }

    public function services()
    {
        $services = Service::orderBy('order')->paginate(6);
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Layanan Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Jelajahi berbagai layanan profesional komprehensif kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'layanan, solusi, layanan profesional');
        SEOMeta::setCanonical(url()->current());

        // OpenGraph
        OpenGraph::setTitle('Layanan Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Jelajahi berbagai layanan profesional komprehensif kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');

        // Twitter Card
        TwitterCard::setTitle('Layanan Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Jelajahi berbagai layanan profesional komprehensif kami');
        TwitterCard::setType('summary_large_image');

        // JSON-LD
        JsonLd::setTitle('Layanan Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        JsonLd::setDescription($companyInfo->meta_description ?? 'Jelajahi berbagai layanan profesional komprehensif kami');
        JsonLd::setType('WebPage');
        JsonLd::setUrl(url()->current());

        return view('services', compact('services', 'companyInfo'));
    }

    public function portfolio()
    {
        $portfolios = Portfolio::where('is_published', true)->paginate(request('per_page', 6));
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Portofolio Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'portofolio, proyek, pencapaian, pekerjaan');
        SEOMeta::setCanonical(url()->current());

        // OpenGraph
        OpenGraph::setTitle('Portofolio Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');

        // Twitter Card
        TwitterCard::setTitle('Portofolio Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami');
        TwitterCard::setType('summary_large_image');

        // JSON-LD
        JsonLd::setTitle('Portofolio Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        JsonLd::setDescription($companyInfo->meta_description ?? 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami');
        JsonLd::setType('WebPage');
        JsonLd::setUrl(url()->current());

        return view('portfolio', compact('portfolios', 'companyInfo'));
    }

    public function gallery()
    {
        $galleryImages = GalleryImage::paginate(request('per_page', 8));
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Galeri - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'galeri, foto, gambar, momen');
        SEOMeta::setCanonical(url()->current());

        // OpenGraph
        OpenGraph::setTitle('Galeri - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');

        // Twitter Card
        TwitterCard::setTitle('Galeri - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami');
        TwitterCard::setType('summary_large_image');

        // JSON-LD
        JsonLd::setTitle('Galeri - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        JsonLd::setDescription($companyInfo->meta_description ?? 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami');
        JsonLd::setType('WebPage');
        JsonLd::setUrl(url()->current());

        return view('gallery', compact('galleryImages', 'companyInfo'));
    }

    public function contact()
    {
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Hubungi Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'kontak, hubungi, dukungan, kolaborasi');
        SEOMeta::setCanonical(url()->current());

        // OpenGraph
        OpenGraph::setTitle('Hubungi Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');

        // Twitter Card
        TwitterCard::setTitle('Hubungi Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi');
        TwitterCard::setType('summary_large_image');

        // JSON-LD
        JsonLd::setTitle('Hubungi Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        JsonLd::setDescription($companyInfo->meta_description ?? 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi');
        JsonLd::setType('WebPage');
        JsonLd::setUrl(url()->current());

        return view('contact', compact('companyInfo'));
    }

    public function blog()
    {
        $latestPosts = BlogPost::where('is_published', true)->orderBy('created_at', 'desc')->take(5)->get();
        // Using inRandomOrder as fallback for popular posts since there's no view count column
        $popularPosts = BlogPost::where('is_published', true)->inRandomOrder()->take(5)->get();
        $blogPosts = BlogPost::where('is_published', true)->orderBy('created_at', 'desc')->paginate(request('per_page', 6));
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Blog - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Tetap terupdate dengan berita dan wawasan terbaru kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'blog, berita, update perusahaan, wawasan');
        SEOMeta::setCanonical(url()->current());

        // OpenGraph
        OpenGraph::setTitle('Blog - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Tetap terupdate dengan berita dan wawasan terbaru kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');

        // Twitter Card
        TwitterCard::setTitle('Blog - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Tetap terupdate dengan berita dan wawasan terbaru kami');
        TwitterCard::setType('summary_large_image');

        // JSON-LD
        JsonLd::setTitle('Blog - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        JsonLd::setDescription($companyInfo->meta_description ?? 'Tetap terupdate dengan berita dan wawasan terbaru kami');
        JsonLd::setType('Blog');
        JsonLd::setUrl(url()->current());

        return view('blog', compact('latestPosts', 'popularPosts', 'blogPosts', 'companyInfo'));
    }

    public function blogDetail($slug)
    {
        $post = BlogPost::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedPosts = BlogPost::where('is_published', true)->where('id', '!=', $post->id)->limit(5)->get();
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle($post->meta_title ?? $post->title);
        SEOMeta::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 155));
        SEOMeta::setKeywords($post->meta_keywords ?? 'blog, artikel, berita');
        SEOMeta::setCanonical(url()->current());

        // OpenGraph
        OpenGraph::setTitle($post->meta_title ?? $post->title);
        OpenGraph::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 155));
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('article:published_time', $post->created_at->toIso8601String());
        OpenGraph::addProperty('article:modified_time', ($post->updated_at ?? $post->created_at)->toIso8601String());

        if ($post->getFirstMedia('image')) {
            OpenGraph::addImage($post->getFirstMedia('image')->getFullUrl());
        }

        // Twitter Card
        TwitterCard::setTitle($post->meta_title ?? $post->title);
        TwitterCard::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 155));
        TwitterCard::setType('summary_large_image');

        if ($post->getFirstMedia('image')) {
            TwitterCard::setImage($post->getFirstMedia('image')->getFullUrl());
        }

        // JSON-LD
        JsonLd::setTitle($post->meta_title ?? $post->title);
        JsonLd::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 155));
        JsonLd::setType('Article');
        JsonLd::setUrl(url()->current());
        JsonLd::addValue('datePublished', $post->created_at->toIso8601String());
        JsonLd::addValue('dateModified', ($post->updated_at ?? $post->created_at)->toIso8601String());
        JsonLd::addValue('author', [
            '@type' => 'Person',
            'name' => $post->author ?? 'Admin'
        ]);

        if ($post->getFirstMedia('image')) {
            JsonLd::addValue('image', $post->getFirstMedia('image')->getFullUrl());
        }

        return view('blog-detail', compact('post', 'relatedPosts', 'companyInfo'));
    }
}
