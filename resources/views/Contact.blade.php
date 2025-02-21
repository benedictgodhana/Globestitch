<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlobeStitch - Contact Us</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #059669; /* Green accent */
            --secondary-color: #2563EB; /* Blue accent */
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
        .contact-header {
            position: relative;
            text-align: center;
            padding: 8rem 1rem;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/woman-laughing-while-talking-phone.jpg') center/cover no-repeat;
            color: white;
            overflow: hidden;
        }

        .contact-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(5, 150, 105, 0.6), rgba(37, 99, 235, 0.6));
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
            animation: fadeIn 1s ease-in-out;
        }

        .header-subtitle {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.9;
            animation: slideUp 1s ease-in-out;
        }

        /* Contact Section */
        .contact-section {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .contact-info, .contact-form {
            flex: 1;
            min-width: 300px;
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .contact-info:hover, .contact-form:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .contact-info h2, .contact-form h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }

        .contact-info p {
            color: #6B7280;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .contact-item i {
            font-size: 1.5rem;
            color: var(--primary-color);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(5, 150, 105, 0.1);
            border-radius: 50%;
            transition: var(--transition);
        }

        .contact-item:hover i {
            background: var(--primary-color);
            color: white;
        }

        .contact-item span {
            font-size: 1.1rem;
            color: var(--text-color);
        }

        /* Form Group Styling */
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-size: 1.2rem;
            z-index: 2;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.75rem 0.75rem 0.75rem 2.5rem; /* Add padding for the icon */
            border: 1px solid var(--light-gray);
            border-radius: 10px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-group textarea {
            padding-left: 2.5rem;
            min-height: 150px;
        }

        .form-group input:focus, .form-group textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
        }

        .contact-form button {
            padding: 0.75rem 1.5rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .contact-form button:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-title {
                font-size: 2.5rem;
            }

            .contact-section {
                flex-direction: column;
                padding: 0 1rem;
            }

            .contact-info, .contact-form {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navigation')

    <header class="contact-header">
        <div class="header-content">
            <h1 class="header-title">Contact Us</h1>
            <p class="header-subtitle">We're here to help! Reach out to us for any inquiries or assistance.</p>
        </div>
    </header>

    <section class="contact-section">
        <div class="contact-info">
            <h2>Get in Touch</h2>
            <p>Have questions or need assistance? We're just a message away.</p>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>The Foundry  Africa, Viking House, Westlands</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone-alt"></i>
                <span> 0729020932/ 0705453175</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>info@globestitchtours.com/ peter@globestitchtours.com</span>
            </div>
        </div>

        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form>
                <!-- Name Field -->
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Your Name" required />
                </div>
                <!-- Email Field -->
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Your Email" required />
                </div>
                <!-- Subject Field -->
                <div class="form-group">
                    <i class="fas fa-tag"></i>
                    <input type="text" placeholder="Subject" required />
                </div>
                <!-- Message Field -->
                <div class="form-group">
                    <i class="fas fa-comment"></i>
                    <textarea placeholder="Your Message" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>
