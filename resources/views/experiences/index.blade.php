<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- jQuery (Required for Toastr) -->
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</head>
<body>
    <x-app-layout>
        <div>
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Experiences Management</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExperienceModal">
                        <i class="fas fa-plus"></i> Add Experience
                    </button>
                </div>
                <div class="search-filter d-flex gap-2 mb-3">
                    <input type="text" id="search" class="form-control" placeholder="Search by title or location..." onkeyup="filterExperiences()">
                    <select id="categoryFilter" class="form-select" onchange="filterExperiences()">
                        <option value="">All Categories</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Culture">Culture</option>
                        <option value="Relaxation">Relaxation</option>
                    </select>
                </div>
                <table class="table mt-3">
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
                    <tbody id="experiencesTableBody">
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
                                        <span class="badge bg-success">Active</span>
                                    @elseif ($experience->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editExperienceModal" onclick="editExperience({{ $experience->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteExperienceModal" onclick="deleteExperience({{ $experience->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>

    <!-- Add Experience Modal -->
    <div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExperienceModalLabel">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category">
                                <option>Adventure</option>
                                <option>Culture</option>
                                <option>Relaxation</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>



                        <div class="mb-3">
                        <label for="status">Status</label>
                <select name="status" id="status" required class="form-select">
                    <option value="active">Active</option>
                    <option value="pending">Pending</option>
                    <option value="inactive">Inactive</option>
                </select>
                        </div>

                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control">

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Experience Modal -->
    <div class="modal fade" id="editExperienceModal" tabindex="-1" aria-labelledby="editExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExperienceModalLabel">Edit Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select">
                                <option>Adventure</option>
                                <option>Culture</option>
                                <option>Relaxation</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control"></textarea>
                        </div>


                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



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
