<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>

.action-buttons {
    display: flex;
    gap: 0.5rem; /* Adjust spacing between buttons */
}

.action-buttons a,
.action-buttons button {
    padding: 0.5rem 0.75rem;
    text-decoration: none;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9rem;
}

.view { background-color: #4f46e5; }
.edit { background-color: #f59e0b; }
.delete { background-color: #dc2626; }

.view:hover { background-color: #4338ca; }
.edit:hover { background-color: #d97706; }
.delete:hover { background-color: #b91c1c; }

        :root {
            --primary-color: #4f46e5;
            --secondary-color: #6b7280;
            --background-color: #f9fafb;
            --card-background: #ffffff;
            --border-color: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            padding: 2rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .trips-table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--card-background);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .trips-table th,
        .trips-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .trips-table th {
            background-color: #f3f4f6;
            color: var(--secondary-color);
            font-weight: 600;
        }

        .trips-table tr:hover {
            background-color: #f9fafb;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

    </style>
</head>
<body>
    <x-app-layout>
        <div class="container">
            <h1>Trips</h1>

            <!-- Add New Trip Button -->
            <a href="{{ route('trips.create') }}" style="display: inline-block; margin-bottom: 1.5rem; padding: 0.75rem 1.5rem; background-color: var(--primary-color); color: white; text-decoration: none; border-radius: 0.25rem;">
                Add New Trip
            </a>

            <!-- Trips Table -->
            <table class="trips-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trips as $trip)
                        <tr>
                            <td>{{ $trip->title }}</td>
                            <td>{{ $trip->description }}</td>
                            <td>
                                @if ($trip->image)
                                    <img src="{{ asset('storage/' . $trip->image) }}" alt="Trip Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $trip->start_date }}</td>
                            <td>{{ $trip->end_date }}</td>
                            <td>{{ $trip->creator->name ?? 'Unknown' }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('trips.show', $trip->id) }}" class="view">View</a>
                                    <a href="{{ route('trips.edit', $trip->id) }}" class="edit">Edit</a>
                                    <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </x-app-layout>
</body>
</html>
