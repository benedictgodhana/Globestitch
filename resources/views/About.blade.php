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
            --primary-color: #34D399;
            --secondary-color: #3B82F6;
            --text-color: #1F2937;
            --light-gray: #F3F4F6;
            --transition: all 0.5s ease-in-out;
        }

        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background-color: #f9fafb;
            color: var(--text-color);
            overflow-x: hidden;
            line-height: 1.6;
        }

        .about-header {
            text-align: center;
            padding: 8rem 1rem;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/images/3d-tropical-palm-tree-island.jpg') center/cover no-repeat;
            color: white;
            overflow: hidden;
            position: relative;
        }

        .about-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(5, 150, 105, 0.6), rgba(37, 99, 235, 0.6));
            z-index: 1;
        }


        .header-title {
            font-size: 3.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header-content {
            position: relative;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .about-content {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 2rem;
            display: flex;
            flex-direction: column;
            gap: 3rem;
        }

        .about-section {
            display: flex;
            align-items: center;
            gap: 2rem;
            opacity: 0;
            transform: translateY(50px);
            transition: var(--transition);
        }

        .about-section img {
            width: 50%;
            border-radius: 20px;
            transition: var(--transition);
        }

        .about-section img:hover {
            transform: scale(1.05);
        }

        .about-text {
            width: 50%;
        }

        .about-text h2 {
            font-size: 2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .about-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .why-choose {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--light-gray);
        }

        .why-choose h2 {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 2rem;
        }

        .why-list {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .why-item {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            width: 280px;
            text-align: center;
        }

        .why-item:hover {
            transform: translateY(-10px);
        }

        .why-item i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .about-section {
                flex-direction: column;
                text-align: center;
            }
            .about-section img,
            .about-text {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navigation')

    <header class="about-header">
        <div class="header-content">
            <h1 class="header-title">About GlobeStitch</h1>
            <p class="header-subtitle">Discover the story behind GlobeStitch and our mission to connect travelers with unforgettable experiences.</p>
        </div>
    </header>

    <section class="about-content">
        <div class="about-section">
            <img src="/images/logo.png" alt="Our Story">
            <div class="about-text">
                <h2>Who We Are</h2>
                <p>Globestitch is a tour company dedicated to curating transformative experiences that connect individuals with adventure, healing, and joy. We believe every journey is a story waiting to be told, and we aim to create moments that inspire happiness, promote fun, and enhance emotional well-being.</p>
            </div>
        </div>
        <div class="about-section reverse">
            <img src="/images/about-2.jpg" alt="Our Mission">
            <div class="about-text">
                <h2>Our Mission</h2>
                <p>To create experiences that connect individuals with the beauty of life, foster joy, adventure, and healing from life’s challenges. Through exploration, we inspire happiness, promote fun, and support emotional well-being.</p>
            </div>
        </div>
        <div class="about-section">
            <img src="/images/about-3.jpg" alt="Our Vision">
            <div class="about-text">
                <h2>Our Vision</h2>
                <p>To be a leading tour company that inspires individuals to reconnect with nature, embrace joy, and find healing through adventure. We envision a world where every journey into the unknown brings happiness, fosters meaningful connections, and promotes mental well-being.</p>
            </div>
        </div>
    </section>

    <section class="why-choose">
        <h2>Why Choose GlobeStitch?</h2>
        <div class="why-list">
            <div class="why-item">
                <i class="mdi mdi-earth"></i>
                <p>Expertly curated experiences tailored to your needs</p>
            </div>
            <div class="why-item">
                <i class="mdi mdi-heart"></i>
                <p>A blend of wellness, adventure, and entertainment</p>
            </div>
            <div class="why-item">
                <i class="mdi mdi-airplane"></i>
                <p>Seamless travel planning with attention to detail</p>
            </div>
            <div class="why-item">
                <i class="mdi mdi-account-group"></i>
                <p>Community-driven experiences that foster real connections</p>
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sections = document.querySelectorAll(".about-section");
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                    }
                });
            }, { threshold: 0.3 });
            sections.forEach(section => observer.observe(section));
        });
    </script>
</body>
</html>
