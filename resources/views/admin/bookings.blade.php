@extends('admin.layout.app')

@section('title', 'Manage Bookings')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center fw-bold">Manage Bookings</h2>

    <!-- Status Tabs -->
    <ul class="nav nav-pills mb-3 justify-content-center" id="bookingTabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#pending">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#confirmed">Confirmed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#completed">Completed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#cancelled">Cancelled</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#history">Booking History</a>
        </li>
    </ul>

    <!-- Search Bar -->
    <div class="row mb-4">
        <div class="col-md-6 mx-auto">
            <input type="text" id="searchInput" class="form-control shadow-sm" placeholder="🔍 Search by Booking ID, Customer Name, or Car">
        </div>
    </div>

    <!-- Tab Content -->
    <div class="tab-content">
        {{-- <!-- Pending Bookings -->
        <div class="tab-pane fade show active" id="pending">
            @include('admin.bookings.partials.booking_table', ['bookings' => $pendingBookings, 'status' => 'pending'])
        </div>

        <!-- Confirmed Bookings -->
        <div class="tab-pane fade" id="confirmed">
            @include('admin.bookings.partials.booking_table', ['bookings' => $confirmedBookings, 'status' => 'confirmed'])
        </div>

        <!-- Completed Bookings -->
        <div class="tab-pane fade" id="completed">
            @include('admin.bookings.partials.booking_table', ['bookings' => $completedBookings, 'status' => 'completed'])
        </div>

        <!-- Cancelled Bookings -->
        <div class="tab-pane fade" id="cancelled">
            @include('admin.bookings.partials.booking_table', ['bookings' => $cancelledBookings, 'status' => 'cancelled'])
        </div>

        <!-- Booking History -->
        <div class="tab-pane fade" id="history">
            @include('admin.bookings.partials.booking_table', ['bookings' => $historyBookings, 'status' => 'history'])
        </div> --}}
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .nav-pills .nav-link {
        font-weight: bold;
        border-radius: 20px;
    }
    .nav-pills .nav-link.active {
        background-color: #ffb300;
    }
    .table {
        background: white;
    }
    .table th, .table td {
        text-align: center;
    }
    .form-select {
        width: 150px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Search Functionality
        document.getElementById("searchInput").addEventListener("input", function () {
            let searchQuery = this.value.toLowerCase();
            document.querySelectorAll("tbody tr").forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(searchQuery) ? "" : "none";
            });
        });

        // Status Update AJAX Simulation
        document.querySelectorAll(".status-dropdown").forEach(select => {
            select.addEventListener("change", function () {
                let bookingId = this.dataset.bookingId;
                let newStatus = this.value;

                console.log(`Updating Booking ID: ${bookingId} to ${newStatus}`);

                alert(`Booking ID ${bookingId} updated to ${newStatus}`);
            });
        });
    });
</script>
@endpush
