<?php

namespace App\Observers;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Cache;

class PortfolioObserver
{
    private function clearCache(Portfolio $portfolio): void
    {
        \Spatie\ResponseCache\Facades\ResponseCache::clear();
        Cache::forget('homepage');
        
        // Clear paginated caches
        for ($i = 1; $i <= 10; $i++) {
            Cache::forget('portfolio_page_6_' . $i);
        }
    }

    public function saved(Portfolio $portfolio): void
    {
        $this->clearCache($portfolio);
    }

    public function deleted(Portfolio $portfolio): void
    {
        $this->clearCache($portfolio);
    }
}
