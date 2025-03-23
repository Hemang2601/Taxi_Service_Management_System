@extends('admin.layout.app')

@section('title', 'Booking History')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center fw-bold">Booking History</h2>

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
                            @if($booking->status === 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @elseif($booking->status === 'completed')
                                <span class="badge bg-primary">Completed</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No Booking History Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
