<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceObserver
{
    private function clearCache(Service $service): void
    {
        \Spatie\ResponseCache\Facades\ResponseCache::clear();
        Cache::forget('homepage');
        
        // Clear paginated caches
        for ($i = 1; $i <= 10; $i++) {
            Cache::forget('services_page_' . $i);
        }
    }

    public function saved(Service $service): void
    {
        $this->clearCache($service);
    }

    public function deleted(Service $service): void
    {
        $this->clearCache($service);
    }
}
