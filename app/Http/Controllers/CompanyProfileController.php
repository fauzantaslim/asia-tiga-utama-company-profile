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
        $hero = Hero::first();
        $about = About::first();
        $services = Service::orderBy('order')->get();
        $portfolios = Portfolio::where('is_published', true)->get();
        $galleryImages = GalleryImage::all();
        $blogPosts = BlogPost::where('is_published', true)->get();
        $companyInfo = CompanyInfo::first();

        return view('spa', compact('hero', 'about', 'services', 'portfolios', 'galleryImages', 'blogPosts', 'companyInfo'));
    }
}
