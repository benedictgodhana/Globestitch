<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TravelStitch - Upcoming Trips</title>
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

        /* Hero Section */
        .hero {
            position: relative;
            width: 100%;
            height: 50vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1974&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: -1;
        }
        .hero-content {
            max-width: 800px;
            padding: 2rem;
            z-index: 1;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .hero p {
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

        /* Trip Container */
        .trip-container {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 1rem;
        }
        .trip-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        /* Trip Card Styles */
        .trip-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }
        .trip-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }
        .trip-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .trip-card:hover img {
            transform: scale(1.1);
        }
        .trip-content {
            padding: 1.5rem;
        }
        .trip-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .trip-description {
            color: #6B7280;
            margin-bottom: 1rem;
        }
        .trip-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .trip-date {
            font-size: 1.1rem;
            font-weight: bold;
            color: #EF4444;
        }
        .trip-action {
            background-color: #EF4444;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.2s, transform 0.2s;
        }
        .trip-action:hover {
            background-color: #DC2626;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            .hero p {
                font-size: 1rem;
            }
            .trip-card img {
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Plan Your Next Adventure</h1>
            <p>Explore our curated list of upcoming trips and embark on unforgettable journeys around the world.</p>
            <a href="#trips" class="cta-button">View Upcoming Trips</a>
        </div>
    </section>

    <!-- Main Content -->
    <section class="trip-container" id="trips">
        <h2 style="text-align: center; margin-bottom: 2rem;">Upcoming Trips</h2>
        <div class="trip-grid">
            <!-- Trip Card 1 -->
            <div class="trip-card">
                <img src="/images/bali-trip.jpg" alt="Bali Adventure">
                <div class="trip-content">
                    <h3 class="trip-title">Bali Adventure</h3>
                    <p class="trip-description">Discover the tropical paradise of Bali with guided tours and cultural experiences.</p>
                    <div class="trip-footer">
                        <span class="trip-date">April 15-22, 2025</span>
                        <a href="#" class="trip-action">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Trip Card 2 -->
            <div class="trip-card">
                <img src="/images/alps-trip.jpg" alt="Swiss Alps Escape">
                <div class="trip-content">
                    <h3 class="trip-title">Swiss Alps Escape</h3>
                    <p class="trip-description">Enjoy breathtaking mountain views and thrilling outdoor activities.</p>
                    <div class="trip-footer">
                        <span class="trip-date">May 10-17, 2025</span>
                        <a href="#" class="trip-action">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Trip Card 3 -->
            <div class="trip-card">
                <img src="/images/africa-safari.jpg" alt="African Safari">
                <div class="trip-content">
                    <h3 class="trip-title">African Safari</h3>
                    <p class="trip-description">Experience the wonders of African wildlife and scenic landscapes.</p>
                    <div class="trip-footer">
                        <span class="trip-date">June 5-12, 2025</span>
                        <a href="#" class="trip-action">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.footer')
</body>
</html>
