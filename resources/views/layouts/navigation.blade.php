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
        .nav-bg {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .text-primary {
            color: #008000; /* Green */
        }
        .bg-primary {
            background-color: #008000; /* Green */
        }
        .hover-effect {
            transition: all 0.3s ease;
        }
        .hover-effect:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Active Link */
        .active {
            color: #2563EB; /* Blue */
            font-weight: 600;
            position: relative;
        transition: color 0.3s ease;
        }

        .active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #2563EB;
        transform: scaleX(1);
        transition: transform 0.3s ease;
    }


        /* Mobile Menu Styles */
        .mobile-menu {
            position: fixed;
            top: 64px;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: white;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            z-index: 50;
            overflow-y: auto;
        }

        .mobile-menu.show {
            transform: translateX(0);
        }

        @media (min-width: 1024px) {
            .mobile-menu {
                display: none;
            }
        }

        /* Backdrop */
        .menu-backdrop {
            position: fixed;
            top: 64px;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out;
            z-index: 40;
        }

        .menu-backdrop.show {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-white Futura LT antialiased">
    <!-- Backdrop -->
    <div id="menuBackdrop" class="menu-backdrop"></div>

    <!-- Navigation Bar -->
    <nav class="fixed w-full top-0 z-50 nav-bg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <a href="#" class="flex items-center space-x-2 hover-effect">
                        <img src="/images/logo.png" alt="Globestitch Logo" class="w-20 h-12 sm:w-28 sm:h-16">
                        <span class="text-xl font-bold text-primary">Globestitch</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-primary hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="/about" class="text-primary hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">About Us</a>
                    <a href="/experience" class="text-primary hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Experience</a>
                    <a href="/upcoming_trips" class="text-primary hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Upcoming Trips</a>
                    <a href="/blog" class="text-primary hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Blog</a>
                    <a href="/faqs" class="text-primary hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">FAQS</a>
                    <a href="/contact" class="text-primary hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    <a href="/login" class="bg-primary text-white hover:bg-blue-600 px-4 py-2 rounded-full text-sm font-medium">Login</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="menuButton" class="lg:hidden text-primary hover:text-blue-600 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu">
            <div class="px-4 py-6 space-y-4">
                <a href="/" class="block text-primary hover:bg-blue-50 px-4 py-3 rounded-lg transition-colors">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-home w-6"></i>
                        <span>Home</span>
                    </div>
                </a>
                <a href="/about" class="block text-primary hover:bg-blue-50 px-4 py-3 rounded-lg transition-colors">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-info-circle w-6"></i>
                        <span>About Us</span>
                    </div>
                </a>
                <a href="/experience" class="block text-primary hover:bg-blue-50 px-4 py-3 rounded-lg transition-colors">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-globe w-6"></i>
                        <span>Experience</span>
                    </div>
                </a>
                <a href="/upcoming_trips" class="block text-primary hover:bg-blue-50 px-4 py-3 rounded-lg transition-colors">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-calendar-alt w-6"></i>
                        <span>Upcoming Trips</span>
                    </div>
                </a>
                <a href="/blog" class="block text-primary hover:bg-blue-50 px-4 py-3 rounded-lg transition-colors">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-blog w-6"></i>
                        <span>Blog</span>
                    </div>
                </a>

                <a href="/faqs" class="block text-primary hover:bg-blue-50 px-4 py-3 rounded-lg transition-colors">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-question-circle w-6"></i>
                        <span>FAQS</span>
                    </div>
                </a>
                <a href="/contact" class="block text-primary hover:bg-blue-50 px-4 py-3 rounded-lg transition-colors">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope w-6"></i>
                        <span>Contact</span>
                    </div>
                </a>
                <div class="pt-4">
                    <a href="/login" class="block w-full bg-primary text-white text-center hover:bg-blue-600 px-4 py-3 rounded-lg transition-colors">
                        <div class="flex items-center justify-center space-x-2">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Login</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Spacer -->
    <div class="h-16"></div>

    <script>
        const menuButton = document.getElementById('menuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuBackdrop = document.getElementById('menuBackdrop');
        let isMenuOpen = false;

        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            mobileMenu.classList.toggle('show');
            menuBackdrop.classList.toggle('show');
            menuButton.innerHTML = isMenuOpen ?
                '<i class="fas fa-times text-2xl"></i>' :
                '<i class="fas fa-bars text-2xl"></i>';
        }

        menuButton.addEventListener('click', toggleMenu);
        menuBackdrop.addEventListener('click', toggleMenu);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isMenuOpen) {
                toggleMenu();
            }
        });

        // Add active class to the current page link
        const currentUrl = window.location.pathname;
        const navLinks = document.querySelectorAll('nav a');

        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentUrl) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>
