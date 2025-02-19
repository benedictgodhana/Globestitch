<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlobeStitch - Experiences</title>
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
        .experience-header {
            position: relative;
            text-align: center;
            padding: 8rem 1rem;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/3d-tropical-palm-tree-island.jpg') center/cover no-repeat;
            color: white;
            overflow: hidden;
        }

        .experience-header::before {
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

        /* Experience Grid */
        .experience-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
            max-width: 1400px;
            margin: 4rem auto;
            padding: 0 2rem;
        }

        /* Experience Card */
        .experience-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            position: relative;
        }

        .experience-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .experience-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: var(--transition);
        }

        .experience-card:hover img {
            transform: scale(1.05);
        }

        .experience-content {
            padding: 2rem;
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

        .experience-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-color);
            line-height: 1.3;
        }

        .experience-description {
            color: #6B7280;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .experience-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--light-gray);
            padding-top: 1.5rem;
            margin-top: 1.5rem;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-title {
                font-size: 2.5rem;
            }

            .experience-grid {
                grid-template-columns: 1fr;
                padding: 0 1rem;
            }

            .experience-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navigation')

    <header class="experience-header">
        <div class="header-content">
            <h1 class="header-title">GlobeStitch Experiences</h1>
            <p class="header-subtitle">Discover unforgettable travel experiences curated just for you. Explore the world with GlobeStitch.</p>
        </div>
    </header>

    <section>
        <div class="experience-grid">
            <!-- Experience 1 -->
            <article class="experience-card">
                <span class="experience-category">Adventure</span>
                <img src="/images/adventure.jpg" alt="Adventure Experience">
                <div class="experience-content">
                    <h3 class="experience-title">Thrilling Mountain Expeditions</h3>
                    <p class="experience-description">Embark on an unforgettable journey through rugged terrains and breathtaking landscapes. Perfect for adventure seekers.</p>
                    <div class="experience-footer">
                        <a href="#" class="explore-more">
                            Explore
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
                                7 days
                            </span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Experience 2 -->
            <article class="experience-card">
                <span class="experience-category">Cultural</span>
                <img src="/images/cultural.jpg" alt="Cultural Experience">
                <div class="experience-content">
                    <h3 class="experience-title">Cultural Immersion in Asia</h3>
                    <p class="experience-description">Experience the rich traditions, cuisines, and history of Asia. A journey that will leave you inspired.</p>
                    <div class="experience-footer">
                        <a href="#" class="explore-more">
                            Explore
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
                                10 days
                            </span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Experience 3 -->
            <article class="experience-card">
                <span class="experience-category">Relaxation</span>
                <img src="/images/relaxation.jpg" alt="Relaxation Experience">
                <div class="experience-content">
                    <h3 class="experience-title">Tropical Beach Getaway</h3>
                    <p class="experience-description">Unwind on pristine beaches with crystal-clear waters. The perfect escape for relaxation and rejuvenation.</p>
                    <div class="experience-footer">
                        <a href="#" class="explore-more">
                            Explore
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
                                5 days
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>
