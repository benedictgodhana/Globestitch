<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>


@font-face {
  font-family: 'Futura LT';
  src: url('/fonts/futura-lt/FuturaLT-Book.ttf') format('woff2'),
       url('/fonts/futura-lt/FuturaLT.ttf') format('woff'),
       url('/fonts/futura-lt/FuturaLT-Condensed.ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}

        :root {
            --primary-color:green;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
            --header-height: 64px;
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Futura LT', sans-serif;

            background-color: #f9fafb;
            color: #1f2937;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: white;
            border-right: 1px solid #e5e7eb;
            transition: width var(--transition-speed) ease;
            position: fixed;
            height: 100vh;
            z-index: 50;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar-header {
            height: var(--header-height);
            padding: 1rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .nav-items {
            padding: 1rem 0.75rem;
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #4b5563;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: all var(--transition-speed) ease;
        }

        .nav-link:hover {
            background-color: #f3f4f6;
            color: var(--primary-color);
        }

        .nav-link.active {
            background-color: #ebe9fe;
            color: var(--primary-color);
        }

        .nav-icon {
            width: 1.5rem;
            height: 1.5rem;
            margin-right: 0.75rem;
        }

        .sidebar.collapsed .nav-text {
            display: none;
        }

        /* Header Styles */
        .header {
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            height: var(--header-height);
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: left var(--transition-speed) ease;
            z-index: 40;
        }

        .sidebar.collapsed ~ .header {
            left: var(--sidebar-collapsed-width);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: #4b5563;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
        }

        .toggle-btn:hover {
            background-color: #f3f4f6;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: #4b5563;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #ef4444;
            color: white;
            font-size: 0.75rem;
            padding: 0.125rem 0.375rem;
            border-radius: 1rem;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            border-radius: 0.375rem;
            cursor: pointer;
        }

        .user-menu:hover {
            background-color: #f3f4f6;
        }

        .user-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 9999px;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-content {
    margin-left: var(--sidebar-width);
    margin-top: var(--header-height);
    padding: 2rem;
    transition: margin-left var(--transition-speed) ease;
    width: calc(100% - var(--sidebar-width)); /* Fluid width */
    overflow-x: hidden; /* Prevent horizontal overflow */
}

.sidebar.collapsed ~ .main-content {
    margin-left: var(--sidebar-collapsed-width);
    width: calc(100% - var(--sidebar-collapsed-width)); /* Adjust width when collapsed */
}

/* Responsive Behavior */
@media (max-width: 768px) {
    .main-content {
        margin-left: 0; /* Full width on small screens */
        width: 100%;
    }

    .sidebar.collapsed ~ .main-content {
        margin-left: 0; /* Full width on small screens */
        width: 100%;
    }
}

        .dashboard {
            padding: 2rem;
        }

        .dashboard h1 {
            font-size: 2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .metric-card {
            background-color: var(--card-background);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform var(--transition-speed) ease, box-shadow var(--transition-speed) ease;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .metric-icon {
            width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ebe9fe;
            border-radius: 0.5rem;
            color: var(--primary-color);
        }

        .metric-content {
            text-align: right;
        }

        .metric-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .metric-label {
            font-size: 0.875rem;
            color: var(--secondary-color);
        }

        .recent-bookings {
            background-color: var(--card-background);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1.5rem;
        }

        .recent-bookings h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .bookings-table {
            width: 100%;
            border-collapse: collapse;
        }

        .bookings-table th,
        .bookings-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .bookings-table th {
            background-color: #f3f4f6;
            color: var(--secondary-color);
            font-weight: 600;
        }

        .bookings-table tr:hover {
            background-color: #f9fafb;
        }

        .quick-actions {
            margin-top: 2rem;
        }

        .quick-actions h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .action-card {
            background-color: var(--card-background);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1.5rem;
            text-align: center;
            transition: transform var(--transition-speed) ease, box-shadow var(--transition-speed) ease;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .action-icon {
            width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ebe9fe;
            border-radius: 0.5rem;
            color: var(--primary-color);
            margin: 0 auto 1rem;
        }

        .action-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .action-description {
            font-size: 0.875rem;
            color: var(--secondary-color);
        }
        .nav-link.active {
    background-color: #007bff; /* Your highlight color */
    color: white;
    font-weight: bold;
}


    </style>
</head>
<body>
    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo"></div>
    </div>
    <nav class="nav-items">
    <!-- Dashboard -->
    <div class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home nav-icon"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </div>

    <!-- Experiences -->
    <div class="nav-item">
        <a href="{{ route('experiences.index') }}" class="nav-link {{ request()->routeIs('experiences.index') ? 'active' : '' }}">
            <i class="fas fa-map-marked-alt nav-icon"></i>
            <span class="nav-text">Experiences</span>
        </a>
    </div>

    <!-- Upcoming Trips -->
    <div class="nav-item">
        <a href="{{ route('trips.index') }}" class="nav-link {{ request()->routeIs('trips.index') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt nav-icon"></i>
            <span class="nav-text">Upcoming Trips</span>
        </a>
    </div>

    <!-- Testimonials -->
    <div class="nav-item">
        <a href="{{ route('testimonials.index') }}" class="nav-link {{ request()->routeIs('testimonials.index') ? 'active' : '' }}">
            <i class="fas fa-comments nav-icon"></i>
            <span class="nav-text">Testimonials</span>
        </a>
    </div>

    <!-- Contact Messages -->
    <div class="nav-item">
        <a href="{{ route('contact-messages.index') }}" class="nav-link {{ request()->routeIs('contact-messages.index') ? 'active' : '' }}">
            <i class="fas fa-envelope nav-icon"></i>
            <span class="nav-text">Contact Messages</span>
        </a>
    </div>

    <!-- About Us -->
    <div class="nav-item">
        <a href="#" class="nav-link {{ request()->routeIs('about-us.edit') ? 'active' : '' }}">
            <i class="fas fa-info-circle nav-icon"></i>
            <span class="nav-text">About Us</span>
        </a>
    </div>

    <!-- Social Media Links -->
    <div class="nav-item">
        <a href="{{ route('social-media.index') }}" class="nav-link {{ request()->routeIs('social-media.index') ? 'active' : '' }}">
            <i class="fas fa-share-alt nav-icon"></i>
            <span class="nav-text">Social Media</span>
        </a>
    </div>

    <!-- Settings -->
    <div class="nav-item">
        <a href="{{ route('settings.edit') }}" class="nav-link {{ request()->routeIs('settings.edit') ? 'active' : '' }}">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-text">Settings</span>
        </a>
    </div>

    <!-- Logout -->
    <div class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-text">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>

</aside>
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <button class="toggle-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-right">
                <button class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <div class="user-menu">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <span>{{Auth::user()->name}}</span>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            {{ $slot }}
        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
        }
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentPath = window.location.pathname;

        document.querySelectorAll(".nav-link").forEach(link => {
            if (link.getAttribute("href") === currentPath) {
                link.classList.add("active");
            }
        });
    });
</script>

</body>
</html>
