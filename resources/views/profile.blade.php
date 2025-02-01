@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/150" alt="John Doe" class="rounded-circle border-4 border-white shadow-sm" width="120" height="120">
                            <div class="ms-4">
                                <h5 class="card-title fw-bold fs-3 text-dark">John Doe</h5>
                                <p class="text-muted mb-0">Taxi Service User</p>
                                <p class="text-muted">Gold Member</p>
                            </div>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <a href="#" class="btn btn-outline-info me-2"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Membership & Activity Summary -->
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 rounded-3 mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">Total Rides</h6>
                                    <p class="fs-4">35</p>
                                </div>
                            </div>
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-success">Loyalty Points</h6>
                                    <p class="fs-4">120</p>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Information -->
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 rounded-3 mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-info">Email</h6>
                                    <p class="mb-0">john.doe@example.com</p>
                                </div>
                            </div>
                            <div class="card shadow-sm border-0 rounded-3 mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-warning">Phone</h6>
                                    <p class="mb-0">+1 234 567 890</p>
                                </div>
                            </div>
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-danger">City</h6>
                                    <p class="mb-0">New York</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Include FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
