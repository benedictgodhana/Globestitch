<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Globestitch Tour Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Futura LT';
            src: url('/fonts/futura-lt/FuturaLT-Book.ttf') format('woff2'),
                 url('/fonts/futura-lt/FuturaLT.ttf') format('woff'),
                 url('/fonts/futura-lt/FuturaLT-Condensed.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        /* Background and Text Colors */
        .nav-bg {
            background-color: #ffffff; /* White background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .text-orange {
            color: #ff7506; /* Orange text */
        }
        .hover-effect {
            transition: all 0.3s ease;
        }
        .hover-effect:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Mobile Menu */
        .mobile-menu {
            transform: translateY(-100%);
            transition: transform 0.3s ease-in-out;
            overflow-y: auto;
            max-height: calc(100vh - 4rem); /* Ensure it doesn't exceed viewport height */
        }
        .mobile-menu.show {
            transform: translateY(0);
        }

        /* Backdrop for Mobile Menu */
        .backdrop {
            backdrop-filter: blur(8px);
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* Logo Animation */
        .logo svg {
            animation: spin 2s infinite linear;
        }
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem 1rem;
            }
            .logo svg {
                width: 2rem;
                height: 2rem;
            }
            .logo span {
                font-size: 1.25rem;
            }
            .desktop-links {
                display: none; /* Hide desktop links on smaller screens */
            }
            .mobile-menu {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                background: white;
                z-index: 100;
                border-top: 1px solid #e5e7eb;
            }
            .mobile-menu a {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 1rem;
                border-bottom: 1px solid #e5e7eb;
            }
            .mobile-menu a:last-child {
                border-bottom: none;
            }
        }

        @media (min-width: 769px) {
            .mobile-menu {
                display: none; /* Hide mobile menu on larger screens */
            }
        }
    </style>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <!-- Fixed Navigation Bar -->
    <nav class="fixed w-full top-0 z-50 nav-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 lg:h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <a href="#" class="flex items-center space-x-2 hover-effect">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 lg:h-10 lg:w-10 text-orange logo" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="text-xl lg:text-2xl font-bold text-orange">Globestitch</span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center space-x-8 desktop-links">
                    <a href="/" class="flex items-center space-x-2 text-orange hover:text-gray-600 hover-effect px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                    <a href="/about" class="flex items-center space-x-2 text-orange hover:text-gray-600 hover-effect px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-info-circle"></i>
                        <span>About Us</span>
                    </a>
                    <a href="/experience" class="flex items-center space-x-2 text-orange hover:text-gray-600 hover-effect px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-globe"></i>
                        <span>Experience</span>
                    </a>
                    <a href="/trips" class="flex items-center space-x-2 text-orange hover:text-gray-600 hover-effect px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Upcoming Trips</span>
                    </a>
                    <a href="/blog" class="flex items-center space-x-2 text-orange hover:text-gray-600 hover-effect px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-blog"></i>
                        <span>Blog</span>
                    </a>
                    <a href="/contact" class="flex items-center space-x-2 text-orange hover:text-gray-600 hover-effect px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-envelope"></i>
                        <span>Contact</span>
                    </a>
                    <a href="/login" class="flex items-center space-x-2 bg-orange-500 text-white hover:bg-orange-600 px-4 py-2 rounded-full text-sm font-medium transition-colors duration-300">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="menuButton" class="lg:hidden text-orange hover:text-gray-600 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu">
            <div class="px-4 py-3 space-y-3">
                <a href="#" class="flex items-center justify-between text-orange hover:bg-gray-100 px-4 py-3 rounded-lg transition-colors duration-300">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-home w-6"></i>
                        <span class="font-medium">Home</span>
                    </div>
                    <i class="fas fa-angle-right text-gray-400"></i>
                </a>
                <a href="#" class="flex items-center justify-between text-orange hover:bg-gray-100 px-4 py-3 rounded-lg transition-colors duration-300">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-info-circle w-6"></i>
                        <span class="font-medium">About Us</span>
                    </div>
                    <i class="fas fa-angle-right text-gray-400"></i>
                </a>
                <a href="#" class="flex items-center justify-between text-orange hover:bg-gray-100 px-4 py-3 rounded-lg transition-colors duration-300">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-globe w-6"></i>
                        <span class="font-medium">Experience</span>
                    </div>
                    <i class="fas fa-angle-right text-gray-400"></i>
                </a>
                <a href="#" class="flex items-center justify-between text-orange hover:bg-gray-100 px-4 py-3 rounded-lg transition-colors duration-300">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-calendar-alt w-6"></i>
                        <span class="font-medium">Upcoming Trips</span>
                    </div>
                    <i class="fas fa-angle-right text-gray-400"></i>
                </a>
                <a href="#" class="flex items-center justify-between text-orange hover:bg-gray-100 px-4 py-3 rounded-lg transition-colors duration-300">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-blog w-6"></i>
                        <span class="font-medium">Blog</span>
                    </div>
                    <i class="fas fa-angle-right text-gray-400"></i>
                </a>
                <a href="#" class="flex items-center justify-between text-orange hover:bg-gray-100 px-4 py-3 rounded-lg transition-colors duration-300">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope w-6"></i>
                        <span class="font-medium">Contact</span>
                    </div>
                    <i class="fas fa-angle-right text-gray-400"></i>
                </a>
                <div class="pt-2">
                    <a href="/login" class="flex items-center justify-center space-x-2 bg-orange-500 text-white hover:bg-orange-600 px-4 py-3 rounded-lg text-sm font-medium transition-colors duration-300">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Spacer to prevent content from hiding under fixed navbar -->
    <div class="h-16 lg:h-20"></div>

    <script>
        const menuButton = document.getElementById('menuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        let isMenuOpen = false;

        menuButton.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            mobileMenu.classList.toggle('show');
            menuButton.innerHTML = isMenuOpen ?
                '<i class="fas fa-times text-2xl"></i>' :
                '<i class="fas fa-bars text-2xl"></i>';
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (isMenuOpen && !mobileMenu.contains(e.target) && !menuButton.contains(e.target)) {
                isMenuOpen = false;
                mobileMenu.classList.remove('show');
                menuButton.innerHTML = '<i class="fas fa-bars text-2xl"></i>';
            }
        });
    </script>
</body>
</html>
