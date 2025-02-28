<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
    <x-app-layout>
        <div>
            <div class="card p-4">

            @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(function() {
            let successAlert = document.getElementById('successAlert');
            if (successAlert) {
                let alertInstance = new bootstrap.Alert(successAlert);
                alertInstance.close();
            }
        }, 4000); // 4 seconds
    </script>
@endif
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Blog Management</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogModal">
                        <i class="fas fa-plus"></i> Add Blog Post
                    </button>
                </div>
                <div class="search-filter d-flex gap-2 mb-3">
                    <input type="text" id="search" class="form-control" placeholder="Search by title..." onkeyup="filterBlogs()">
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Slug</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="blogTableBody">
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->category }}</td>
                                <td>{{ Str::limit($blog->description, 50) }}</td>
                                <td>
                                    @if ($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{$blog->slug}}</td>
                                <td>{{ $blog->author->name ?? 'Unknown' }}</td>
                                <td>{{ $blog->created_at->format('Y-m-d') }}</td>

                               <td>
    <!-- Edit Button -->
    <!-- Edit Button -->
<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editBlog{{ $blog->id }}" onclick="editBlog({{ $blog->id }})">
    <i class="fas fa-edit"></i> Edit
</button>

   <!-- View Button -->
<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewBlogModal{{ $blog->id }}">
    <i class="fas fa-eye"></i> View
</button>

   <!-- Delete Button -->
<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteBlogModal{{ $blog->id }}">
    <i class="fas fa-trash"></i> Delete
</button>

</td>

                            </tr>

                       <!-- Edit Blog Modal -->
<div class="modal fade" id="editBlog{{ $blog->id }}" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBlogModalLabel">Edit Blog Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="editBlogForm{{ $blog->id }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="editTitle{{ $blog->id }}" value="{{ $blog->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" id="editCategory{{ $blog->id }}" value="{{ $blog->category }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="editDescription{{ $blog->id }}" required>{{ $blog->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" id="editSlug{{ $blog->id }}" value="{{ $blog->slug }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="editStatus{{ $blog->id }}" class="form-select" required>
                            <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="archived" {{ $blog->status == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editImage{{ $blog->id }}">Image</label>
                        <input type="file" name="image" id="editImage{{ $blog->id }}" accept="image/*" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Blog Modal -->
<div class="modal fade" id="viewBlogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="viewBlogModalLabel{{ $blog->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewBlogModalLabel{{ $blog->id }}">View Blog Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>{{ $blog->title }}</h4>
                <p><strong>Category:</strong> {{ $blog->category }}</p>
                <p><strong>Description:</strong> {{ $blog->description }}</p>
                <p><strong>Slug:</strong> {{ $blog->slug }}</p>
                @if ($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="width: 100%; height: auto;">
                @else
                    <p>No image available</p>
                @endif
                <p><strong>Author:</strong> {{ $blog->author->name }}</p>
                <p><strong>Created At:</strong> {{ $blog->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
    </div>
</div>


<!-- Delete Blog Modal -->
<div class="modal fade" id="deleteBlogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="deleteBlogModalLabel{{ $blog->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBlogModalLabel{{ $blog->id }}">Delete Blog Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this blog post?</p>
            </div>
            <div class="modal-footer">
                <!-- Pass the blog ID in the form action -->
                <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>

    <!-- Add Blog Modal -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBlogModalLabel">Add Blog Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reading Time (in minutes)</label>
                        <input type="number" class="form-control" name="reading_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="archived">Archived</option>
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
