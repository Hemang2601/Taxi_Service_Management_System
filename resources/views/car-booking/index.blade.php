@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Left Side: Steps -->
        <div class="col-md-3">
            <h4 class="text-primary mb-4"><i class="fas fa-clipboard-list me-2"></i> Booking Steps</h4>
            <ul class="list-group shadow-sm">
                <li class="list-group-item {{ $step == 1 ? 'active text-white bg-primary' : '' }}">
                    <i class="fas fa-car me-2"></i> Step 1: Select Drive Type
                </li>
                <li class="list-group-item {{ $step == 2 ? 'active text-white bg-primary' : '' }}">
                    <i class="fas fa-car-side me-2"></i> Step 2: Select Car Model
                </li>
                <li class="list-group-item {{ $step == 3 ? 'active text-white bg-primary' : '' }}">
                    <i class="fas fa-map-marker-alt me-2"></i> Step 3: Enter Pickup & Dropoff
                </li>
                <li class="list-group-item {{ $step == 4 ? 'active text-white bg-primary' : '' }}">
                    <i class="fas fa-calendar-alt me-2"></i> Step 4: Select Dates
                </li>
                <li class="list-group-item {{ $step == 5 ? 'active text-white bg-primary' : '' }}">
                    <i class="fas fa-check-circle me-2"></i> Step 5: Confirm Booking
                </li>
            </ul>
        </div>

        <!-- Right Side: Progress and Content -->
        <div class="col-md-9">
            <!-- Progress Bar -->
            <div class="progress mb-4" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar"
                     style="width: {{ ($step / 5) * 100 }}%;"
                     aria-valuenow="{{ $step }}" aria-valuemin="0" aria-valuemax="5">
                    {{ ($step / 5) * 100 }}%
                </div>
            </div>

            <!-- Step Content -->
            @if ($step == 1)
                <!-- Step 1: Select Drive Type -->
                @include('car-booking.step1')
            @elseif ($step == 2)
                <!-- Step 2: Select Car Model -->
                @include('car-booking.step2')
            @elseif ($step == 3)
                <!-- Step 3: Enter Pickup & Dropoff -->
                @include('car-booking.step3')
            @elseif ($step == 4)
                <!-- Step 4: Select Dates -->
                @include('car-booking.step4')
            @elseif ($step == 5)
                <!-- Step 5: Confirm Booking -->
                @include('car-booking.confirm')
            @endif
        </div>
    </div>
</div>

<!-- Include FontAwesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
