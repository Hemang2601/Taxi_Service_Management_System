@extends('admin.layout.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Statistics Cards -->
            @php
                $cards = [
                    ['title' => 'Total Earnings', 'value' => '$45,000', 'icon' => 'fas fa-dollar-sign', 'color' => 'bg-success'],
                    ['title' => 'Active Cars', 'value' => '320', 'icon' => 'fas fa-car-side', 'color' => 'bg-primary'],
                    ['title' => 'Pending Bookings', 'value' => '15', 'icon' => 'fas fa-hourglass-half', 'color' => 'bg-warning'],
                    ['title' => 'Total Drivers', 'value' => '200', 'icon' => 'fas fa-user-tie', 'color' => 'bg-danger'],
                    ['title' => 'Completed Rides', 'value' => '1,500', 'icon' => 'fas fa-check-circle', 'color' => 'bg-success'],
                    ['title' => 'Cancelled Bookings', 'value' => '45', 'icon' => 'fas fa-times-circle', 'color' => 'bg-danger'],
                    ['title' => 'Total Customers', 'value' => '2,500', 'icon' => 'fas fa-users', 'color' => 'bg-info'],
                    ['title' => 'Support Tickets', 'value' => '8', 'icon' => 'fas fa-headset', 'color' => 'bg-warning']
                ];
            @endphp

            @foreach($cards as $card)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container {{ $card['color'] }} text-white p-3 rounded-circle me-3">
                                <i class="{{ $card['icon'] }} fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted">{{ $card['title'] }}</h6>
                                <h4 class="fw-bold">{{ $card['value'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Charts Section -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-white fw-bold">Bookings Overview</div>
                    <div class="card-body">
                        <canvas id="bookingsChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-white fw-bold">Revenue Statistics</div>
                    <div class="card-body">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Integration -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
        new Chart(bookingsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Bookings',
                    data: [50, 100, 150, 200, 250, 300],
                    borderColor: '#007bff',
                    fill: false
                }]
            }
        });

        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [5000, 10000, 15000, 20000, 25000, 30000],
                    backgroundColor: '#28a745'
                }]
            }
        });
    </script>

    <style>
        .icon-container {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
    </style>
@endsection
