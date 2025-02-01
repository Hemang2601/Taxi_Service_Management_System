@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4 fw-bold">🚖 Select Your Pickup & Dropoff Location</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <form action="{{ route('car-booking.step2') }}" method="POST">
                    @csrf

                    <!-- Pickup Location -->
                    <div class="mb-4">
                        <label for="pickup_location" class="form-label fw-bold"><i class="fas fa-map-marker-alt text-primary"></i> Pickup Location</label>
                        <select name="pickup_location" id="pickup_location" class="form-select custom-select" required>
                            <option value="" disabled selected>🗺️ Choose Pickup Location</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Surat">Surat</option>
                            <option value="Vadodara">Vadodara</option>
                            <option value="Rajkot">Rajkot</option>
                            <option value="Bhavnagar">Bhavnagar</option>
                            <option value="Jamnagar">Jamnagar</option>
                            <option value="Gandhinagar">Gandhinagar</option>
                            <option value="Junagadh">Junagadh</option>
                            <option value="Anand">Anand</option>
                            <option value="Bhuj">Bhuj</option>
                        </select>
                    </div>

                    <!-- Dropoff Location -->
                    <div class="mb-4">
                        <label for="dropoff_location" class="form-label fw-bold"><i class="fas fa-map-marker-alt text-danger"></i> Dropoff Location</label>
                        <select name="dropoff_location" id="dropoff_location" class="form-select custom-select" required>
                            <option value="" disabled selected>📍 Choose Dropoff Location</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Surat">Surat</option>
                            <option value="Vadodara">Vadodara</option>
                            <option value="Rajkot">Rajkot</option>
                            <option value="Bhavnagar">Bhavnagar</option>
                            <option value="Jamnagar">Jamnagar</option>
                            <option value="Gandhinagar">Gandhinagar</option>
                            <option value="Junagadh">Junagadh</option>
                            <option value="Anand">Anand</option>
                            <option value="Bhuj">Bhuj</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow">🚗 Proceed to Next Step</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Styling -->
<style>
    .custom-select {
        border-radius: 10px;
        padding: 12px;
        font-size: 16px;
        border: 2px solid #007bff;
        transition: all 0.3s ease-in-out;
    }

    .custom-select:focus {
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


