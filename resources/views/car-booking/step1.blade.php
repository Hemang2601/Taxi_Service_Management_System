@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Choose Your Drive Type</h2>
    <form action="{{ route('car-booking.step1') }}" method="POST">
        @csrf
        <div class="row justify-content-center g-3">
            <!-- Self-Drive Option -->
            <div class="col-md-5">
                <input type="radio" name="drive_type" id="selfDrive" value="self" class="btn-check" required>
                <label for="selfDrive" class="card option-card p-3 text-center">
                    <div class="mb-2">
                        <i class="fas fa-car fa-2x text-primary"></i>
                    </div>
                    <h5 class="mb-2">Self-Drive</h5>
                    <p class="small text-muted">Drive the car yourself and enjoy your journey.</p>
                </label>
            </div>

            <!-- Driver-Driven Option -->
            <div class="col-md-5">
                <input type="radio" name="drive_type" id="driverDriven" value="driver" class="btn-check" required>
                <label for="driverDriven" class="card option-card p-3 text-center">
                    <div class="mb-2">
                        <i class="fas fa-user-tie fa-2x text-secondary"></i>
                    </div>
                    <h5 class="mb-2">Driver-Driven</h5>
                    <p class="small text-muted">A professional driver will take you to your destination.</p>
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-dark px-4">Next</button>
        </div>
    </form>
</div>

<style>
    /* Basic Styling */
    .option-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.2s ease, transform 0.2s ease;
    }

    .btn-check:checked + .option-card {
        background: #f8f9fa;
        border-color: #333;
        transform: scale(1.02);
    }

    .option-card:hover {
        background: #f8f9fa;
    }

    .btn-dark {
        border-radius: 6px;
    }
</style>
@endsection
