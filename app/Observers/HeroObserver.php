<?php

namespace App\Observers;

use App\Models\Hero;
use Illuminate\Support\Facades\Cache;

class HeroObserver
{
    private function clearCache(Hero $hero): void
    {
        \Spatie\ResponseCache\Facades\ResponseCache::clear();
        Cache::forget('homepage');
    }

    public function saved(Hero $hero): void
    {
        $this->clearCache($hero);
    }

    public function deleted(Hero $hero): void
    {
        $this->clearCache($hero);
    }
}
