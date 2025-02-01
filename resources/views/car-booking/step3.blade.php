@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <h2 class="text-center mb-4 fw-bold">📅 Choose Date & Time</h2>

                <!-- Error Handling -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('car-booking.step3') }}" method="POST">
                    @csrf

                    <!-- Date & Time Selection -->
                    <div class="mb-4">
                        <label for="date_time" class="form-label fw-bold">
                            <i class="far fa-calendar-alt text-primary"></i> Select Date & Time
                        </label>
                        <input type="datetime-local" name="date_time" id="date_time" class="form-control custom-input" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow">
                            ✅ Confirm Booking
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Styling -->
<style>
    .custom-input {
        border-radius: 10px;
        padding: 12px;
        font-size: 16px;
        border: 2px solid #007bff;
        transition: all 0.3s ease-in-out;
    }

    .custom-input:focus {
        border-color: #0056b3;
        box-shadow: 0 0 8px rgba(0, 91, 187, 0.5);
    }

    .btn-primary {
        border-radius: 10px;
        padding: 15px;
        font-size: 18px;
        transition: background 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .card {
        border-radius: 15px;
        border: none;
        background: #fff;
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection
