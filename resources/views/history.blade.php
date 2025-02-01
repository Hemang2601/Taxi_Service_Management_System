@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center fw-bold text-dark">Your Booking History</h1>

    <div class="row g-4">
        <!-- Booking Entry 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg rounded-4 border-0 hover-card" style="height: 380px;">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #6e7cfc, #3b4fff)">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/60x60?text=Sedan" alt="Sedan" class="rounded-circle border-4 border-white shadow-sm">
                        <div class="ms-3 text-white">
                            <h5 class="card-title fw-bold fs-5">Sedan</h5>
                            <p class="text-muted mb-0">Main Street to Central Park</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-white">
                        <span class="text-muted">Date: <strong>2025-01-15</strong></span>
                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Completed</span>
                    </div>
                    <div class="mt-3 text-white">
                        <p><strong>Total KM:</strong> 400 KM</p>
                        <p><strong>Price:</strong> $120</p>
                        <p><strong>Included:</strong> WiFi, Air Conditioning, Water Bottle</p>
                    </div>
                    <a href="#" class="btn btn-light mt-3 w-100 shadow-sm text-dark"><i class="fas fa-info-circle"></i> View Details</a>
                </div>
            </div>
        </div>

        <!-- Booking Entry 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg rounded-4 border-0 hover-card" style="height: 380px;">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #ffc107, #ff9800)">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/60x60?text=SUV" alt="SUV" class="rounded-circle border-4 border-white shadow-sm">
                        <div class="ms-3 text-white">
                            <h5 class="card-title fw-bold fs-5">SUV</h5>
                            <p class="text-muted mb-0">Airport to Hotel XYZ</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-white">
                        <span class="text-muted">Date: <strong>2025-01-18</strong></span>
                        <span class="badge bg-warning"><i class="fas fa-hourglass-half"></i> Pending</span>
                    </div>
                    <div class="mt-3 text-white">
                        <p><strong>Total KM:</strong> 500 KM</p>
                        <p><strong>Price:</strong> $150</p>
                        <p><strong>Included:</strong> WiFi, Air Conditioning, Snacks</p>
                    </div>
                    <a href="#" class="btn btn-light mt-3 w-100 shadow-sm text-dark"><i class="fas fa-info-circle"></i> View Details</a>
                </div>
            </div>
        </div>

        <!-- Booking Entry 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg rounded-4 border-0 hover-card" style="height: 380px;">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #e74c3c, #f39c12)">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/60x60?text=Luxury" alt="Luxury" class="rounded-circle border-4 border-white shadow-sm">
                        <div class="ms-3 text-white">
                            <h5 class="card-title fw-bold fs-5">Luxury</h5>
                            <p class="text-muted mb-0">City Center to Airport</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-white">
                        <span class="text-muted">Date: <strong>2025-01-22</strong></span>
                        <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Canceled</span>
                    </div>
                    <div class="mt-3 text-white">
                        <p><strong>Total KM:</strong> 300 KM</p>
                        <p><strong>Price:</strong> $200</p>
                        <p><strong>Included:</strong> Premium Music, Air Conditioning, WiFi, Water Bottle</p>
                    </div>
                    <a href="#" class="btn btn-light mt-3 w-100 shadow-sm text-dark"><i class="fas fa-info-circle"></i> View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Global Styling */
    body {
        background-color: #f4f7fc;
    }

    .container {
        max-width: 1200px;
    }

    .card-body {
        padding: 24px;
    }

    .card-title {
        font-size: 1.4rem;
        color: #fff;
    }

    .card-text {
        font-size: 1rem;
        color: #ddd;
    }

    .badge {
        font-size: 0.9rem;
        padding: 6px 12px;
        border-radius: 12px;
    }

    .text-muted {
        font-size: 0.9rem;
    }

    .card img {
        width: 60px;
        height: 60px;
        object-fit: cover;
    }

    /* Modern Hover Effect on Cards */
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        border-radius: 12px;
    }

    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* Status Badges */
    .badge.bg-success {
        background-color: #28a745;
    }

    .badge.bg-warning {
        background-color: #ffc107;
    }

    .badge.bg-danger {
        background-color: #dc3545;
    }

    /* Typography for Title */
    h1 {
        font-family: 'Poppins', sans-serif;
        font-size: 2.5rem;
        color: #333;
    }

    .text-muted {
        font-size: 1rem;
    }

    /* Button Styling */
    .btn-light {
        border-color: #fff;
        color: #fff;
        background-color: rgba(255, 255, 255, 0.2);
        transition: transform 0.2s ease;
    }

    .btn-light:hover {
        transform: scale(1.05);
        background-color: rgba(255, 255, 255, 0.4);
    }
</style>
@endsection

@section('scripts')
<!-- Include FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
