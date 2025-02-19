<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TravelStitch - Craft Your Perfect Travel Story</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js" defer></script>
    <style>
        body {
            margin: 0;
            font-family: 'Futura LT', sans-serif;
            background-color: #f9fafb;
            color: #333;
            overflow-x: hidden;
        }

        /* Carousel */
        .carousel {
            position: relative;
            width: 100%;
            height: 80vh;
            overflow: hidden;
        }
        .carousel img {
            width: 100%;
            height: 80vh;
            object-fit: cover;
            display: none;
            transition: opacity 0.5s ease-in-out;
        }
        .carousel img.active {
            display: block;
            opacity: 1;
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
            background: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            border-radius: 10px;
            max-width: 600px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .carousel h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .carousel p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }
        .cta-button {
            background-color: #EF4444;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: background-color 0.2s, transform 0.2s;
            display: inline-block;
            font-weight: 600;
        }
        .cta-button:hover {
            background-color: #DC2626;
            transform: translateY(-2px);
        }
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            font-size: 1.5rem;
            border-radius: 50%;
        }
        .prev { left: 20px; }
        .next { right: 20px; }

        /* Featured Cards */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 4rem auto;
            max-width: 1200px;
            padding: 0 1rem;
        }
        .card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .card:hover img {
            transform: scale(1.1);
        }
        .card-content {
            padding: 1.5rem;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .card-description {
            color: #6B7280;
            margin-bottom: 1rem;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-price {
            font-size: 1.1rem;
            font-weight: bold;
            color: #EF4444;
        }
        .card-action {
            background-color: #EF4444;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.2s, transform 0.2s;
        }
        .card-action:hover {
            background-color: #DC2626;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Carousel -->
    <div class="carousel" x-data="{
            slides: [
                { image: '/images/3d-tropical-palm-tree-island.jpg', text: 'Explore the world with us' },
                { image: '/images/travel2.jpg', text: 'Find adventure and relaxation' },
                { image: '/images/travel3.jpg', text: 'Experience unique cultures' }
            ],
            currentIndex: 0,
            next() { this.currentIndex = (this.currentIndex + 1) % this.slides.length; },
            prev() { this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length; }
        }">
        <template x-for="(slide, index) in slides" :key="index">
            <img :src="slide.image" :class="{ 'active': index === currentIndex, 'inactive': index !== currentIndex }">
        </template>
        <button class="prev" @click="prev">&#10094;</button>
        <button class="next" @click="next">&#10095;</button>
        <div class="carousel-content" x-show="currentIndex === 0">
            <h1>Craft Your Perfect Travel Story</h1>
            <p>Embark on a journey that blends adventure, wellness, and fun. Whether you’re seeking a transformative retreat, thrilling sports experience, an unforgettable safari, or vibrant nightlife adventures, we bring it all together for you.</p>
            <a href="#" class="cta-button">Explore Now</a>
        </div>
        <div class="carousel-content" x-show="currentIndex === 1">
            <h1>Adventure Awaits</h1>
            <p>Discover thrilling outdoor activities and unforgettable experiences.</p>
            <a href="#" class="cta-button">Book Your Trip</a>
        </div>
        <div class="carousel-content" x-show="currentIndex === 2">
            <h1>Cultural Immersion</h1>
            <p>Experience the beauty of diverse cultures around the globe.</p>
            <a href="#" class="cta-button">Learn More</a>
        </div>
    </div>

    <!-- Featured Experiences -->
    <section>
        <h2 style="text-align: center; margin: 4rem 0 2rem;">Featured Experiences</h2>
        <div class="card-grid">
            <div class="card">
                <img src="/images/wellness-retreat.jpg" alt="Wellness Retreat">
                <div class="card-content">
                    <h3 class="card-title">Wellness Retreat</h3>
                    <p class="card-description">Find peace and rejuvenation in serene surroundings.</p>
                    <div class="card-footer">
                        <span class="card-price">$500</span>
                        <a href="#" class="card-action">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="/images/adventure-sports.jpg" alt="Adventure Sports">
                <div class="card-content">
                    <h3 class="card-title">Adventure Sports</h3>
                    <p class="card-description">Push your limits with thrilling outdoor activities.</p>
                    <div class="card-footer">
                        <span class="card-price">$300</span>
                        <a href="#" class="card-action">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="/images/safari.jpg" alt="Safari Adventure">
                <div class="card-content">
                    <h3 class="card-title">Safari Adventure</h3>
                    <p class="card-description">Get up close with wildlife in their natural habitat.</p>
                    <div class="card-footer">
                        <span class="card-price">$800</span>
                        <a href="#" class="card-action">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.footer')
</body>
</html>
