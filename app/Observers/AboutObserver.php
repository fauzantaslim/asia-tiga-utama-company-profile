<?php

namespace App\Observers;

use App\Models\About;
use Illuminate\Support\Facades\Cache;

class AboutObserver
{
    private function clearCache(About $about): void
    {
        \Spatie\ResponseCache\Facades\ResponseCache::clear();
        Cache::forget('homepage');
        Cache::forget('about_page');
        Cache::forget('contact_page');
        
        // Clear paginated caches
        for ($i = 1; $i <= 10; $i++) {
            Cache::forget('services_page_' . $i);
            Cache::forget('portfolio_page_6_' . $i);
            Cache::forget('gallery_page_8_' . $i);
            Cache::forget('blog_page_6_' . $i);
        }

        // Clear all blog detail pages as they display about info inside SEO or layout
        $slugs = \App\Models\BlogPost::pluck('slug');
        foreach ($slugs as $slug) {
            Cache::forget('blog_detail_page_' . $slug);
        }
    }

    public function saved(About $about): void
    {
        $this->clearCache($about);
    }

    public function deleted(About $about): void
    {
        $this->clearCache($about);
    }
}
