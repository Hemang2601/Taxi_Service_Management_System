@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center fw-bold text-dark">Your Booking History</h1>

    @if($bookings->isEmpty())
        <p class="text-center text-muted">No bookings found.</p>
    @else
        <div class="row g-4">
            @foreach ($bookings as $booking)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg rounded-4 border-0 hover-card" style="height: 380px;">
                        <div class="card-body p-4" style="background: linear-gradient(135deg, #6e7cfc, #3b4fff)">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ asset('cars/' . $booking->car->image) }}" alt="{{ $booking->car->name }}" class="rounded-circle border-4 border-white shadow-sm" width="60" height="60">
                                <div class="ms-3 text-white">
                                    <h5 class="card-title fw-bold fs-5">{{ $booking->car->name }}</h5>
                                    <p class="text-muted mb-0">{{ optional($booking->route)->start_location ?? 'Self-Drive' }} to {{ optional($booking->route)->end_location ?? 'Self-Drive' }}</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between text-white">
                                <span class="text-muted">Date: <strong>{{ $booking->pickup_date }}</strong></span>
                                @if ($booking->status == 'completed')
                                    <span class="badge bg-success"><i class="fas fa-check-circle"></i> Completed</span>
                                @elseif ($booking->status == 'pending')
                                    <span class="badge bg-warning"><i class="fas fa-hourglass-half"></i> Pending</span>
                                @else
                                    <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Canceled</span>
                                @endif
                            </div>

                            <div class="mt-3 text-white">
                                <p><strong>Total Days:</strong> {{ $booking->total_days }}</p>
                                <p><strong>Price:</strong> ₹{{ number_format($booking->price, 2) }}</p>
                                <p><strong>Included:</strong> {{ $booking->car->fuel }}, {{ $booking->car->transmission }}</p>
                            </div>

                            <a href="#" class="btn btn-light mt-3 w-100 shadow-sm text-dark"><i class="fas fa-info-circle"></i> View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@section('styles')
<style>
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

    .card img {
        object-fit: cover;
    }

    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection

@section('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
