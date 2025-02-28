<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <style>
        /* Base styles */
        body {
            margin: 0;
            font-family: 'Futura LT', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            color: #333;
            line-height: 1.6;
        }

        /* Footer styles */
        footer {
            background-color: #1a365d; /* Dark blue background */
            color: white;
            padding: 4rem 2rem 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: url('https://www.transparenttextures.com/patterns/asfalt-light.png'); /* Subtle texture */
        }

        .footer-container {
            max-width: 1280px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 2rem;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color:green; /* Coral accent color */
            position: relative;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50px;
            height: 3px;
            background-color:green; /* Coral accent color */
        }

        .footer-section p {
            color: #ccc;
            font-size: 0.95rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section li {
            margin-bottom: 0.75rem;
        }

        .footer-section a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.2s;
            font-size: 0.95rem;
        }

        .footer-section a:hover {
            color: #ff6b6b; /* Coral accent color */
        }

        /* Social Media Icons */
        .social-icons {
            margin-top: 1.5rem;
            display: flex;
            gap: 1rem;
        }

        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s, transform 0.2s;
        }

        .social-icons a:hover {
            transform: scale(1.1);
        }

        .social-icons svg {
            width: 20px;
            height: 20px;
            fill: white;
        }

        /* Copyright */
        .copyright {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.9rem;
            color: #aaa;
            padding: 1rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .footer-section {
                margin-bottom: 1.5rem;
                text-align: center;
            }

            .footer-section h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }
    </style>
</head>
<body>
    <footer>
        <div class="footer-container">
            <!-- About Us -->
            <div class="footer-section">
                <h3>About Us</h3>
                <p>
                    At GlobeStitch, we craft unforgettable travel experiences tailored just for you.
                    Explore the world with confidence and style.
                </p>
                <p>
                    Our mission is to inspire wanderlust and provide seamless travel planning services.
                </p>
                <div class="social-icons">
    <a href="#"><i class="mdi mdi-facebook"></i></a>
    <a href="#"><i class="mdi mdi-twitter"></i></a>
    <a href="#"><i class="mdi mdi-linkedin"></i></a>
    <a href="https://www.instagram.com/globestitchtours/?igsh=MWd3am1pY3Y4N2Q3aQ%3D%3D" target="_blank" rel="noopener noreferrer">
    <i class="mdi mdi-instagram"></i>
</a>
</div>

            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/experience">Experiences</a></li>
                    <li><a href="/About">About Us</a></li>
                    <li><a href="/upcoming_trips">Trips</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/faqs">FAQs</a></li>
                </ul>
            </div>

            <!-- Contact Us -->
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p><strong>Email:</strong>info@globestitchtours.com/ peter@globestitchtours.com</p>
                <p><strong>Phone:</strong>0729020932/ 0705453175</p>
                <p><strong>Address:</strong>The Foundry Africa, Viking House, Westlands</p>
                <p><strong>Support Hours:</strong> Mon - Fri, 9 AM - 6 PM</p>
            </div>

            <!-- Useful Resources -->

            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            &copy; 2023 GlobeStitch. All rights reserved.
        </div>
    </footer>
</body>
</html>
