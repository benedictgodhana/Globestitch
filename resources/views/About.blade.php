<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlobeStitch - About Us</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <style>
        :root {
            --primary-color:#008000;
            --primary-dark: #10B981;
            --secondary-color: #3B82F6;
            --secondary-dark: #2563EB;
            --text-color: #1F2937;
            --text-light: #6B7280;
            --light-gray: #F3F4F6;
            --white: #FFFFFF;
            --black: #000000;
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f9fafb;
            color: var(--text-color);
            line-height: 1.7;
            overflow-x: hidden;
            font-size: 16px;
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
            line-height: 1.3;
        }

        p {
            margin-bottom: 1.5rem;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 0.375rem;
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: var(--secondary-dark);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }

        /* Header Styles */
        .about-header {
            position: relative;
            padding: 12rem 2rem 8rem;
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)),
            url('/images/3d-tropical-palm-tree-island.jpg') center/cover no-repeat fixed;
            color: var(--white);
            text-align: center;
            overflow: hidden;
        }

        .about-header:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 150px;
        }

        .about-header h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .about-header p {
            font-size: 1.25rem;
            max-width: 800px;
            margin: 0 auto 2rem;
            position: relative;
        }

        .header-content {
            position: relative;
            z-index: 10;
        }

        /* About Content Sections */
        .about-content {
            padding: 6rem 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--text-color);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-color);
        }

        .section-title p {
            color: var(--text-light);
            max-width: 700px;
            margin: 0 auto;
        }

        .about-section {
            display: flex;
            align-items: center;
            gap: 4rem;
            margin-bottom: 6rem;
        }

        .about-section:nth-child(even) {
            flex-direction: row-reverse;
        }

        .about-image {
            flex: 1;
            position: relative;
        }

        .about-image img {
    width: 40%; /* Reduce from 50% */
    max-width: 350px; /* Set a maximum width */
    border-radius: 15px;
    transition: var(--transition);
}

.about-image img:hover {
    transform: scale(1.05);
}
        .about-image:before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 100%;
            height: 100%;
            border: 2px solid var(--primary-color);
            border-radius: 1rem;
            z-index: -1;
            opacity: 0.7;
            transition: var(--transition);
        }

        .about-image:hover:before {
            top: -10px;
            left: -10px;
        }


@media (max-width: 768px) {
    .about-image img {
        width: 80%; /* Adjust for smaller screens */
        max-width: 280px;
    }
}


        .about-text {
            flex: 1;
        }

        .about-text h2 {
            font-size: 2.25rem;
            color: var(--text-color);
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 15px;
        }

        .about-text h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--primary-color);
        }

        .about-text p {
            font-size: 1.1rem;
            color: var(--text-light);
            line-height: 1.8;
        }

        /* Timeline Section */
        .timeline-section {
            padding: 6rem 0;
            background-color: var(--light-gray);
        }

        .timeline {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 0;
        }

        .timeline:before {
            content: '';
            position: absolute;
            height: 100%;
            width: 2px;
            background-color: var(--primary-color);
            left: 50%;
            transform: translateX(-50%);
        }

        .timeline-item {
            padding: 1.5rem;
            position: relative;
            width: 50%;
            background: var(--white);
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            padding-right: 3rem;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
            padding-left: 3rem;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: var(--primary-color);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .timeline-item:nth-child(odd):before {
            right: -10px;
        }

        .timeline-item:nth-child(even):before {
            left: -10px;
        }

        .timeline-year {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .timeline-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        /* Features Section */
        .features-section {
            padding: 6rem 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: var(--white);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-bottom: 3px solid transparent;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-bottom: 3px solid var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .feature-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .feature-text {
            color: var(--text-light);
            flex-grow: 1;
        }

        /* Testimonial Section */
        .testimonial-section {
            padding: 6rem 0;
            background-color: var(--light-gray);
        }

        .testimonial-container {
            max-width: 900px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }

        .testimonial-slider {
            display: flex;
            transition: transform 0.5s ease;
        }

        .testimonial {
            min-width: 100%;
            padding: 2rem;
            background: var(--white);
            border-radius: 1rem;
            box-shadow: var(--shadow);
            margin: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1.5rem;
            border: 3px solid var(--primary-color);
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: var(--text-light);
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .testimonial-author {
            font-weight: 600;
            color: var(--text-color);
        }

        .testimonial-position {
            color: var(--primary-color);
            font-size: 0.9rem;
        }

        .testimonial-controls {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
            gap: 1rem;
        }

        .control-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--white);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .control-btn:hover {
            background: var(--primary-color);
            color: var(--white);
        }

        /* CTA Section */
        .cta-section {
            padding: 6rem 0;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                        url('/images/3d-tropical-palm-tree-island.jpg') center/cover no-repeat fixed;
            text-align: center;
            color: var(--white);
        }

        .cta-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .cta-text {
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        /* Team Section */
        .team-section {
            padding: 6rem 0;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
        }

        .team-member {
            background: var(--white);
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .team-photo {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .team-info {
            padding: 1.5rem;
            text-align: center;
        }

        .team-name {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .team-position {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .team-bio {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .team-social {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-icon {
            font-size: 1.25rem;
            color: var(--text-light);
            transition: var(--transition);
        }

        .social-icon:hover {
            color: var(--primary-color);
        }

        /* Counter Section */
        .counter-section {
            padding: 6rem 0;
            background-color: var(--light-gray);
        }

        .counter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 2rem;
        }

        .counter-item {
            text-align: center;
            padding: 2rem;
        }

        .counter-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .counter-text {
            font-size: 1.1rem;
            color: var(--text-color);
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .about-header h1 {
                font-size: 3.5rem;
            }

            .about-header p {
                font-size: 1.1rem;
            }

            .about-section {
                gap: 3rem;
            }
        }

        @media (max-width: 768px) {
            .about-header {
                padding: 8rem 2rem 6rem;
            }

            .about-header h1 {
                font-size: 3rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .about-section, .about-section:nth-child(even) {
                flex-direction: column;
                gap: 2rem;
            }

            .about-image:before {
                display: none;
            }

            .timeline:before {
                left: 20px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 3rem !important;
                padding-right: 1.5rem !important;
            }

            .timeline-item:nth-child(odd), .timeline-item:nth-child(even) {
                left: 0;
            }

            .timeline-item:before {
                left: 11px !important;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            .about-header h1 {
                font-size: 2.5rem;
            }

            .feature-card {
                padding: 1.5rem;
            }

            .counter-number {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body x-data="{ currentTestimonial: 0 }" x-init="() => { AOS.init({ duration: 1000, once: true }); }">

    @include('layouts.navigation')

    <header class="about-header">
        <div class="header-content">
            <h1 data-aos="fade-up">About GlobeStitch</h1>
            <p data-aos="" data-aos-delay="100">Discover the story behind GlobeStitch and our mission to connect travelers with unforgettable experiences that transform lives.</p>

        </div>
    </header>

    <section class="about-content" id="our-story">
        <div class="container">

            <div class="about-section" data-aos="fade-up">
                <div class="about-image">
                    <img src="/images/logo.png" alt="GlobeStitch - Who We Are">
                </div>
                <div class="about-text">
                    <h2>Who We Are</h2>

                <p>Globestitch is a tour company dedicated to curating transformative experiences that connect individuals with adventure, healing, and joy. We believe every journey is a story waiting to be told, and we aim to create moments that inspire happiness, promote fun, and enhance emotional well-being.</p></div>
            </div>

            <div class="about-section" data-aos="fade-up">
                <div class="about-image">
                    <img src="/images/about-2.jpg" alt="GlobeStitch - Our Mission">
                </div>
                <div class="about-text">
                    <h2>Our Mission</h2>
                    <p>To create experiences that connect individuals with the beauty of life, foster joy, adventure, and healing from life’s challenges. Through exploration, we inspire happiness, promote fun, and support emotional well-being.</p>                </div>
            </div>

            <div class="about-section" data-aos="fade-up">
                <div class="about-image">
                    <img src="/images/about-3.jpg" alt="GlobeStitch - Our Vision">
                </div>
                <div class="about-text">
                    <h2>Our Vision</h2>
                    <p>To be a leading tour company that inspires individuals to reconnect with nature, embrace joy, and find healing through adventure. We envision a world where every journey into the unknown brings happiness, fosters meaningful connections, and promotes mental well-being.</p>            </div>
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


    <section class="features-section mb-4">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Why Choose GlobeStitch?</h2>
                <p>We pride ourselves on creating exceptional travel experiences that set us apart.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <span class="feature-icon mdi mdi-earth"></span>
                    <h3 class="feature-title">Expertly Curated Experiences</h3>
                    <p class="feature-text">Our journeys are meticulously designed by travel experts who personally scout each destination to ensure authentic and transformative experiences.</p>
                </div>

                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <span class="feature-icon mdi mdi-heart"></span>
                    <h3 class="feature-title">Wellness Integration</h3>
                    <p class="feature-text">We seamlessly blend adventure with wellness practices, ensuring you return home feeling rejuvenated rather than exhausted.</p>
                </div>

                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <span class="feature-icon mdi mdi-airplane"></span>
                    <h3 class="feature-title">Seamless Planning</h3>
                    <p class="feature-text">From the moment you book until your return home, our team handles every detail with meticulous care and attention.</p>
                </div>

                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <span class="feature-icon mdi mdi-account-group"></span>
                    <h3 class="feature-title">Community Connection</h3>
                    <p class="feature-text">Our small group experiences foster meaningful relationships between travelers and provide authentic engagement with local communities.</p>
                </div>


            </div>
        </div>
    </section>

@include('layouts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS library
            AOS.init({
                duration: 1000,
                once: true
            });
        });
    </script>
</body>

