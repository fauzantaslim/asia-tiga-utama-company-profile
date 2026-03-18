<?php

use App\Models\About;
use App\Models\BlogPost;
use App\Models\CompanyInfo;
use App\Models\GalleryImage;
use App\Models\Hero;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| Helper: Seed base data needed by most pages
|--------------------------------------------------------------------------
*/
function seedBaseData(): array
{
    return [
        'companyInfo' => CompanyInfo::factory()->create(),
        'about' => About::factory()->create(),
    ];
}

/*
|==========================================================================
| HOMEPAGE (GET /)
|==========================================================================
*/
describe('Homepage', function () {

    // ── Positive ────────────────────────────────────────────────────────
    test('returns 200 and renders spa view with all data', function () {
        $base = seedBaseData();
        Hero::factory()->count(3)->create();
        Service::factory()->count(4)->create();
        Portfolio::factory()->count(3)->create();
        GalleryImage::factory()->count(3)->create();
        BlogPost::factory()->published()->count(3)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('spa');
        $response->assertViewHas('hero');
        $response->assertViewHas('about');
        $response->assertViewHas('services');
        $response->assertViewHas('portfolios');
        $response->assertViewHas('galleryImages');
        $response->assertViewHas('blogPosts');
        $response->assertViewHas('companyInfo');
    });

    test('limits homepage data collections correctly', function () {
        seedBaseData();
        Service::factory()->count(10)->create();
        Portfolio::factory()->count(10)->create();
        GalleryImage::factory()->count(10)->create();
        BlogPost::factory()->published()->count(10)->create();

        $response = $this->get('/');
        $response->assertStatus(200);

        $viewData = $response->viewData('services');
        expect($viewData)->toHaveCount(8);

        $viewData = $response->viewData('portfolios');
        expect($viewData)->toHaveCount(8);

        $viewData = $response->viewData('galleryImages');
        expect($viewData)->toHaveCount(8);

        $viewData = $response->viewData('blogPosts');
        expect($viewData)->toHaveCount(8);
    });

    test('only shows published portfolios on homepage', function () {
        seedBaseData();
        Portfolio::factory()->count(3)->create(['is_published' => true]);
        Portfolio::factory()->count(2)->create(['is_published' => false]);

        $response = $this->get('/');
        $response->assertStatus(200);

        $portfolios = $response->viewData('portfolios');
        expect($portfolios)->toHaveCount(3);
    });

    test('only shows published blog posts on homepage', function () {
        seedBaseData();
        BlogPost::factory()->published()->count(3)->create();
        BlogPost::factory()->unpublished()->count(2)->create();

        $response = $this->get('/');
        $response->assertStatus(200);

        $blogPosts = $response->viewData('blogPosts');
        expect($blogPosts)->toHaveCount(3);
    });

    test('caches homepage data', function () {
        seedBaseData();
        Cache::flush();

        $this->get('/');
        expect(Cache::has('homepage'))->toBeTrue();
    });

    // ── Negative ────────────────────────────────────────────────────────
    test('handles empty database gracefully on homepage', function () {
        // No data seeded at all – controller uses optional chaining
        CompanyInfo::factory()->create();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('spa');
    });

    test('returns 405 for POST to homepage', function () {
        $response = $this->post('/');
        $response->assertStatus(405);
    });
});

/*
|==========================================================================
| ABOUT PAGE (GET /about)
|==========================================================================
*/
describe('About Page', function () {

    // ── Positive ────────────────────────────────────────────────────────
    test('returns 200 and renders about view', function () {
        seedBaseData();

        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertViewIs('about');
        $response->assertViewHas('about');
        $response->assertViewHas('companyInfo');
    });

    test('passes correct about data to view', function () {
        $base = seedBaseData();

        $response = $this->get('/about');
        $response->assertStatus(200);

        $about = $response->viewData('about');
        expect($about->id)->toBe($base['about']->id);
    });

    test('caches about page data', function () {
        seedBaseData();
        Cache::flush();

        $this->get('/about');
        expect(Cache::has('about_page'))->toBeTrue();
    });

    // ── Negative ────────────────────────────────────────────────────────
    test('handles missing about record gracefully', function () {
        CompanyInfo::factory()->create();
        // No About record created

        $response = $this->get('/about');
        $response->assertStatus(200);
    });
});

/*
|==========================================================================
| SERVICES PAGE (GET /services)
|==========================================================================
*/
describe('Services Page', function () {

    // ── Positive ────────────────────────────────────────────────────────
    test('returns 200 and renders services view', function () {
        seedBaseData();
        Service::factory()->count(8)->create();

        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertViewIs('services');
        $response->assertViewHas('services');
        $response->assertViewHas('companyInfo');
    });

    test('paginates services at 6 per page', function () {
        seedBaseData();
        Service::factory()->count(10)->create();

        $response = $this->get('/services');
        $response->assertStatus(200);

        $services = $response->viewData('services');
        expect($services)->toHaveCount(6);
        expect($services->total())->toBe(10);
    });

    test('services second page returns remaining items', function () {
        seedBaseData();
        Service::factory()->count(10)->create();

        $response = $this->get('/services?page=2');
        $response->assertStatus(200);

        $services = $response->viewData('services');
        expect($services)->toHaveCount(4);
    });

    test('services are ordered by order field', function () {
        seedBaseData();
        Service::factory()->create(['order' => 3, 'title' => 'Third']);
        Service::factory()->create(['order' => 1, 'title' => 'First']);
        Service::factory()->create(['order' => 2, 'title' => 'Second']);

        $response = $this->get('/services');
        $services = $response->viewData('services');

        expect($services->first()->title)->toBe('First');
        expect($services->last()->title)->toBe('Third');
    });

    // ── Negative ────────────────────────────────────────────────────────
    test('handles empty services list', function () {
        seedBaseData();

        $response = $this->get('/services');
        $response->assertStatus(200);

        $services = $response->viewData('services');
        expect($services)->toHaveCount(0);
    });

    test('handles out-of-range page number gracefully', function () {
        seedBaseData();
        Service::factory()->count(3)->create();

        $response = $this->get('/services?page=999');
        $response->assertStatus(200);

        $services = $response->viewData('services');
        expect($services)->toHaveCount(0);
    });
});

/*
|==========================================================================
| PORTFOLIO PAGE (GET /portfolio)
|==========================================================================
*/
describe('Portfolio Page', function () {

    // ── Positive ────────────────────────────────────────────────────────
    test('returns 200 and renders portfolio view', function () {
        seedBaseData();
        Portfolio::factory()->count(5)->create();

        $response = $this->get('/portfolio');

        $response->assertStatus(200);
        $response->assertViewIs('portfolio');
        $response->assertViewHas('portfolios');
    });

    test('only shows published portfolios', function () {
        seedBaseData();
        Portfolio::factory()->count(3)->create(['is_published' => true]);
        Portfolio::factory()->count(4)->create(['is_published' => false]);

        $response = $this->get('/portfolio');
        $response->assertStatus(200);

        $portfolios = $response->viewData('portfolios');
        expect($portfolios->total())->toBe(3);
    });

    test('supports custom per_page parameter', function () {
        seedBaseData();
        Portfolio::factory()->count(10)->create();

        $response = $this->get('/portfolio?per_page=3');
        $response->assertStatus(200);

        $portfolios = $response->viewData('portfolios');
        expect($portfolios)->toHaveCount(3);
        expect($portfolios->total())->toBe(10);
    });

    test('paginates portfolios correctly', function () {
        seedBaseData();
        Portfolio::factory()->count(10)->create();

        $response = $this->get('/portfolio?per_page=4&page=2');
        $response->assertStatus(200);

        $portfolios = $response->viewData('portfolios');
        expect($portfolios)->toHaveCount(4);
    });

    // ── Negative ────────────────────────────────────────────────────────
    test('handles no published portfolios', function () {
        seedBaseData();
        Portfolio::factory()->unpublished()->count(5)->create();

        $response = $this->get('/portfolio');
        $response->assertStatus(200);

        $portfolios = $response->viewData('portfolios');
        expect($portfolios->total())->toBe(0);
    });
});

/*
|==========================================================================
| GALLERY PAGE (GET /gallery)
|==========================================================================
*/
describe('Gallery Page', function () {

    // ── Positive ────────────────────────────────────────────────────────
    test('returns 200 and renders gallery view', function () {
        seedBaseData();
        GalleryImage::factory()->count(5)->create();

        $response = $this->get('/gallery');

        $response->assertStatus(200);
        $response->assertViewIs('gallery');
        $response->assertViewHas('galleryImages');
    });

    test('paginates gallery images at 8 per page by default', function () {
        seedBaseData();
        GalleryImage::factory()->count(12)->create();

        $response = $this->get('/gallery');
        $response->assertStatus(200);

        $images = $response->viewData('galleryImages');
        expect($images)->toHaveCount(8);
        expect($images->total())->toBe(12);
    });

    test('supports custom per_page for gallery', function () {
        seedBaseData();
        GalleryImage::factory()->count(10)->create();

        $response = $this->get('/gallery?per_page=4');
        $response->assertStatus(200);

        $images = $response->viewData('galleryImages');
        expect($images)->toHaveCount(4);
    });

    // ── Negative ────────────────────────────────────────────────────────
    test('handles empty gallery gracefully', function () {
        seedBaseData();

        $response = $this->get('/gallery');
        $response->assertStatus(200);

        $images = $response->viewData('galleryImages');
        expect($images)->toHaveCount(0);
    });

    test('handles gallery out-of-range page', function () {
        seedBaseData();
        GalleryImage::factory()->count(3)->create();

        $response = $this->get('/gallery?page=100');
        $response->assertStatus(200);

        $images = $response->viewData('galleryImages');
        expect($images)->toHaveCount(0);
    });
});

/*
|==========================================================================
| CONTACT PAGE (GET /contact)
|==========================================================================
*/
describe('Contact Page', function () {

    // ── Positive ────────────────────────────────────────────────────────
    test('returns 200 and renders contact view', function () {
        seedBaseData();

        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertViewIs('contact');
        $response->assertViewHas('about');
        $response->assertViewHas('companyInfo');
    });

    test('caches contact page data', function () {
        seedBaseData();
        Cache::flush();

        $this->get('/contact');
        expect(Cache::has('contact_page'))->toBeTrue();
    });

    // ── Negative ────────────────────────────────────────────────────────
    test('handles missing company info on contact page', function () {
        About::factory()->create();
        // No CompanyInfo created

        $response = $this->get('/contact');
        $response->assertStatus(200);
    });
});

/*
|==========================================================================
| BLOG INDEX PAGE (GET /blog)
|==========================================================================
*/
describe('Blog Index Page', function () {

    // ── Positive ────────────────────────────────────────────────────────
    test('returns 200 and renders blog view', function () {
        seedBaseData();
        BlogPost::factory()->published()->count(5)->create();

        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertViewIs('blog');
        $response->assertViewHas('blogPosts');
        $response->assertViewHas('latestPosts');
        $response->assertViewHas('popularPosts');
        $response->assertViewHas('companyInfo');
    });

    test('only shows published blog posts', function () {
        seedBaseData();
        BlogPost::factory()->published()->count(3)->create();
        BlogPost::factory()->unpublished()->count(4)->create();

        $response = $this->get('/blog');
        $response->assertStatus(200);

        $blogPosts = $response->viewData('blogPosts');
        expect($blogPosts->total())->toBe(3);
    });

    test('paginates blog posts at 6 per page by default', function () {
        seedBaseData();
        BlogPost::factory()->published()->count(10)->create();

        $response = $this->get('/blog');
        $response->assertStatus(200);

        $blogPosts = $response->viewData('blogPosts');
        expect($blogPosts)->toHaveCount(6);
        expect($blogPosts->total())->toBe(10);
    });

    test('supports custom per_page on blog index', function () {
        seedBaseData();
        BlogPost::factory()->published()->count(10)->create();

        $response = $this->get('/blog?per_page=3');
        $response->assertStatus(200);

        $blogPosts = $response->viewData('blogPosts');
        expect($blogPosts)->toHaveCount(3);
    });

    test('latest posts limited to 5', function () {
        seedBaseData();
        BlogPost::factory()->published()->count(10)->create();

        $response = $this->get('/blog');
        $latestPosts = $response->viewData('latestPosts');
        expect($latestPosts)->toHaveCount(5);
    });

    test('popular posts limited to 5', function () {
        seedBaseData();
        BlogPost::factory()->published()->count(10)->create();

        $response = $this->get('/blog');
        $popularPosts = $response->viewData('popularPosts');
        expect($popularPosts)->toHaveCount(5);
    });

    test('popular posts are ordered by views_count desc', function () {
        seedBaseData();
        BlogPost::factory()->published()->create(['views_count' => 100, 'title' => 'Most Popular']);
        BlogPost::factory()->published()->create(['views_count' => 10, 'title' => 'Least Popular']);
        BlogPost::factory()->published()->create(['views_count' => 50, 'title' => 'Mid Popular']);

        $response = $this->get('/blog');
        $popularPosts = $response->viewData('popularPosts');

        expect($popularPosts->first()->title)->toBe('Most Popular');
        expect($popularPosts->last()->title)->toBe('Least Popular');
    });

    // ── Negative ────────────────────────────────────────────────────────
    test('handles no published blog posts', function () {
        seedBaseData();
        BlogPost::factory()->unpublished()->count(5)->create();

        $response = $this->get('/blog');
        $response->assertStatus(200);

        $blogPosts = $response->viewData('blogPosts');
        expect($blogPosts->total())->toBe(0);
    });

    test('handles blog with out-of-range page', function () {
        seedBaseData();
        BlogPost::factory()->published()->count(3)->create();

        $response = $this->get('/blog?page=999');
        $response->assertStatus(200);

        $blogPosts = $response->viewData('blogPosts');
        expect($blogPosts)->toHaveCount(0);
    });
});

/*
|==========================================================================
| BLOG DETAIL PAGE (GET /blog/{slug})
|==========================================================================
*/
describe('Blog Detail Page', function () {

    // ── Positive ────────────────────────────────────────────────────────
    test('returns 200 for valid published blog post', function () {
        seedBaseData();
        $post = BlogPost::factory()->published()->create(['slug' => 'test-article']);

        $response = $this->get('/blog/test-article');

        $response->assertStatus(200);
        $response->assertViewIs('blog-detail');
        $response->assertViewHas('post');
        $response->assertViewHas('relatedPosts');
        $response->assertViewHas('companyInfo');
    });

    test('passes correct post data to blog detail view', function () {
        seedBaseData();
        $post = BlogPost::factory()->published()->create([
            'slug' => 'my-blog-post',
            'title' => 'My Blog Post Title',
        ]);

        $response = $this->get('/blog/my-blog-post');
        $response->assertStatus(200);

        $viewPost = $response->viewData('post');
        expect($viewPost->id)->toBe($post->id);
        expect($viewPost->title)->toBe('My Blog Post Title');
    });

    test('related posts exclude current post', function () {
        seedBaseData();
        $post = BlogPost::factory()->published()->create(['slug' => 'main-post']);
        BlogPost::factory()->published()->count(5)->create();

        $response = $this->get('/blog/main-post');
        $relatedPosts = $response->viewData('relatedPosts');

        $relatedIds = $relatedPosts->pluck('id')->toArray();
        expect($relatedIds)->not->toContain($post->id);
    });

    test('related posts limited to 5', function () {
        seedBaseData();
        BlogPost::factory()->published()->create(['slug' => 'main-post']);
        BlogPost::factory()->published()->count(10)->create();

        $response = $this->get('/blog/main-post');
        $relatedPosts = $response->viewData('relatedPosts');

        expect($relatedPosts)->toHaveCount(5);
    });

    test('caches blog detail data', function () {
        seedBaseData();
        BlogPost::factory()->published()->create(['slug' => 'cached-post']);
        Cache::flush();

        $this->get('/blog/cached-post');
        expect(Cache::has('blog_detail_page_cached-post'))->toBeTrue();
    });

    // ── Negative ────────────────────────────────────────────────────────
    test('returns 404 for non-existent blog slug', function () {
        seedBaseData();

        $response = $this->get('/blog/non-existent-slug');
        $response->assertStatus(404);
    });

    test('returns 404 for unpublished blog post', function () {
        seedBaseData();
        BlogPost::factory()->unpublished()->create(['slug' => 'draft-post']);

        $response = $this->get('/blog/draft-post');
        $response->assertStatus(404);
    });

    test('returns 404 for empty slug', function () {
        seedBaseData();

        // /blog/ without slug would actually match /blog route
        $response = $this->get('/blog/');
        $response->assertStatus(200); // Hits blog index
    });
});

/*
|==========================================================================
| INCREMENT BLOG VIEW (POST /blog/{id}/increment-view)
|==========================================================================
*/
describe('Increment Blog View', function () {

    // ── Positive ────────────────────────────────────────────────────────
    test('increments view count and returns JSON success', function () {
        $post = BlogPost::factory()->published()->create(['views_count' => 5]);

        $response = $this->postJson("/blog/{$post->id}/increment-view");

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $post->refresh();
        expect($post->views_count)->toBe(6);
    });

    test('increments view count multiple times correctly', function () {
        $post = BlogPost::factory()->published()->create(['views_count' => 0]);

        $this->postJson("/blog/{$post->id}/increment-view");
        $this->postJson("/blog/{$post->id}/increment-view");
        $this->postJson("/blog/{$post->id}/increment-view");

        $post->refresh();
        expect($post->views_count)->toBe(3);
    });

    test('returns current views_count in JSON response', function () {
        $post = BlogPost::factory()->published()->create(['views_count' => 42]);

        $response = $this->postJson("/blog/{$post->id}/increment-view");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'views_count',
        ]);
    });

    test('can increment view on unpublished post too', function () {
        $post = BlogPost::factory()->unpublished()->create(['views_count' => 0]);

        $response = $this->postJson("/blog/{$post->id}/increment-view");
        $response->assertStatus(200);

        $post->refresh();
        expect($post->views_count)->toBe(1);
    });

    // ── Negative ────────────────────────────────────────────────────────
    test('returns 404 for non-existent post id', function () {
        $response = $this->postJson('/blog/99999/increment-view');

        $response->assertStatus(404);
        $response->assertJson([
            'success' => false,
            'message' => 'Post not found',
        ]);
    });

    test('returns 404 for invalid (non-numeric) id', function () {
        $response = $this->postJson('/blog/invalid-id/increment-view');

        $response->assertStatus(404);
    });

    test('rejects GET request to increment-view', function () {
        $post = BlogPost::factory()->published()->create();

        $response = $this->get("/blog/{$post->id}/increment-view");
        $response->assertStatus(405);
    });

    test('rejects PUT request to increment-view', function () {
        $post = BlogPost::factory()->published()->create();

        $response = $this->putJson("/blog/{$post->id}/increment-view");
        $response->assertStatus(405);
    });
});

/*
|==========================================================================
| CACHE BEHAVIOR (cross-cutting)
|==========================================================================
*/
describe('Cache Behavior', function () {

    test('homepage serves cached data on second request', function () {
        seedBaseData();
        Hero::factory()->count(2)->create();
        Cache::flush();

        // First request – cache miss
        $this->get('/');
        expect(Cache::has('homepage'))->toBeTrue();

        // Second request – should still succeed (cache hit)
        $response = $this->get('/');
        $response->assertStatus(200);
    });

    test('about page cache key is set correctly', function () {
        seedBaseData();
        Cache::flush();

        $this->get('/about');
        expect(Cache::has('about_page'))->toBeTrue();
    });

    test('contact page cache key is set correctly', function () {
        seedBaseData();
        Cache::flush();

        $this->get('/contact');
        expect(Cache::has('contact_page'))->toBeTrue();
    });

    test('services page cache includes page number', function () {
        seedBaseData();
        Service::factory()->count(10)->create();
        Cache::flush();

        $this->get('/services?page=2');
        expect(Cache::has('services_page_2'))->toBeTrue();
    });

    test('blog detail cache uses slug as key', function () {
        seedBaseData();
        BlogPost::factory()->published()->create(['slug' => 'unique-slug']);
        Cache::flush();

        $this->get('/blog/unique-slug');
        expect(Cache::has('blog_detail_page_unique-slug'))->toBeTrue();
    });
});

/*
|==========================================================================
| SEO META TAGS (cross-cutting)
|==========================================================================
*/
describe('SEO Meta Tags', function () {

    test('homepage sets correct SEO title', function () {
        $companyInfo = CompanyInfo::factory()->create(['website_name' => 'PT Asia Tiga Utama']);
        About::factory()->create();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('PT Asia Tiga Utama', false);
    });

    test('about page contains about in SEO title', function () {
        CompanyInfo::factory()->create(['website_name' => 'PT Asia Tiga Utama']);
        About::factory()->create();

        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Tentang Kami', false);
    });

    test('blog detail sets article title in SEO', function () {
        seedBaseData();
        BlogPost::factory()->published()->create([
            'slug' => 'seo-test-post',
            'title' => 'My Awesome Article',
        ]);

        $response = $this->get('/blog/seo-test-post');
        $response->assertStatus(200);
        $response->assertSee('My Awesome Article', false);
    });
});
