@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex align-items-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhP1LzsEOSiEWX4xedVLb8maKpMnHCUpdtNQ&s"
                                alt="{{ $user->firstname }} {{ $user->lastname }}"
                                class="rounded-circle border-4 border-white shadow-sm" width="120" height="120">
                            <div class="ms-4">
                                <h5 class="card-title fw-bold fs-3 text-dark">{{ $user->firstname }} {{ $user->lastname }}</h5>
                                <p class="text-muted mb-0">Taxi Service User</p>
                                <p class="text-muted">Gold Member</p>
                            </div>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <!-- Edit Button triggers modal -->
                            <button class="btn btn-outline-info me-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="#" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Membership & Activity Summary -->
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 rounded-3 mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">Total Rides</h6>
                                    <p class="fs-4">{{ $user->rides_count ?? 0 }}</p>
                                </div>
                            </div>
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-success">Loyalty Points</h6>
                                    <p class="fs-4">{{ $user->loyalty_points ?? 0 }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Information -->
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 rounded-3 mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-info">Email</h6>
                                    <p class="mb-0">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="card shadow-sm border-0 rounded-3 mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-warning">Phone</h6>
                                    <p class="mb-0">{{ $user->number }}</p>
                                </div>
                            </div>
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-danger">City</h6>
                                    <p class="mb-0">{{ $user->city }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateProfileForm" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="number" value="{{ $user->number }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" value="{{ $user->city }}" required>
                    </div>

                    <!-- Submit Button with Spinner -->
                    <button type="submit" class="btn btn-primary w-100 py-2" id="updateProfileBtn">
                        <span id="updateBtnText">Update Profile</span>
                        <span id="updateBtnLoader" class="spinner-border spinner-border-sm d-none ms-2" role="status"></span>
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Include FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    document.getElementById('updateProfileForm').addEventListener('submit', function () {
    const btnText = document.getElementById('updateBtnText');
    const btnLoader = document.getElementById('updateBtnLoader');
    const updateProfileBtn = document.getElementById('updateProfileBtn');

    // Hide text, show spinner & disable button
    btnText.style.display = 'none';
    btnLoader.classList.remove('d-none');
    updateProfileBtn.setAttribute('disabled', 'true');
});

</script>
@endsection
