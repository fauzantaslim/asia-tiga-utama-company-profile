<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Cache;

class BlogPostObserver
{
    private function clearCache(BlogPost $blogPost): void
    {
        \Spatie\ResponseCache\Facades\ResponseCache::clear();
        Cache::forget('homepage');
        Cache::forget('blog_detail_page_' . $blogPost->slug);
        
        // Clear paginated caches
        for ($i = 1; $i <= 10; $i++) {
            Cache::forget('blog_page_6_' . $i);
        }
    }

    public function saved(BlogPost $blogPost): void
    {
        $this->clearCache($blogPost);
    }

    public function deleted(BlogPost $blogPost): void
    {
        $this->clearCache($blogPost);
    }
}
