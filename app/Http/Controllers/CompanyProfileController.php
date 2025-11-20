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

class CompanyProfileController extends Controller
{
    public function index()
    {
        $hero = Hero::orderBy('created_at', 'desc')->get();
        $about = About::first();
        $services = Service::orderBy('order')->get();
        $portfolios = Portfolio::where('is_published', true)->get();
        $galleryImages = GalleryImage::all();
        $blogPosts = BlogPost::where('is_published', true)->limit(3)->get(); // Limit to 3 posts for homepage
        $companyInfo = CompanyInfo::first();

        return view('spa', compact('hero', 'about', 'services', 'portfolios', 'galleryImages', 'blogPosts', 'companyInfo'));
    }

    public function blog()
    {
        $blogPosts = BlogPost::where('is_published', true)->paginate(9);
        $companyInfo = CompanyInfo::first();

        return view('blog', compact('blogPosts', 'companyInfo'));
    }

    public function blogDetail($slug)
    {
        $post = BlogPost::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedPosts = BlogPost::where('is_published', true)->where('id', '!=', $post->id)->limit(3)->get();
        $companyInfo = CompanyInfo::first();

        return view('blog-detail', compact('post', 'relatedPosts', 'companyInfo'));
    }
}
