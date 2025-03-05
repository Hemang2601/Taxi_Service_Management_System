@extends('admin.layout.app')

@section('title', 'Manage Cars')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-dark">Manage Cars</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCarModal">
            <i class="fas fa-plus"></i> Add Car
        </button>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
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

    <!-- Cars List -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($cars as $car)
            <div class="col">
                <div class="card shadow-sm car-card">
                    <img src="{{ asset('cars/' . $car->image) }}" class="card-img-top car-img" alt="{{ $car->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $car->name }} ({{ $car->model }})</h5>
                        <p class="text-muted"><i class="fas fa-car"></i> {{ ucfirst($car->type) }} |
                            <i class="fas fa-gas-pump"></i> {{ ucfirst($car->fuel) }}</p>
                        <p class="mb-1"><strong>Seats:</strong> {{ $car->seats }} | <strong>Transmission:</strong> {{ $car->transmission }}</p>
                        <p class="fw-bold text-primary">₹ {{ $car->price }}/day</p>

                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button class="btn btn-danger btn-sm delete-car" data-id="{{ $car->id }}">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Add Car Modal -->
<div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="addCarModalLabel">Add New Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Car Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Model</label>
                            <input type="text" name="model" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">License Plate</label>
                            <input type="text" name="license_plate" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Seats</label>
                            <input type="number" name="seats" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fuel Type</label>
                            <select name="fuel" class="form-control" required>
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="CNG">CNG</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Transmission</label>
                            <select name="transmission" class="form-control" required>
                                <option value="Automatic">Automatic</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Car Type</label>
                            <select name="type" class="form-control" required>
                                <option value="SUV">SUV</option>
                                <option value="Sedan">Sedan</option>
                                <option value="Luxury">Luxury</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Price (₹/day)</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Car Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save Car
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .car-card {
        height: 100%;
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        flex-direction: column;
    }
    .car-card:hover {
        transform: scale(1.03);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }
    .car-img {
        height: 200px;
        width: auto;
        object-fit: cover;
        margin: 10px;
    }
    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
</style>

<script>
    document.querySelectorAll('.delete-car').forEach(button => {
        button.addEventListener('click', function() {
            let carId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/cars/${carId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => response.json())
                      .then(data => {
                          Swal.fire('Deleted!', data.success, 'success')
                              .then(() => location.reload());
                      })
                      .catch(error => Swal.fire('Error!', 'Something went wrong.', 'error'));
                }
            });
        });
    });
</script>

@endsection
