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
        <div>


        @if(session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            let successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.transition = "opacity 0.5s";
                successMessage.style.opacity = "0";
                setTimeout(() => successMessage.remove(), 500); // Remove after fade-out
            }
        }, 4000);
    </script>
@endif
            <div class="card p-4">
                <h1>Users Management</h1>

                <div class="search-filter d-flex gap-2">
                    <input type="text" id="search" class="form-control" placeholder="Search by name or email..." onkeyup="filterUsers()">
                    <select id="statusFilter" class="form-select" onchange="filterUsers()">
                        <option value="">All Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div >
                    <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addModal">Add User</button>
                </div>

                <table class="table mt-3">



                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                <td>
                                <button class="btn btn-primary btn-sm" onclick="viewUser('{{ $user->name }}', '{{ $user->email }}', '{{ $user->status }}')">View</button>
                                    <button class="btn btn-success btn-sm" onclick="editUser({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteUser({{ $user->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>

    <!-- Add User Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST" id="addUserForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="addUserName" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="addUserEmail" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="addUserPassword" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confrim Password</label>
                            <input type="password" class="form-control" id="addUserPassword" name="confirm_password">
                        </div>
                        <button type="submit" class="btn btn-success">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                <form id="editUserForm" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" id="editUserId" name="id">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" id="editUserName" name="name">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" id="editUserEmail" name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" id="editUserPassword" name="password" placeholder="Leave blank to keep current password">
    </div>
    <button type="submit" class="btn btn-success">Save Changes</button>
</form>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="viewUserBody"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteUserForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
 function viewUser(name, email, status) {
            document.getElementById('viewUserBody').innerHTML = `<p><strong>Name:</strong> ${name}</p><p><strong>Email:</strong> ${email}</p><p><strong>Status:</strong> ${status ? 'Active' : 'Inactive'}</p>`;
            new bootstrap.Modal(document.getElementById('viewModal')).show();
        }

        function editUser(id, name, email) {
            document.getElementById('editUserId').value = id;
            document.getElementById('editUserName').value = name;
            document.getElementById('editUserEmail').value = email;
            document.getElementById('editUserPassword').value = '';
            document.getElementById('editUserForm').action = `/users/${id}`;

            new bootstrap.Modal(document.getElementById('editModal')).show();

        }

        function deleteUser(userId) {
    let form = document.getElementById('deleteUserForm');
    form.action = `/users/${userId}`; // Ensure this matches your route
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}


    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
