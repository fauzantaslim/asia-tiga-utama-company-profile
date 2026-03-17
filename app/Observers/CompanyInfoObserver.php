<?php

namespace App\Observers;

use App\Models\CompanyInfo;
use Illuminate\Support\Facades\Cache;

class CompanyInfoObserver
{
    private function clearCache(CompanyInfo $companyInfo): void
    {
        \Spatie\ResponseCache\Facades\ResponseCache::clear();
        Cache::forget('homepage');
        Cache::forget('about_page');
        Cache::forget('contact_page');
        Cache::forget('company_info'); // specifically used by AdminPanelProvider
        
        // Clear paginated caches
        for ($i = 1; $i <= 10; $i++) {
            Cache::forget('services_page_' . $i);
            Cache::forget('portfolio_page_6_' . $i);
            Cache::forget('gallery_page_8_' . $i);
            Cache::forget('blog_page_6_' . $i);
        }

        // Clear all blog detail pages as they display company info
        $slugs = \App\Models\BlogPost::pluck('slug');
        foreach ($slugs as $slug) {
            Cache::forget('blog_detail_page_' . $slug);
        }
    }

    public function saved(CompanyInfo $companyInfo): void
    {
        $this->clearCache($companyInfo);
    }

    public function deleted(CompanyInfo $companyInfo): void
    {
        $this->clearCache($companyInfo);
    }
}
