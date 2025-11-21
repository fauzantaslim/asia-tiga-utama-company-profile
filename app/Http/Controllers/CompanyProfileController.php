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

class CompanyProfileController extends Controller
{
    public function index()
    {
        $hero = Hero::orderBy('created_at', 'desc')->get();
        $about = About::first();
        $services = Service::orderBy('order')->limit(3)->get();
        $portfolios = Portfolio::where('is_published', true)->limit(3)->get();
        $galleryImages = GalleryImage::limit(4)->get();
        $blogPosts = BlogPost::where('is_published', true)->limit(3)->get(); // Limit to 3 posts for homepage
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Beranda - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Profil resmi perusahaan kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'profil perusahaan, jasa, layanan');

        // OpenGraph
        OpenGraph::setTitle('Beranda - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Profil resmi perusahaan kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Beranda - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Profil resmi perusahaan kami');

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

        // OpenGraph
        OpenGraph::setTitle('Tentang Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($about->meta_description ?? 'Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Tentang Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($about->meta_description ?? 'Pelajari lebih lanjut tentang perusahaan kami, visi, dan misi kami');

        return view('about', compact('about', 'companyInfo'));
    }

    public function services()
    {
        $services = Service::orderBy('order')->get();
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Layanan Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Jelajahi berbagai layanan profesional komprehensif kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'layanan, solusi, layanan profesional');

        // OpenGraph
        OpenGraph::setTitle('Layanan Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Jelajahi berbagai layanan profesional komprehensif kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Layanan Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Jelajahi berbagai layanan profesional komprehensif kami');

        return view('services', compact('services', 'companyInfo'));
    }

    public function portfolio()
    {
        $portfolios = Portfolio::where('is_published', true)->get();
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Portofolio Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'portofolio, proyek, pencapaian, pekerjaan');

        // OpenGraph
        OpenGraph::setTitle('Portofolio Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Portofolio Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Jelajahi portofolio proyek-proyek sukses dan pencapaian kami');

        return view('portfolio', compact('portfolios', 'companyInfo'));
    }

    public function gallery()
    {
        $galleryImages = GalleryImage::all();
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Galeri - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'galeri, foto, gambar, momen');

        // OpenGraph
        OpenGraph::setTitle('Galeri - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Galeri - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Jelajahi galeri foto kami yang menampilkan pekerjaan dan momen kami');

        return view('gallery', compact('galleryImages', 'companyInfo'));
    }

    public function contact()
    {
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Hubungi Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'kontak, hubungi, dukungan, kolaborasi');

        // OpenGraph
        OpenGraph::setTitle('Hubungi Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Hubungi Kami - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Hubungi kami untuk pertanyaan, dukungan, atau peluang kolaborasi');

        return view('contact', compact('companyInfo'));
    }

    public function blog()
    {
        $blogPosts = BlogPost::where('is_published', true)->paginate(9);
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle('Blog - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        SEOMeta::setDescription($companyInfo->meta_description ?? 'Tetap terupdate dengan berita dan wawasan terbaru kami');
        SEOMeta::setKeywords($companyInfo->meta_keywords ?? 'blog, berita, update perusahaan, wawasan');

        // OpenGraph
        OpenGraph::setTitle('Blog - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        OpenGraph::setDescription($companyInfo->meta_description ?? 'Tetap terupdate dengan berita dan wawasan terbaru kami');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');

        // Twitter Card
        TwitterCard::setTitle('Blog - ' . ($companyInfo->website_name ?? 'Profil Perusahaan'));
        TwitterCard::setDescription($companyInfo->meta_description ?? 'Tetap terupdate dengan berita dan wawasan terbaru kami');

        return view('blog', compact('blogPosts', 'companyInfo'));
    }

    public function blogDetail($slug)
    {
        $post = BlogPost::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedPosts = BlogPost::where('is_published', true)->where('id', '!=', $post->id)->limit(3)->get();
        $companyInfo = CompanyInfo::first();

        // SEO Meta Tags
        SEOMeta::setTitle($post->meta_title ?? $post->title);
        SEOMeta::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 160));
        SEOMeta::setKeywords($post->meta_keywords ?? 'blog, artikel, berita');

        // OpenGraph
        OpenGraph::setTitle($post->meta_title ?? $post->title);
        OpenGraph::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 160));
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');

        if ($post->getFirstMedia('image')) {
            OpenGraph::addImage($post->getFirstMedia('image')->getFullUrl());
        }

        // Twitter Card
        TwitterCard::setTitle($post->meta_title ?? $post->title);
        TwitterCard::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 160));

        if ($post->getFirstMedia('image')) {
            TwitterCard::setImage($post->getFirstMedia('image')->getFullUrl());
        }

        return view('blog-detail', compact('post', 'relatedPosts', 'companyInfo'));
    }
}
