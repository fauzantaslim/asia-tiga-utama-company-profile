<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogPost::create([
            'title' => 'The Future of Digital Transformation',
            'slug' => 'the-future-of-digital-transformation',
            'content' => '<p>Digital transformation is reshaping industries across the globe. In this article, we explore the key trends and technologies that are driving this change and how businesses can adapt to stay competitive.</p><p>From artificial intelligence to cloud computing, companies are leveraging new technologies to improve efficiency, enhance customer experiences, and create innovative products and services.</p>',
            'is_published' => true,
        ]);

        BlogPost::create([
            'title' => 'Best Practices for Remote Team Management',
            'slug' => 'best-practices-for-remote-team-management',
            'content' => '<p>Managing remote teams presents unique challenges and opportunities. In this guide, we share proven strategies for maintaining productivity, fostering collaboration, and building a strong company culture in a distributed work environment.</p><p>From communication tools to performance metrics, we cover the essential elements of successful remote team management.</p>',
            'is_published' => true,
        ]);

        BlogPost::create([
            'title' => 'Cybersecurity in the Modern Workplace',
            'slug' => 'cybersecurity-in-the-modern-workplace',
            'content' => '<p>As cyber threats continue to evolve, organizations must prioritize cybersecurity to protect their data and reputation. This article examines the latest security challenges and provides actionable recommendations for strengthening your defenses.</p><p>From employee training to advanced threat detection, we explore the multi-layered approach required for comprehensive cybersecurity.</p>',
            'is_published' => true,
        ]);

        // You can add media later via Filament admin panel
    }
}
