<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
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
            color: #ff6b6b; /* Coral accent color */
            position: relative;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50px;
            height: 3px;
            background-color: #ff6b6b; /* Coral accent color */
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
            background-color: #ff6b6b; /* Coral accent color */
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
                    At TravelStitch, we craft unforgettable travel experiences tailored just for you.
                    Explore the world with confidence and style.
                </p>
                <p>
                    Our mission is to inspire wanderlust and provide seamless travel planning services.
                </p>
                <div class="social-icons">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v3l3-3v-4z"/></svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 7.22c-.78 0-1.53.23-2.15.62l-1.8-1.79C18.3 5.4 17.26 5 16 5H8c-1.26 0-2.3.4-3.17 1.09l-1.8 1.8c-.6-.39-1.37-.62-2.15-.62C3 7.22 2 8.22 2 9.41V15c0 1.19.9 2.19 2 2.19h16c1.1 0 2-.99 2-2.19V9.41c0-1.19-.99-2.19-2.18-2.19zM5.5 15c0 .83.67 1.5 1.5 1.5h11c.83 0 1.5-.67 1.5-1.5V9.41c0-.83-.67-1.5-1.5-1.5H7c-.83 0-1.5.67-1.5 1.5V15z"/></svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22.5 6.92c-.18-.53-.66-.92-1.25-.92h-21C.67 6 0 6.67 0 7.5v12c0 .83.67 1.5 1.5 1.5h11.36c-.18-1.06-.88-1.88-1.87-2.37V12h-3v4h-2v-4H8v-3.57c.85.2 1.69.58 2.42.99v2.78h3.34c-.2-.96-.68-1.88-1.48-2.56v-2.8h-2v-3h2v-1.79c.63.24 1.24.59 1.79.99V7.5h3.5c-.08-.46-.52-.8-1-1.02V6.92zM19.5 19c-.83 0-1.5-.67-1.5-1.5v-12c0-.83.67-1.5 1.5-1.5h2c.83 0 1.5.67 1.5 1.5v12c0 .83-.67 1.5-1.5 1.5h-2z"/></svg></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Experiences</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>

            <!-- Contact Us -->
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p><strong>Email:</strong> info@travelstitch.com</p>
                <p><strong>Phone:</strong> +1 123-456-7890</p>
                <p><strong>Address:</strong> 123 Travel Lane, Adventure City, USA</p>
                <p><strong>Support Hours:</strong> Mon - Fri, 9 AM - 6 PM</p>
            </div>

            <!-- Useful Resources -->
            <div class="footer-section">
                <h3>Useful Resources</h3>
                <ul>
                    <li><a href="#">Travel Tips</a></li>
                    <li><a href="#">Destination Guides</a></li>
                    <li><a href="#">Travel Insurance</a></li>
                    <li><a href="#">Currency Converter</a></li>
                    <li><a href="#">Travel Blog</a></li>
                    <li><a href="#">Customer Reviews</a></li>
                    <li><a href="#">Partnerships</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            &copy; 2023 TravelStitch. All rights reserved.
        </div>
    </footer>
</body>
</html>
