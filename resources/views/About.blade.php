<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlobeStitch - About Us</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js" defer></script>
    <style>
        :root {
            --primary-color: #EF4444; /* Coral accent */
            --secondary-color: #3B82F6; /* Blue accent */
            --text-color: #1F2937; /* Dark gray */
            --light-gray: #F3F4F6; /* Light gray */
            --transition: all 0.3s ease;
        }

        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background-color: #f9fafb;
            color: var(--text-color);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Header Section */
        .about-header {
            position: relative;
            text-align: center;
            padding: 8rem 1rem;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/about-header.jpg') center/cover no-repeat;
            color: white;
            overflow: hidden;
        }

        .about-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(239, 68, 68, 0.6), rgba(59, 130, 246, 0.6));
            z-index: 1;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-title {
            font-size: 3.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header-subtitle {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* About Section */
        .about-section {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 2rem;
        }

        .about-section h2 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--text-color);
            text-align: center;
        }

        .about-section p {
            color: #6B7280;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
            text-align: center;
        }

        .about-section blockquote {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            text-align: center;
            margin: 2rem 0;
            padding: 1rem;
            border-left: 4px solid var(--primary-color);
            background: var(--light-gray);
            border-radius: 10px;
        }

        .about-section ul {
            list-style: none;
            padding: 0;
            margin: 2rem 0;
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
        }

        .about-section li {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex: 1 1 300px;
            text-align: center;
            transition: var(--transition);
        }

        .about-section li:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .about-section li i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .about-section li h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .about-section li p {
            color: #6B7280;
            font-size: 1rem;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-title {
                font-size: 2.5rem;
            }

            .about-section h2 {
                font-size: 2rem;
            }

            .about-section blockquote {
                font-size: 1.2rem;
            }

            .about-section li {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navigation')

    <header class="about-header">
        <div class="header-content">
            <h1 class="header-title">About Us</h1>
            <p class="header-subtitle">Discover the story behind GlobeStitch and our commitment to creating unforgettable travel experiences.</p>
        </div>
    </header>

    <section class="about-section">
        <!-- Who We Are -->
        <div>
            <h2>Who We Are</h2>
            <p>
                GlobeStitch is a tour company dedicated to curating transformative experiences that connect individuals with adventure, healing, and joy. We believe every journey is a story waiting to be told, and we aim to create moments that inspire happiness, promote fun, and enhance emotional well-being.
            </p>
        </div>

        <!-- Our Mission -->
        <div>
            <h2>Our Mission</h2>
            <blockquote>
                “To create experiences that connect individuals with the beauty of life, foster joy, adventure, and healing from life’s challenges. Through exploration, we inspire happiness, promote fun, and support emotional well-being.”
            </blockquote>
        </div>

        <!-- Our Vision -->
        <div>
            <h2>Our Vision</h2>
            <blockquote>
                “To be a leading tour company that inspires individuals to reconnect with nature, embrace joy, and find healing through adventure. We envision a world where every journey into the unknown brings happiness, fosters meaningful connections, and promotes mental well-being.”
            </blockquote>
        </div>

        <!-- Why Choose GlobeStitch -->
        <div>
            <h2>Why Choose GlobeStitch?</h2>
            <ul>
                <li>
                    <i class="fas fa-star"></i>
                    <h3>Expertly Curated Experiences</h3>
                    <p>Tailored to your needs, ensuring every trip is unique and memorable.</p>
                </li>
                <li>
                    <i class="fas fa-heart"></i>
                    <h3>Wellness & Adventure</h3>
                    <p>A perfect blend of wellness, adventure, and entertainment for all travelers.</p>
                </li>
                <li>
                    <i class="fas fa-compass"></i>
                    <h3>Seamless Travel Planning</h3>
                    <p>Attention to detail in every aspect of your journey, from start to finish.</p>
                </li>
                <li>
                    <i class="fas fa-users"></i>
                    <h3>Community-Driven</h3>
                    <p>Fostering real connections and meaningful experiences for our travelers.</p>
                </li>
            </ul>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>
