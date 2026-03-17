<?php

namespace App\Observers;

use App\Models\GalleryImage;
use Illuminate\Support\Facades\Cache;

class GalleryImageObserver
{
    private function clearCache(GalleryImage $galleryImage): void
    {
        \Spatie\ResponseCache\Facades\ResponseCache::clear();
        Cache::forget('homepage');
        
        // Clear paginated caches
        for ($i = 1; $i <= 10; $i++) {
            Cache::forget('gallery_page_8_' . $i);
        }
    }

    public function saved(GalleryImage $galleryImage): void
    {
        $this->clearCache($galleryImage);
    }

    public function deleted(GalleryImage $galleryImage): void
    {
        $this->clearCache($galleryImage);
    }
}
