<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyProfileController;

Route::get('/', [CompanyProfileController::class, 'index'])->name('home');
Route::get('/about', [CompanyProfileController::class, 'about'])->name('about');
Route::get('/services', [CompanyProfileController::class, 'services'])->name('services');
Route::get('/portfolio', [CompanyProfileController::class, 'portfolio'])->name('portfolio');
Route::get('/gallery', [CompanyProfileController::class, 'gallery'])->name('gallery');
Route::get('/contact', [CompanyProfileController::class, 'contact'])->name('contact');
Route::get('/blog', [CompanyProfileController::class, 'blog'])->name('blog.index');
Route::get('/blog/{slug}', [CompanyProfileController::class, 'blogDetail'])->name('blog.detail');

// Sitemap.xml (dynamic) using Spatie Sitemap
Route::get('/sitemap.xml', function () {
    $sitemap = \Spatie\Sitemap\Sitemap::create()
        ->add(\Spatie\Sitemap\Tags\Url::create(route('home'))
            ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(1.0))
        ->add(\Spatie\Sitemap\Tags\Url::create(route('about'))
            ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.9))
        ->add(\Spatie\Sitemap\Tags\Url::create(route('services'))
            ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.9))
        ->add(\Spatie\Sitemap\Tags\Url::create(route('portfolio'))
            ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.9))
        ->add(\Spatie\Sitemap\Tags\Url::create(route('gallery'))
            ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.9))
        ->add(\Spatie\Sitemap\Tags\Url::create(route('contact'))
            ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.9))
        ->add(\Spatie\Sitemap\Tags\Url::create(route('blog.index'))
            ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8));

    // Only query blog posts when the sitemap is actually requested
    if (\Illuminate\Support\Facades\Schema::hasTable('blog_posts')) {
        foreach (\App\Models\BlogPost::where('is_published', true)->get() as $post) {
            $sitemap->add(
                \Spatie\Sitemap\Tags\Url::create(route('blog.detail', $post->slug))
                    ->setLastModificationDate($post->updated_at ?? $post->created_at)
                    ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        }
    }

    return $sitemap->toResponse(request());
});
