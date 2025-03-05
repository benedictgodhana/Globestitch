<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <title>GlobeStitch - Craft Your Perfect Travel Story</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #6b7280;
            --accent-color: #8b5cf6;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --background-color: #f9fafb;
            --card-background: #ffffff;
            --border-color: #e5e7eb;
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, sans-serif;
            background-color: var(--background-color);
            color: #1f2937;
        }

        .dashboard {
            padding: 2rem;
            max-width: 1600px;
            margin: 0 auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .dashboard h1 {
            font-size: 2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .date-display {
            font-size: 1rem;
            color: var(--secondary-color);
            background-color: var(--card-background);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
        }

        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
            border-radius: 0.5rem;
            color: white;
        }

        .icon-bookings {
            background-color: var(--primary-color);
        }

        .icon-customers {
            background-color: var(--success-color);
        }

        .icon-revenue {
            background-color: var(--accent-color);
        }

        .icon-tours {
            background-color: var(--warning-color);
        }

        .icon-pending {
            background-color: #fb923c;
        }

        .icon-experiences {
            background-color: #06b6d4;
        }

        .icon-blogs {
            background-color: #ec4899;
        }

        .metric-content {
            text-align: right;
        }

        .metric-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
        }

        .metric-label {
            font-size: 0.875rem;
            color: var(--secondary-color);
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (max-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        .chart-container {
            background-color: var(--card-background);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1.5rem;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .chart-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .chart-legend {
            display: flex;
            gap: 1rem;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.875rem;
            color: var(--secondary-color);
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 2px;
        }

        .calendar-container {
            background-color: var(--card-background);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1.5rem;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .calendar-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .calendar-nav {
            display: flex;
            gap: 0.5rem;
        }

        .calendar-nav button {
            background-color: #f3f4f6;
            border: none;
            border-radius: 0.25rem;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .calendar-nav button:hover {
            background-color: #e5e7eb;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
        }

        .calendar-day-name {
            text-align: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--secondary-color);
            padding: 0.5rem 0;
        }

        .calendar-day {
            text-align: center;
            font-size: 0.875rem;
            padding: 0.5rem 0;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .calendar-day:hover {
            background-color: #f3f4f6;
        }

        .calendar-day.current {
            background-color: var(--primary-color);
            color: white;
        }

        .calendar-day.has-events {
            position: relative;
        }

        .calendar-day.has-events::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background-color: var(--primary-color);
        }

        .recent-bookings {
            background-color: var(--card-background);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
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

        .status {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-confirmed {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .status-pending {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
        }

        .status-cancelled {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
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
    </style>
</head>
<body>
    <x-app-layout>
        <div class="dashboard">
            <div class="dashboard-header">
                <h1>Travel Dashboard</h1>
                <div class="date-display">
                    <i class="far fa-calendar-alt"></i>
                    <span id="current-date">February 28, 2025</span>
                </div>
            </div>

            <!-- Metrics Grid -->
            <div class="metrics-grid">
    <div class="metric-card">
        <div class="metric-icon icon-bookings">
            <i class="fas fa-plane"></i>
        </div>
        <div class="metric-content">
            <div class="metric-value">{{ number_format($stats['totalBookings']) }}</div>
            <div class="metric-label">Total Bookings</div>
        </div>
    </div>
    <div class="metric-card">
        <div class="metric-icon icon-customers">
            <i class="fas fa-users"></i>
        </div>
        <div class="metric-content">
            <div class="metric-value">{{ number_format($stats['activeCustomers']) }}</div>
            <div class="metric-label">Active Customers</div>
        </div>
    </div>

    <div class="metric-card">
        <div class="metric-icon icon-tours">
            <i class="fas fa-calendar-check"></i>
        </div>
        <div class="metric-content">
            <div class="metric-value">{{ number_format($stats['upcomingTours']) }}</div>
            <div class="metric-label">Upcoming Tours</div>
        </div>
    </div>
    <div class="metric-card">
        <div class="metric-icon icon-pending">
            <i class="fas fa-clock"></i>
        </div>
        <div class="metric-content">
            <div class="metric-value">{{ number_format($stats['pendingBookings']) }}</div>
            <div class="metric-label">Pending Bookings</div>
        </div>
    </div>
    <div class="metric-card">
        <div class="metric-icon icon-experiences">
            <i class="fas fa-map-marked-alt"></i>
        </div>
        <div class="metric-content">
            <div class="metric-value">{{ number_format($stats['totalExperiences']) }}</div>
            <div class="metric-label">Total Experiences</div>
        </div>
    </div>
    <div class="metric-card">
        <div class="metric-icon icon-blogs">
            <i class="fas fa-blog"></i>
        </div>
        <div class="metric-content">
            <div class="metric-value">{{ number_format($stats['publishedBlogs']) }}</div>
            <div class="metric-label">Published Blogs</div>
        </div>
    </div>
</div>

            <!-- Charts and Calendar Grid -->

            <div class="chart-container" style="margin-bottom: 2rem;">
    <div class="chart-header">
        <div class="chart-title">Monthly Performance</div>
        <div class="chart-legend">
            <div class="legend-item">
                <div class="legend-color" style="background-color: #8b5cf6;"></div>
                <span>Bookings</span>
            </div>
            <div class="legend-item">
                <div class="legend-color" style="background-color: #f59e0b;"></div>
                <span>Inquiries</span>
            </div>
        </div>
    </div>
    <canvas id="performanceChart" height="100"></canvas>
</div>

          <!-- Recent Bookings -->
<div class="recent-bookings">
    <h2>Recent Bookings</h2>
    <table class="bookings-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer</th>
                <th>Tour</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentbookings as $booking)
                <tr>
                    <td>#{{ $booking['id'] }}</td>
                    <td>{{ $booking['customer'] }}</td>
                    <td>{{ $booking['tour'] ?? 'N/A' }}</td>
                    <td>{{ $booking['date'] ? \Carbon\Carbon::parse($booking['date'])->format('Y-m-d') : 'N/A' }}</td>
                    <td><span class="status status-{{ strtolower($booking['status']) }}">{{ ucfirst($booking['status']) }}</span></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No recent bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


        <script>
            // Initialize date display
            document.getElementById('current-date').textContent = new Date().toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            // Set up calendar with highlighted dates
            const calendarDays = document.querySelectorAll('.calendar-day');
            const eventsData = [5, 8, 12, 15, 20, 22, 25]; // Days with events

            calendarDays.forEach((day, index) => {
                const dayNum = parseInt(day.textContent);
                if (!isNaN(dayNum) && eventsData.includes(dayNum)) {
                    day.classList.add('has-events');
                }
            });

            // Initialize Bookings & Inquiries Chart
            const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
            const bookingsChart = new Chart(bookingsCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: 'Bookings',
                            data: [65, 78, 52, 91, 68, 105, 120, 130, 95, 80, 70, 90],
                            backgroundColor: '#4f46e5',
                            borderColor: '#4f46e5',
                            borderWidth: 1
                        },
                        {
                            label: 'Inquiries',
                            data: [85, 95, 65, 115, 80, 125, 145, 160, 110, 95, 85, 105],
                            backgroundColor: '#10b981',
                            borderColor: '#10b981',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Initialize Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: 'Revenue',
                            data: [8500, 10200, 7800, 12500, 9500, 14200, 16500, 18000, 13500, 11000, 9800, 12000],
                            backgroundColor: 'rgba(139, 92, 246, 0.2)',
                            borderColor: '#8b5cf6',
                            borderWidth: 2,
                            tension: 0.4,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('performanceChart').getContext('2d');

        const chartData = {
            labels: @json($monthlyData->pluck('month')),
            datasets: [
                {
                    label: 'Bookings',
                    data: @json($monthlyData->pluck('bookings')),
                    backgroundColor: '#8b5cf6',
                    borderColor: '#6d28d9',
                    borderWidth: 1
                },
                {
                    label: 'Inquiries',
                    data: @json($monthlyData->pluck('inquiries')),
                    backgroundColor: '#f59e0b',
                    borderColor: '#d97706',
                    borderWidth: 1
                }
            ]
        };

        new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
    </x-app-layout>
</body>
</html>
