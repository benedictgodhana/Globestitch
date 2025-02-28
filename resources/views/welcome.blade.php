<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlobeStitch - Craft Your Perfect Travel Story</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <style>
        :root {
            --primary-color: #008000; /* Green */
            --secondary-color: #3B82F6; /* Blue */
            --background-color: #f9fafb;
            --card-background: #ffffff;
            --border-color: #e5e7eb;
            --text-color: #1F2937;
        }

        body {
            margin: 0;
            font-family: 'Futura LT', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            overflow-x: hidden;
        }

        /* Enhanced Carousel */
        .carousel {
            position: relative;
            width: 100%;
            height: 90vh;
            overflow: hidden;
        }
        .carousel img {
            width: 100%;
            height: 90vh;
            object-fit: cover;
            display: none;
            transition: opacity 0.8s ease-in-out, transform 1.2s ease;
            transform: scale(1.1);
        }
        .carousel img.active {
            display: block;
            opacity: 1;
            transform: scale(1);
        }
        .carousel img.inactive {
            opacity: 0;
        }
        .carousel-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            background: rgba(0, 0, 0, 0.6);
            padding: 2.5rem;
            border-radius: 15px;
            max-width: 700px;
            backdrop-filter: blur(5px);
            transition: all 0.5s ease;
        }
        .carousel-content:hover {
            background: rgba(0, 0, 0, 0.7);
            transform: translate(-50%, -52%);
        }
        .carousel h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .carousel p {
            font-size: 1.35rem;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }
        .cta-button {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        .cta-button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 15px;
            cursor: pointer;
            border: none;
            font-size: 1.8rem;
            border-radius: 50%;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .prev:hover, .next:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-50%) scale(1.1);
        }
        .prev { left: 30px; }
        .next { right: 30px; }

        /* Enhanced Cards */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            margin: 5rem auto;
            max-width: 1400px;
            padding: 0 2rem;
        }
        .card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
        }
        .card:hover {
            transform: translateY(-15px) rotate(1deg);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .card:hover img {
            transform: scale(1.15);
        }
        .card-content {
            padding: 2rem;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-color);
        }
        .card-description {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }
        .card-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        .card-action {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
        }
        .card-action:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
        }

        /* Testimonial Section */
        .testimonial-section {
            background-color: var(--background-color);
            padding: 5rem 2rem;
            text-align: center;
        }
        .testimonial-section h2 {
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--text-color);
        }
        .testimonial-slider {
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
        }
        .testimonial-slide {
            display: none;
            padding: 2rem;
            background: var(--card-background);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }
        .testimonial-slide.active {
            display: block;
        }
        .testimonial-text {
            font-size: 1.25rem;
            color: var(--text-color);
            margin-bottom: 1.5rem;
        }
        .testimonial-author {
            font-size: 1rem;
            color: var(--secondary-color);
        }

        /* Blog Section */
        .blog-section {
            padding: 5rem 2rem;
            background-color: var(--card-background);
        }
        .blog-section h2 {
            font-size: 2.5rem;
            margin-bottom: 3rem;
            text-align: center;
            color: var(--text-color);
        }
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .blog-card {
            background: var(--card-background);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }
        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        .blog-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .blog-content {
            padding: 1.5rem;
        }
        .blog-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-color);
        }
        .blog-description {
            font-size: 1rem;
            color: #666;
            margin-bottom: 1.5rem;
        }
        .blog-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .blog-link:hover {
            color: var(--secondary-color);
        }

        .experience-category {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            z-index: 2;
        }


        .explore-more {
            display: inline-flex;
            align-items: center;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            gap: 0.5rem;
        }

        .explore-more:hover {
            color: var(--secondary-color);
            gap: 0.75rem;
        }

        .experience-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #6B7280;
            font-size: 0.9rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .view-all-btn {
    display: inline-block;
    padding: 12px 24px;
    background-color: var(--primary-color);
    color: white;
    font-weight: bold;
    text-decoration: none;
    border-radius: 30px;
    transition: background 0.3s ease-in-out, transform 0.2s;
    margin-top: -30px;
}

.view-all-btn:hover {
    background-color: var(--secondary-color);
    transform: translateY(-3px);
}

.why-choose-us {
    background: linear-gradient(180deg, #f0fff4 0%, #e6f4ea 100%);
}
.feature-card {
    transition: all 0.3s ease-in-out;
}
.feature-card:hover {
    transform: scale(1.05);
}
.trip-date {
            font-size: 1.1rem;
            font-weight: bold;
            color: white;
            font-size: 14px
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .carousel h1 {
                font-size: 2.5rem;
            }
            .carousel p {
                font-size: 1.1rem;
            }
            .carousel-content {
                width: 85%;
                padding: 2rem;
            }
            .prev, .next {
                width: 40px;
                height: 40px;
                font-size: 1.4rem;
            }
            .card-grid {
                padding: 0 1rem;
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .carousel h1 {
                font-size: 2rem;
            }
            .carousel p {
                font-size: 1rem;
            }
            .carousel-content {
                padding: 1.5rem;
            }
            .cta-button {
                padding: 0.75rem 1.5rem;
            }
            .card-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <!-- Your existing Navbar -->
    @include('layouts.navigation')

    <!-- Enhanced Carousel -->
    <!-- Enhanced Carousel -->
<div class="carousel" x-data="{
        slides: [
            {
                image: '/images/3d-tropical-palm-tree-island.jpg',
                title: 'Stitching the Perfect Travel Story.',
                text: 'Embark on a journey that blends adventure, wellness, and fun. Whether you’re seeking a transformative retreat, thrilling sports experience, an unforgettable safari, or vibrant nightlife adventures, we bring it all together for you.'
            },
            {
                image: '/images/relaxation.jpg',
                title: 'Adventure Awaits',
                text: 'From mountain peaks to ocean depths, experience the thrill of discovery with our expertly curated adventures.'
            },
            {
                image: '/images/gettyimages-520176152-20241220203148003.jpg',
                title: 'Cultural Immersion',
                text: 'Immerse yourself in rich traditions and authentic experiences worldwide. Discover the beauty of diverse cultures with us.'
            }
        ],
        currentIndex: 0,
        next() {
            this.currentIndex = (this.currentIndex + 1) % this.slides.length;
        },
        prev() {
            this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
        },
        init() {
            setInterval(() => this.next(), 5000);
        }
    }">
    <template x-for="(slide, index) in slides" :key="index">
        <img :src="slide.image" :class="{ 'active': index === currentIndex, 'inactive': index !== currentIndex }">
    </template>
    <button class="prev" @click="prev">&#10094;</button>
    <button class="next" @click="next">&#10095;</button>
    <div class="carousel-content" x-show="currentIndex === 0" x-transition>
        <h1 class="fade-in" x-text="slides[currentIndex].title"></h1>
        <p class="slide-up" x-text="slides[currentIndex].text"></p>
        <a href="#" class="cta-button">Start Your Journey</a>
    </div>
    <div class="carousel-content" x-show="currentIndex === 1" x-transition>
        <h1 class="fade-in" x-text="slides[currentIndex].title"></h1>
        <p class="slide-up" x-text="slides[currentIndex].text"></p>
        <a href="#" class="cta-button">Explore Adventures</a>
    </div>
    <div class="carousel-content" x-show="currentIndex === 2" x-transition>
        <h1 class="fade-in" x-text="slides[currentIndex].title"></h1>
        <p class="slide-up" x-text="slides[currentIndex].text"></p>
        <a href="#" class="cta-button">Discover Cultures</a>
    </div>
</div>

<section class="why-choose-us py-20 bg-gradient-to-b from-green-50 to-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-center text-4xl font-extrabold text-green-700 mb-12 tracking-wide" data-aos="fade-up">
            Why Choose GlobeStitch?
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Curated Experiences -->
            <div
                class="feature-card p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2"
                x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
                data-aos="fade-up">
                <div class="icon-container mb-4 text-green-600 text-center">
                    <i class="fas fa-award text-5xl" :class="{ 'text-yellow-500': hover }"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3 text-center">Curated Experiences</h3>
                <p class="text-gray-600 text-center">
                    Our expert team handpicks every destination and activity to ensure unforgettable memories.
                </p>
            </div>

            <!-- Adventure & Wellness -->
            <div
                class="feature-card p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2"
                x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
                data-aos="fade-up" data-aos-delay="100">
                <div class="icon-container mb-4 text-green-600 text-center">
                    <i class="fas fa-hiking text-5xl" :class="{ 'text-orange-500': hover }"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3 text-center">Wellness & Adventure</h3>
                <p class="text-gray-600 text-center">
                    A perfect blend of adventure, relaxation, and entertainment for an enriching experience.
                </p>
            </div>

            <!-- Seamless Travel Planning -->
            <div
                class="feature-card p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2"
                x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
                data-aos="fade-up" data-aos-delay="200">
                <div class="icon-container mb-4 text-green-600 text-center">
                    <i class="fas fa-map-marked-alt text-5xl" :class="{ 'text-blue-500': hover }"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3 text-center">Seamless Travel</h3>
                <p class="text-gray-600 text-center">
                    Enjoy stress-free planning with our meticulous attention to detail.
                </p>
            </div>

            <!-- Community-Driven Experiences -->
            <div
                class="feature-card p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2"
                x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
                data-aos="fade-up" data-aos-delay="300">
                <div class="icon-container mb-4 text-green-600 text-center">
                    <i class="fas fa-users text-5xl" :class="{ 'text-purple-500': hover }"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-3 text-center">Real Connections</h3>
                <p class="text-gray-600 text-center">
                    Community-driven experiences that foster meaningful relationships.
                </p>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-12">
            <a href="/experience"
                class="inline-block bg-green-700 text-white text-lg font-semibold px-8 py-4 rounded-full shadow-lg hover:bg-green-800 transition-all transform hover:-translate-y-1"
                data-aos="zoom-in">
                Explore Our Experiences →
            </a>
        </div>
    </div>
</section>


<section class="destinations py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-center text-3xl font-bold mb-12 text-green-700">Upcoming Trips</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($trips as $trip)
                <div class="destination-card relative overflow-hidden rounded-xl group">
                    <img src="{{ asset('storage/' . $trip->image) }}" alt="{{ $trip->title }}"class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="destination-overlay absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                        <div>
                            <h3 class="text-white text-xl font-bold mb-2">{{ $trip->title }}</h3>
                            <span class="trip-date" >
    {{ \Carbon\Carbon::parse($trip->start_date)->format('M d, Y') }} to
    {{ \Carbon\Carbon::parse($trip->end_date)->format('M d, Y') }}
</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-8">
            <a href="upcoming_trips" class="bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">
                View All
            </a>
        </div>
    </div>
</section>



<div
    x-data="{ show: false }"
    x-init="setTimeout(() => show = true, 200)"
    x-show="show"
    x-transition:enter="transition ease-out duration-1000"
    x-transition:enter-start="opacity-0 translate-y-10"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="special-offer bg-green-700 text-white py-8"
>
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
        <div class="text-center md:text-left mb-4 md:mb-0">
            <h3 class="text-2xl font-bold">Exclusive Travel Deals!</h3>
            <p>Book your next trip now and unlock amazing discounts!</p>
        </div>
        <a href="/upcoming_trips"
           x-data="{ hover: false }"
           @mouseenter="hover = true"
           @mouseleave="hover = false"
           :class="{ 'scale-105 shadow-lg': hover }"
           class="bg-white text-green-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition-transform transform">
            Explore Now →
        </a>
    </div>
</div>

<section class="stats-section py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div class="stat-item" x-data="{ count: 0 }" x-init="let target = 15000; let interval = setInterval(() => { if(count < target) count += 150; else { count = target; clearInterval(interval); }}, 10)">
            <div class="text-4xl font-bold text-green-700 mb-2" x-text="count + '+'"></div>
            <div class="text-gray-600">Happy Travelers</div>
        </div>
        <div class="stat-item" x-data="{ count: 0 }" x-init="let target = 50; let interval = setInterval(() => { if(count < target) count++; else { count = target; clearInterval(interval); }}, 50)">
            <div class="text-4xl font-bold text-green-700 mb-2" x-text="count + '+'"></div>
            <div class="text-gray-600">Destinations</div>
        </div>
        <div class="stat-item" x-data="{ count: 0 }" x-init="let target = 200; let interval = setInterval(() => { if(count < target) count += 2; else { count = target; clearInterval(interval); }}, 30)">
            <div class="text-4xl font-bold text-green-700 mb-2" x-text="count + '+'"></div>
            <div class="text-gray-600">Trips Organized</div>
        </div>
        <div class="stat-item" x-data="{ count: 0 }" x-init="let target = 98; let interval = setInterval(() => { if(count < target) count++; else { count = target; clearInterval(interval); }}, 40)">
            <div class="text-4xl font-bold text-green-700 mb-2" x-text="count + '%'"></div>
            <div class="text-gray-600">Positive Reviews</div>
        </div>
    </div>
</section>


    <!-- Featured Experiences Section -->
    <section>
    <h2 style="text-align: center; margin: 5rem 0 3rem; font-size: 2.5rem; color: var(--text-color);" data-aos="fade-up">
        Featured Experiences
    </h2>
    <div class="card-grid">
        @foreach($experiences as $experience)
            <div class="card" data-aos="fade-up" data-aos-delay="300">
                <span class="experience-category">{{ $experience->category }}</span>
                <img src="{{ asset('storage/' . $experience->image) }}" alt="{{ $experience->category }}">
                <div class="card-content">
                    <h3 class="card-title">{{ $experience->title }}</h3>
                    <p class="card-description">{{ Str::limit($experience->description, 50) }}</p>
                    <div class="card-footer">
                        <a href="{{ route('experience.show', $experience->id) }}" class="explore-more">
                            Discover More
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        <div class="experience-meta">
                            <span class="meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                {{ \Carbon\Carbon::parse($experience->date)->format('F Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- View All Button -->
    <div class="text-center mb-4 ">
        <a href="/experience" class="view-all-btn" data-aos="fade-up" data-aos-delay="400">
            View All Experiences →
        </a>
    </div>
</section>





 <!-- Testimonial Section -->
<section class="testimonial-section p-8 bg-gradient-to-r from-blue-50 to-indigo-50">
    <h2 class="text-center text-3xl font-bold mb-8 text-indigo-800">What Our Travelers Say</h2>

    <div x-data="{
        currentIndex: 0,
        testimonials: [
            { text: 'The retreat with GlobeStitch was a life-changing experience! The yoga, nature, and holistic healing left me feeling rejuvenated.', author: 'Jane K.' },
            { text: 'Watching my favorite football team live in London was an unforgettable experience, thanks to GlobeStitch\'s seamless planning!', author: 'Kevin O.' },
            { text: 'The safari adventure was breathtaking. I\'ll cherish the memories forever. Highly recommend GlobeStitch!', author: 'Alice J.' }
        ]
    }" class="relative max-w-2xl mx-auto">

        <!-- Testimonial container -->
        <div class="overflow-hidden relative rounded-xl shadow-xl bg-white h-64">
            <!-- Individual testimonials -->
            <template x-for="(testimonial, index) in testimonials" :key="index">
                <div class="absolute inset-0 w-full h-full p-8 flex flex-col justify-center items-center transition-all duration-500 ease-in-out"
                     x-show="currentIndex === index"
                     x-cloak>
                    <div class="relative w-full text-center">
                        <span class="text-indigo-200 text-6xl absolute -top-6 left-0 opacity-50">"</span>
                        <p class="text-lg text-gray-700 italic relative z-10 px-8" x-text="testimonial.text"></p>
                        <span class="text-indigo-200 text-6xl absolute -bottom-10 right-0 opacity-50">"</span>
                    </div>
                    <div class="mt-6">
                        <p class="font-bold text-indigo-700" x-text="'– ' + testimonial.author"></p>
                    </div>
                </div>
            </template>
        </div>

        <!-- Navigation controls -->
        <div class="flex justify-center mt-6 space-x-4">
            <!-- Previous button -->
            <button @click="currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length"
                    class="bg-white text-indigo-600 p-3 rounded-full shadow-md hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Indicator dots -->
            <div class="flex items-center space-x-2">
                <template x-for="(_, index) in testimonials" :key="index">
                    <button @click="currentIndex = index"
                            :class="{'bg-indigo-500': currentIndex === index, 'bg-gray-300': currentIndex !== index}"
                            class="w-3 h-3 rounded-full transition-colors duration-300 focus:outline-none"></button>
                </template>
            </div>

            <!-- Next button -->
            <button @click="currentIndex = (currentIndex + 1) % testimonials.length"
                    class="bg-white text-indigo-600 p-3 rounded-full shadow-md hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!-- Auto-rotation script -->
        <div x-init="setInterval(() => { currentIndex = (currentIndex + 1) % testimonials.length; }, 5000)"></div>
    </div>
</section>




    <!-- Blog Section -->
    <section class="blog-section">
        <h2 data-aos="fade-up">Latest From Our Blog</h2>
        <div class="blog-grid">
        @foreach ($blogs as $blog)

            <div class="blog-card" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                <div class="blog-content">
                    <h3 class="blog-title">{{ $blog->title }}</h3>
                    <p class="blog-description">{{ Str::limit($blog->description, 50) }}</p>
                    <a href="{{ route('blogs.showBlog', $blog->id) }}" class="blog-link">Read More →</a>
                </div>
            </div>
            @endforeach


        </div>
    </section>

    <!-- <section class="partners py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-center text-3xl font-bold mb-12 text-green-700">Our Trusted Partners</h2>


        <div class="text-center mt-8">
            <p class="text-xl font-semibold text-gray-600">More partners coming soon!</p>
            <div class="mt-4 text-gray-400">
                <p>Stay tuned for exciting additions!</p>
            </div>
        </div>
    </div>
</section> -->



<section class="newsletter py-16 bg-indigo-50">

    <div class="max-w-3xl mx-auto px-4 text-center">
    @if(session('success'))
    <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if ($errors->has('email'))
    <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">{{ $errors->first('email') }}</span>
    </div>
@endif

<!-- JavaScript to make messages disappear -->
<script>
    setTimeout(() => {
        document.getElementById('success-message')?.classList.add('hidden');
        document.getElementById('error-message')?.classList.add('hidden');
    }, 4000);
</script>


        <h2 class="text-3xl font-bold mb-4 text-green-700">Get Travel Inspiration</h2>
        <p class="text-gray-600 mb-6">Subscribe to our newsletter for exclusive offers and travel tips</p>

        <form
            action="/subscribe"
            method="POST"
            class="max-w-md mx-auto flex gap-4"
            x-data="{ loading: false }"
            @submit="loading = true"
        >
            @csrf
            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                class="flex-1 px-4 py-3 rounded-full border focus:outline-none focus:ring-2 focus:ring-green-500"
                required
            >

            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 transition-colors flex items-center">
                <span x-show="!loading">Subscribe</span>
                <svg x-show="loading" class="animate-spin h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
            </button>
        </form>
    </div>
</section>


<script>
    function newsletterForm() {
        return {
            email: '',
            message: '',
            async subscribe() {
                let response = await fetch("{{ route('subscribe') }}", {
                    method: "POST",
                    headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                    body: JSON.stringify({ email: this.email }),
                });

                let data = await response.json();
                this.message = data.message;
                this.email = '';
            }
        };
    }
</script>

    <!-- Your existing Footer -->
    @include('layouts.footer')

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
</body>
</html>
