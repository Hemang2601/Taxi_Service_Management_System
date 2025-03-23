@extends('admin.layout.app')

@section('title', 'Manage Bookings')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center fw-bold">Manage Bookings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <!-- Status Filter Buttons -->
   <div class="mb-3 d-flex justify-content-center">
    <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="btn btn-warning mx-1 {{ request('status') === 'pending' ? 'active' : '' }}">Pending</a>

    <a href="{{ route('admin.bookings.accepted') }}" class="btn btn-success mx-1 {{ request()->is('admin/bookings/accepted') ? 'active' : '' }}">Accepted</a>

    <a href="{{ route('admin.bookings.history') }}" class="btn btn-secondary mx-1 {{ request()->is('admin/bookings/history') ? 'active' : '' }}">History</a>
</div>


    <!-- Bookings Table -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Car</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Pickup Date</th>
                    <th>Drop-off Date</th>
                    <th>Route</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $key => $booking)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $booking->car->name }} ({{ $booking->car->model }})</td>
                        <td>{{ $booking->name }} ({{ $booking->email }})</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->pickup_date }}</td>
                        <td>{{ $booking->dropoff_date }}</td>
                        <td>{{ $booking->route->name ?? 'Self-Drive' }}</td>
                        <td>₹{{ number_format($booking->price, 2) }}</td>
                        <td>
                            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                                @csrf
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="accepted" {{ $booking->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="rejected" {{ $booking->status === 'rejected' ? 'selected' : '' }}>Rejected</option>

                                </select>
                            </form>
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBookingModal{{ $booking->id }}">
                                Edit
                            </button>

                            <!-- Delete Form -->
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Booking Modal -->
                    <div class="modal fade" id="editBookingModal{{ $booking->id }}" tabindex="-1" aria-labelledby="editBookingModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title">Edit Booking</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $booking->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ $booking->email }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="{{ $booking->phone }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pickup Date</label>
                                            <input type="date" name="pickup_date" class="form-control" value="{{ $booking->pickup_date }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Drop-off Date</label>
                                            <input type="date" name="dropoff_date" class="form-control" value="{{ $booking->dropoff_date }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number" step="0.01" name="price" class="form-control" value="{{ $booking->price }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update Booking</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @empty
                    <tr>
                        <td colspan="10" class="text-center">No Bookings Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
