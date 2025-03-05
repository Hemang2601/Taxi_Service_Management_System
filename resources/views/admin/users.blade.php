@extends('admin.layout.app')

@section('title', 'Manage Users')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark"><i class="fas fa-users"></i> Manage Users</h3>
        <div class="d-flex gap-3 align-items-center">
            <div class="search-container position-relative">
                <input type="text" id="searchUser" class="form-control shadow-sm search-box" placeholder="🔍 Search users..." onkeyup="searchUsers()">
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 animated-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="userTable">
                    <thead class="table-primary text-dark">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="fw-bold">{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->number }}</td>
                                <td>{{ $user->city }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm shadow-sm animate-btn editUser"
                                        data-bs-toggle="modal" data-bs-target="#editUserModal"
                                        data-id="{{ $user->id }}"
                                        data-firstname="{{ $user->firstname }}"
                                        data-lastname="{{ $user->lastname }}"
                                        data-email="{{ $user->email }}"
                                        data-number="{{ $user->number }}"
                                        data-city="{{ $user->city }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <button class="btn btn-danger btn-sm shadow-sm animate-btn deleteUser"
                                        data-id="{{ $user->id }}">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>

                                    <form id="deleteForm-{{ $user->id }}" action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold"><i class="fas fa-user-edit"></i> Edit User</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" action="{{ route('admin.users.update') }}" method="POST">
                    @csrf
                    <input type="hidden" id="editUserId" name="id">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="editFirstName" class="form-label fw-bold">First Name</label>
                            <input type="text" class="form-control shadow-sm" id="editFirstName" name="firstname" required>
                        </div>

                        <div class="col-md-6">
                            <label for="editLastName" class="form-label fw-bold">Last Name</label>
                            <input type="text" class="form-control shadow-sm" id="editLastName" name="lastname" required>
                        </div>

                        <div class="col-md-6">
                            <label for="editEmail" class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control shadow-sm" id="editEmail" name="email" required>
                        </div>

                        <div class="col-md-6">
                            <label for="editNumber" class="form-label fw-bold">Phone Number</label>
                            <input type="text" class="form-control shadow-sm" id="editNumber" name="number" required>
                        </div>

                        <div class="col-md-12">
                            <label for="editCity" class="form-label fw-bold">City</label>
                            <input type="text" class="form-control shadow-sm" id="editCity" name="city" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-secondary shadow-sm me-2" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary shadow-sm">
                            <i class="fas fa-save"></i> Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert & Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function searchUsers() {
        let input = document.getElementById("searchUser").value.toLowerCase();
        let rows = document.querySelectorAll("#userTable tbody tr");
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(input) ? "" : "none";
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".editUser").forEach(button => {
            button.addEventListener("click", function() {
                document.getElementById("editUserId").value = this.dataset.id;
                document.getElementById("editFirstName").value = this.dataset.firstname;
                document.getElementById("editLastName").value = this.dataset.lastname;
                document.getElementById("editEmail").value = this.dataset.email;
                document.getElementById("editNumber").value = this.dataset.number;
                document.getElementById("editCity").value = this.dataset.city;
            });
        });

        document.querySelectorAll(".deleteUser").forEach(button => {
            button.addEventListener("click", function() {
                let userId = this.dataset.id;
                Swal.fire({
                    title: "Are you sure?",
                    text: "This action cannot be undone!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("deleteForm-" + userId).submit();
                    }
                });
            });
        });
    });
</script>

@endsection
