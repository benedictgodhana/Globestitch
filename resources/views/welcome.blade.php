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
            --primary-color: #10B981; /* Green */
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
    <!-- Featured Experiences Section -->
    <section>
        <h2 style="text-align: center; margin: 5rem 0 3rem; font-size: 2.5rem; color: var(--text-color);" data-aos="fade-up">Featured Experiences</h2>
        <div class="card-grid">
            <div class="card" data-aos="fade-up" data-aos-delay="100">
                <img src="/images/bali-trip.jpg" alt="Wellness Retreat">
                <div class="card-content">
                    <h3 class="card-title">Wellness Retreat</h3>
                    <p class="card-description">Find peace and rejuvenation in serene surroundings with our curated wellness experiences.</p>
                    <div class="card-footer">
                        <span class="card-price">From $500</span>
                        <a href="#" class="card-action">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="200">
                <img src="/images/adventure.jpg" alt="Adventure Sports">
                <div class="card-content">
                    <h3 class="card-title">Adventure Sports</h3>
                    <p class="card-description">Push your limits with thrilling outdoor activities and expert guides.</p>
                    <div class="card-footer">
                        <span class="card-price">From $300</span>
                        <a href="#" class="card-action">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-delay="300">
                <img src="/images/africa-safari.jpg" alt="Safari Adventure">
                <div class="card-content">
                    <h3 class="card-title">Safari Adventure</h3>
                    <p class="card-description">Experience the majesty of wildlife in their natural habitat with our guided safaris.</p>
                    <div class="card-footer">
                        <span class="card-price">From $800</span>
                        <a href="#" class="card-action">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <h2 data-aos="fade-up">What Our Travelers Say</h2>
        <div class="testimonial-slider" x-data="{ currentIndex: 0 }">
            <div class="testimonial-slide" :class="{ 'active': currentIndex === 0 }" data-aos="fade-up">
                <p class="testimonial-text">"The retreat with GlobeStitch was a life-changing experience! The yoga, nature, and holistic healing left me feeling rejuvenated."</p>
                <p class="testimonial-author">– Jane K.</p>
            </div>
            <div class="testimonial-slide" :class="{ 'active': currentIndex === 1 }" data-aos="fade-up">
                <p class="testimonial-text">"Watching my favorite football team live in London was an unforgettable experience, thanks to GlobeStitch’s seamless planning!"</p>
                <p class="testimonial-author">– Kevin O.</p>
            </div>
            <div class="testimonial-slide" :class="{ 'active': currentIndex === 2 }" data-aos="fade-up">
                <p class="testimonial-text">"The safari adventure was breathtaking. I’ll cherish the memories forever. Highly recommend GlobeStitch!"</p>
                <p class="testimonial-author">– Alice J.</p>
            </div>
            <button @click="currentIndex = (currentIndex - 1 + 3) % 3" class="prev">&#10094;</button>
            <button @click="currentIndex = (currentIndex + 1) % 3" class="next">&#10095;</button>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
        <h2 data-aos="fade-up">Latest From Our Blog</h2>
        <div class="blog-grid">
            <div class="blog-card" data-aos="fade-up" data-aos-delay="100">
                <img src="/images/about-header.jpg" alt="Blog Post 1">
                <div class="blog-content">
                    <h3 class="blog-title">Top 10 Wellness Retreats</h3>
                    <p class="blog-description">Discover the best wellness retreats around the world for ultimate relaxation and rejuvenation.</p>
                    <a href="#" class="blog-link">Read More →</a>
                </div>
            </div>
            <div class="blog-card" data-aos="fade-up" data-aos-delay="200">
                <img src="/images/africa-safari.jpg" alt="Blog Post 2">
                <div class="blog-content">
                    <h3 class="blog-title">Adventure Sports Guide</h3>
                    <p class="blog-description">A comprehensive guide to the most thrilling adventure sports for adrenaline junkies.</p>
                    <a href="#" class="blog-link">Read More →</a>
                </div>
            </div>
            <div class="blog-card" data-aos="fade-up" data-aos-delay="300">
                <img src="/images/cultural.jpg" alt="Blog Post 3">
                <div class="blog-content">
                    <h3 class="blog-title">Cultural Immersion Tips</h3>
                    <p class="blog-description">Learn how to immerse yourself in local cultures and make the most of your travels.</p>
                    <a href="#" class="blog-link">Read More →</a>
                </div>
            </div>
        </div>
    </section>

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
