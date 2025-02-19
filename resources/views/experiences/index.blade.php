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

        .experiences-table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--card-background);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .experiences-table th,
        .experiences-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .experiences-table th {
            background-color: #f3f4f6;
            color: var(--secondary-color);
            font-weight: 600;
        }

        .experiences-table tr:hover {
            background-color: #f9fafb;
        }

        .status-active {
            color: green;
        }

        .status-pending {
            color: orange;
        }

        .status-inactive {
            color: red;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            transition: background-color 0.3s ease;
        }

        .action-buttons a.view {
            background-color: var(--primary-color);
            color: white;
        }

        .action-buttons a.edit {
            background-color: #f59e0b;
            color: white;
        }

        .action-buttons a.delete {
            background-color: #ef4444;
            color: white;
        }

        .action-buttons a:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="container">
            <h1>Experiences</h1>

            <!-- Add New Experience Button -->
            <a href="{{ route('experiences.create') }}" style="display: inline-block; margin-bottom: 1.5rem; padding: 0.75rem 1.5rem; background-color: var(--primary-color); color: white; text-decoration: none; border-radius: 0.25rem;">
                Add New Experience
            </a>

            <!-- Experiences Table -->
            <table class="experiences-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created By</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($experiences as $experience)
            <tr>
                <td>{{ $experience->title }}</td>
                <td>{{ $experience->category }}</td>
                <td>{{ $experience->description }}</td>
                <td>
                    @if ($experience->image)
                        <img src="{{ asset('storage/' . $experience->image) }}" alt="Experience Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $experience->creator->name ?? 'Unknown' }}</td>
                <td>{{ $experience->created_at->format('Y-m-d') }}</td>
                <td>
                    @if ($experience->status === 'active')
                        <span class="status-active">Active</span>
                    @elseif ($experience->status === 'pending')
                        <span class="status-pending">Pending</span>
                    @else
                        <span class="status-inactive">Inactive</span>
                    @endif
                </td>
                <td>
    <div class="action-buttons">
        <a href="{{ route('experiences.show', $experience->id) }}" class="view">View</a>
        <a href="{{ route('experiences.edit', $experience->id) }}" class="edit">Edit</a>
        <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST" style="display: inline;">
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
