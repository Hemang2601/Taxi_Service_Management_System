@extends('admin.layout.app')

@section('title', 'Edit Car')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-dark">Edit Car - {{ $car->name }} ({{ $car->model }})</h3>
        <a href="javascript:history.back()" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>


    <!-- Success Message -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <!-- Error Message -->
    @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ $errors->first() }}",
                showConfirmButton: true
            });
        </script>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Car Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $car->name }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Model</label>
                    <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">License Plate</label>
                    <input type="text" name="license_plate" class="form-control" value="{{ $car->license_plate }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Seats</label>
                    <input type="number" name="seats" class="form-control" value="{{ $car->seats }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Fuel Type</label>
                    <select name="fuel" class="form-control" required>
                        <option value="Petrol" {{ $car->fuel == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                        <option value="Diesel" {{ $car->fuel == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                        <option value="CNG" {{ $car->fuel == 'CNG' ? 'selected' : '' }}>CNG</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Transmission</label>
                    <select name="transmission" class="form-control" required>
                        <option value="Automatic" {{ $car->transmission == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Car Type</label>
                    <select name="type" class="form-control" required>
                        <option value="SUV" {{ $car->type == 'SUV' ? 'selected' : '' }}>SUV</option>
                        <option value="Sedan" {{ $car->type == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                        <option value="Luxury" {{ $car->type == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Price (₹/day)</label>
                    <input type="number" name="price" class="form-control" value="{{ $car->price }}" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Car Image</label>
                    <input type="file" name="image" class="form-control">
                    <small class="text-muted">Leave blank if you don't want to change the image.</small>
                </div>

                <!-- Current Image Preview -->
                <div class="col-md-12 text-center mb-3">
                    <label class="form-label fw-bold">Current Image</label><br>
                    <img src="{{ asset('cars/' . $car->image) }}" class="img-thumbnail car-preview" alt="Car Image">
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update Car
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .car-preview {
        max-width: 200px;
        height: auto;
        border: 2px solid #ddd;
        border-radius: 8px;
        padding: 5px;
    }
</style>

@endsection
