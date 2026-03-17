<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \App\Models\Hero::observe(\App\Observers\HeroObserver::class);
        \App\Models\About::observe(\App\Observers\AboutObserver::class);
        \App\Models\Service::observe(\App\Observers\ServiceObserver::class);
        \App\Models\Portfolio::observe(\App\Observers\PortfolioObserver::class);
        \App\Models\GalleryImage::observe(\App\Observers\GalleryImageObserver::class);
        \App\Models\BlogPost::observe(\App\Observers\BlogPostObserver::class);
        \App\Models\CompanyInfo::observe(\App\Observers\CompanyInfoObserver::class);
    }
}
