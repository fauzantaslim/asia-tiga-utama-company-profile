@extends('layouts.app')

@section('title', isset($companyInfo->meta_title) ? $companyInfo->meta_title : 'Company Profile')
@section('description', isset($companyInfo->meta_description) ? $companyInfo->meta_description : 'Company Profile resmi
    kami')
@section('keywords', isset($companyInfo->meta_keywords) ? $companyInfo->meta_keywords : 'company profile, jasa,
    layanan')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ isset($hero->title) ? $hero->title : 'Welcome to Our Company' }}</h1>
            <p class="text-xl mb-8">
                {{ isset($hero->subtitle) ? $hero->subtitle : 'We provide excellent services for your business needs' }}</p>
            <a href="#contact"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg inline-block hover:bg-blue-700 transition duration-300">{{ isset($hero->button_text) ? $hero->button_text : 'Get Started' }}</a>
        </div>
    </section>

    <!-- About Us and Vision Mission Section -->
    <section id="about" class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">About Us</h2>
                    <p class="text-gray-700 mb-6">
                        {{ isset($about->description) ? $about->description : 'We are a professional company dedicated to providing quality services to our clients. With years of experience in the industry, we have built a strong reputation for excellence and customer satisfaction.' }}
                    </p>
                </div>
                <div>
                    <img src="{{ isset($about->image) ? asset('storage/' . $about->image) : 'https://via.placeholder.com/500x300' }}"
                        alt="About Us" class="rounded-lg shadow-lg w-full">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 mt-16">
                <div class="bg-blue-50 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold mb-4 text-blue-800">Our Vision</h3>
                    <p class="text-gray-700">
                        {{ isset($about->vision) ? $about->vision : 'To be the leading company in our industry, recognized for innovation, quality, and customer satisfaction.' }}
                    </p>
                </div>
                <div class="bg-green-50 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold mb-4 text-green-800">Our Mission</h3>
                    <p class="text-gray-700">
                        {{ isset($about->mission) ? $about->mission : 'To deliver exceptional services that exceed our clients expectations while maintaining the highest standards of integrity and professionalism.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Services</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($services as $service)
                    <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <div class="text-4xl mb-4 text-blue-600">
                            @if (isset($service->icon))
                                {!! $service->icon !!}
                            @else
                                <i class="fas fa-cogs"></i>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold mb-3">{{ $service->title }}</h3>
                        <p class="text-gray-600">{{ $service->description }}</p>
                    </div>
                @empty
                    <div class="col-span-3 text-center">
                        <p>No services available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Portfolio</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($portfolios as $portfolio)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}"
                            class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $portfolio->title }}</h3>
                            <p class="text-gray-600">{{ Str::limit($portfolio->description, 100) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center">
                        <p>No portfolio items available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Gallery</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @forelse($galleryImages as $image)
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->caption ?? 'Gallery Image' }}"
                            class="w-full h-64 object-cover hover:scale-105 transition duration-300">
                    </div>
                @empty
                    <div class="col-span-4 text-center">
                        <p>No gallery images available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Latest Blog Posts</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($blogPosts as $post)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                            <a href="#" class="text-blue-600 hover:underline">Read More</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center">
                        <p>No blog posts available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Contact and Maps Section -->
    <section id="contact" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Contact Us</h2>
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold mb-6">Get in Touch</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-blue-600 mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-bold">Address</h4>
                                <p>{{ isset($companyInfo->address) ? $companyInfo->address : '123 Business Street, City, Country' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-blue-600 mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-bold">Phone</h4>
                                <p>{{ isset($companyInfo->phone) ? $companyInfo->phone : '+1 234 567 890' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-blue-600 mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-bold">Email</h4>
                                <p>{{ isset($companyInfo->email) ? $companyInfo->email : 'info@company.com' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="font-bold mb-4">Follow Us</h4>
                        <div class="flex space-x-4">
                            @if (isset($companyInfo->instagram))
                                <a href="{{ $companyInfo->instagram }}" class="text-blue-600 hover:text-blue-800"><i
                                        class="fab fa-instagram fa-2x"></i></a>
                            @endif
                            @if (isset($companyInfo->facebook))
                                <a href="{{ $companyInfo->facebook }}" class="text-blue-600 hover:text-blue-800"><i
                                        class="fab fa-facebook fa-2x"></i></a>
                            @endif
                            @if (isset($companyInfo->youtube))
                                <a href="{{ $companyInfo->youtube }}" class="text-blue-600 hover:text-blue-800"><i
                                        class="fab fa-youtube fa-2x"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold mb-6">Send us a Message</h3>
                    <form class="space-y-4">
                        <div>
                            <input type="text" placeholder="Your Name"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                        </div>
                        <div>
                            <input type="email" placeholder="Your Email"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                        </div>
                        <div>
                            <input type="text" placeholder="Subject"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                        </div>
                        <div>
                            <textarea placeholder="Your Message" rows="5"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
                        </div>
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">Send
                            Message</button>
                    </form>
                </div>
            </div>

            <div class="mt-16">
                <h3 class="text-2xl font-bold text-center mb-6">Our Location</h3>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if (isset($companyInfo->google_map_embed_link))
                        {!! $companyInfo->google_map_embed_link !!}
                    @else
                        <div
                            class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-96 flex items-center justify-center">
                            <span class="text-gray-500">Google Map Embed</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
@endsection
