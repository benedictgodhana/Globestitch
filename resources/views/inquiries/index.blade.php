<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <x-app-layout>
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Inquiries Management</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Search and Filter Form -->
            <form method="GET" action="{{ route('inquiries.index') }}" class="mb-3 d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request('search') }}">
                <select name="trip_id" class="form-select">
                    <option value="">Filter by Trip</option>
                    @foreach ($tripIds as $trip)
                        <option value="{{ $trip->id }}" {{ request('trip_id') == $trip->id ? 'selected' : '' }}>{{ $trip->title }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('inquiries.index') }}" class="btn btn-secondary">Reset</a>
            </form>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Trip</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inquiries as $inquiry)
                        <tr>
                            <td>{{ $inquiry->name }}</td>
                            <td>{{ $inquiry->email }}</td>
                            <td>{{ $inquiry->phone }}</td>
                            <td>{{ $inquiry->trip->title ?? 'N/A' }}</td>
                            <td>{{ $inquiry->message }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal{{ $inquiry->id }}">
                                    <i class="fas fa-reply"></i> Reply
                                </button>
                            </td>
                        </tr>

                        <!-- Reply Modal -->
                        <div class="modal fade" id="replyModal{{ $inquiry->id }}" tabindex="-1" aria-labelledby="replyModalLabel{{ $inquiry->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="replyModalLabel{{ $inquiry->id }}">Reply to {{ $inquiry->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('inquiries.reply') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="replyMessage" class="form-label">Message</label>
                                                <textarea class="form-control" name="message" id="replyMessage" rows="3" required></textarea>
                                            </div>
                                            <input type="hidden" name="contact_id" value="{{ $inquiry->id }}">
                                            <input type="hidden" name="email" value="{{ $inquiry->email }}">

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Send Reply</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
