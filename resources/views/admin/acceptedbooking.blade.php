@extends('admin.layout.app')

@section('title', 'Accepted Bookings')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center fw-bold">Accepted Bookings</h2>

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

                        <!-- Status Update Form -->
                        <td>
                            <form action="{{ route('admin.bookings.acceptedStatusChange', $booking->id) }}" method="POST">
                                @csrf
                                <select name="status" class="form-select" onchange="this.form.submit()">

                                    <option value="" {{ $booking->status === 'accepted' ? 'selected' : '' }}>Accepted</option>

                                    <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </form>
                        </td>

                        <td>
                            <span class="badge bg-success">Accepted</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">No Accepted Bookings Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
