<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $experience->title }} - GlobeStitch Experiences</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js" defer></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- jQuery (Required for Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
            height: 40vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1533105079780-92b9be482077?ixlib=rb-4.0.3&auto=format&fit=crop&w=1974&q=80');
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
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(5, 150, 105, 0.6), rgba(37, 99, 235, 0.6));
            z-index: 1;
        }
        .hero-content {
            max-width: 800px;
            padding: 2rem;
            z-index: 1;
        }
        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }
        .cta-button {
            background-color: green;
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

        /* Main layout structure */
        .main-container {
            display: flex;
            flex-direction: row;
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .sidebar {
            flex: 0 0 300px;
            margin-right: 2rem;
        }

        .content-area {
            flex: 1;
        }

        /* Experience Selector */
        .experience-selector {
            margin-bottom: 2rem;
        }
        .experience-selector h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }
        .experience-tabs {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        .experience-tab {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            background-color: #f3f4f6;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }
        .experience-tab.active {
            background-color: green;
            color: white;
        }
        .experience-tab:hover:not(.active) {
            background-color: #e5e7eb;
        }

        /* Description */
        .experience-description {
            background-color: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        .experience-description h3 {
            margin-top: 0;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        /* Trip Grid */
        .trip-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
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
            height: 100%;
            display: flex;
            flex-direction: column;
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
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .trip-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .trip-description {
            color: #6B7280;
            margin-bottom: 1rem;
            flex-grow: 1;
        }
        .experience-tag {
            display: inline-block;
            background-color: #EEF2FF;
            color: #4F46E5;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.75rem;
        }
        .trip-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }
        .trip-date {
            font-size: 1rem;
            font-weight: bold;
            color: green;
        }
        .trip-actions {
            display: flex;
            gap: 0.5rem;
        }
        .trip-action {
            background-color: green;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.2s, transform 0.2s;
            cursor: pointer;
            border: none;
            font-size: 0.875rem;
        }
        .trip-action:hover {
            background-color: #DC2626;
        }
        .trip-inquiry {
            background-color: #4B5563;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.2s, transform 0.2s;
            cursor: pointer;
            border: none;
            font-size: 0.875rem;
        }
        .trip-inquiry:hover {
            background-color: #374151;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
        }
        .modal {
            background-color: white;
            border-radius: 10px;
            max-width: 500px;
            width: 90%;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #D1D5DB;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-input:focus {
            outline: none;
            border-color: green;
            box-shadow: 0 0 0 2px rgba(5, 150, 105, 0.2);
        }
        .form-submit {
            width: 100%;
            background-color: green;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .form-submit:hover {
            background-color: #DC2626;
        }
        .close-button {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #6B7280;
        }
        .close-button:hover {
            color: #1F2937;
        }

        /* Mobile menu toggle */
        .mobile-menu-toggle {
            display: none;
            background-color: green;
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 1rem;
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .main-container {
                flex-direction: column;
            }
            .sidebar {
                flex: none;
                width: 100%;
                margin-right: 0;
                margin-bottom: 2rem;
            }
            .content-area {
                width: 100%;
            }
            .experience-tabs {
                flex-direction: row;
                flex-wrap: wrap;
            }
            .experience-tab {
                flex: 1 1 auto;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            .hero p {
                font-size: 1rem;
            }
            .hero {
                height: 30vh;
            }
            .trip-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }
            .mobile-menu-toggle {
                display: block;
            }
            .sidebar-content {
                display: none;
            }
            .sidebar-content.mobile-visible {
                display: block;
            }
            .trip-card img {
                height: 180px;
            }
            .trip-actions {
                width: 100%;
            }
            .trip-action, .trip-inquiry {
                flex: 1;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 1.5rem;
            }
            .hero {
                height: 25vh;
            }
            .experience-tabs {
                flex-direction: column;
            }
            .trip-grid {
                grid-template-columns: 1fr;
            }
        }

        .no-trips-message {
    text-align: center;
    font-size: 1.2rem;
    font-weight: bold;
    color: #ff5a5f;
    margin: 20px 0;
}
.trip-card img {
    width: 100%; /* Ensures the image takes the full width of its container */
    height: auto; /* Maintains aspect ratio */
    object-fit: cover; /* Ensures the image covers the area without distortion */
    border-radius: 8px; /* Optional: Adds rounded corners */
    display: block; /* Removes extra spacing */
}
    </style>
</head>
<body x-data="{
    bookingModal: false,
    inquiryModal: false,
    currentTripTitle: '',
    currentTripDate: '',
    currentTripId: '',
    activeExperience: 'all',
    sidebarVisible: false,
    trips: {{ Js::from($experience->trips->map(function($trip) {
        return [
            'id' => $trip->id,
            'title' => $trip->title,
            'description' => $trip->description,
            'image_url' => asset('storage/'.$trip->image),
            'experience' => $trip->type, // Assuming you have a 'type' field
            'start_date' => \Carbon\Carbon::parse($trip->start_date)->toDateString(),
            'end_date' => \Carbon\Carbon::parse($trip->end_date)->toDateString(),
        ];
    })) }}
}">

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="experience-title">{{ $experience->title }}</h1>
        </div>
    </section>

    <!-- Main Content Layout -->
    <div class="main-container">
        <!-- Left Sidebar -->
        <aside class="sidebar">
            <button class="mobile-menu-toggle" @click="sidebarVisible = !sidebarVisible">
                <span x-text="sidebarVisible ? 'Hide Filters' : 'Show Filters'"></span>
            </button>

            <div class="sidebar-content" :class="{ 'mobile-visible': sidebarVisible }">
                <!-- Experience Selector -->


                <!-- Experience Description -->
                <main class="experience-content">
            <p class="experience-meta">
                <span>{{ \Carbon\Carbon::parse($experience->created_at)->format('F d, Y') }}</span>
            </p>

            <div class="experience-body">
                {!! nl2br(e($experience->description)) !!}
            </div>

            <a href="/experience" class="back-link btn">← Back to experiences</a>
        </main>

            </div>
        </aside>

        <!-- Right Content Area with Trips -->
        <main class="content-area">
    <template x-if="trips.length === 0">
        <p class="no-trips-message">No trips available at the moment. Please check back later.</p>
    </template>

    <div class="trip-grid">
        <template x-for="(trip, index) in trips" :key="index">
            <div class="trip-card" x-show="activeExperience === 'all' || activeExperience === trip.experience" x-transition>
                <img :src="trip.image_url" :alt="trip.title" >
                <div class="trip-content">
                    <h3 class="trip-title" x-text="trip.title"></h3>
                    <p class="trip-description" x-text="trip.description"></p>
                    <div class="trip-footer">
                        <span class="trip-date" x-text="
                            new Date(trip.start_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric'}) + ' - ' +
                            new Date(trip.end_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'})
                        "></span>
                        <div class="trip-actions">
                            <button class="trip-action"
                                    @click="
                                        bookingModal = true;
                                        currentTripTitle = trip.title;
                                        currentTripDate = new Date(trip.start_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric'}) + ' - ' + new Date(trip.end_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'});
                                        currentTripId = trip.id;
                                    ">
                                Book 
                            </button>
                            <button class="trip-inquiry"
                                    @click="
                                        inquiryModal = true;
                                        currentTripTitle = trip.title;
                                        currentTripDate = new Date(trip.start_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric'}) + ' - ' + new Date(trip.end_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'});
                                        currentTripId = trip.id;
                                    ">
                                Inquire
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</main>

    </div>

    <!-- Booking Modal -->
    <div class="modal-overlay" x-show="bookingModal" x-transition @click.self="bookingModal = false" style="display: none;">
        <div class="modal">
            <button class="close-button" @click="bookingModal = false">&times;</button>
            <h3 class="modal-title">Book an Experience: <span x-text="currentTripTitle"></span></h3>
            <p class="text-center" style="margin-top: -1rem; margin-bottom: 1.5rem; color: #6B7280;" x-text="currentTripDate"></p>
            <form action="{{ route('trip.book') }}" method="POST">
                @csrf
                <input type="hidden" name="trip_id" x-model="currentTripId">
                <div class="form-group">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="number_of_travelers" class="form-label">Number of Travelers</label>
                    <input type="number" id="number_of_travelers" name="number_of_travelers" min="1" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="special_requests" class="form-label">Special Requests (Optional)</label>
                    <textarea id="special_requests" name="special_requests" class="form-input" rows="3"></textarea>
                </div>

                <button type="submit" class="form-submit">Complete Booking</button>
            </form>
        </div>
    </div>

    <!-- Inquiry Modal -->
    <div class="modal-overlay" x-show="inquiryModal" x-transition @click.self="inquiryModal = false" style="display: none;">
        <div class="modal">
            <button class="close-button" @click="inquiryModal = false">&times;</button>
            <h3 class="modal-title">Inquiry for: <span x-text="currentTripTitle"></span></h3>
            <p class="text-center" style="margin-top: -1rem; margin-bottom: 1.5rem; color: #6B7280;" x-text="currentTripDate"></p>
            <form action="{{ route('trip.inquire') }}" method="POST">
                @csrf
                <input type="hidden" name="trip_id" x-model="currentTripId">
                <div class="form-group">
                    <label for="inquiry_name" class="form-label">Full Name</label>
                    <input type="text" id="inquiry_name" name="name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="inquiry_email" class="form-label">Email Address</label>
                    <input type="email" id="inquiry_email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="inquiry_phone" class="form-label">Phone</label>
                    <input type="tel" id="inquiry_phone" name="phone" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="inquiry_message" class="form-label">Your Questions</label>
                    <textarea id="inquiry_message" name="message" class="form-input" rows="4" required></textarea>
                </div>

                <button type="submit" class="form-submit">Send Inquiry</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        });
    </script>
</body>
</html>
