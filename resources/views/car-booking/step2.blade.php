@extends('layouts.app')

@section('content')
<form action="{{ route('car-booking.step2') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="pickup_location" class="form-label">Pickup Location</label>
        <input type="text" name="pickup_location" id="pickup_location" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="dropoff_location" class="form-label">Dropoff Location</label>
        <input type="text" name="dropoff_location" id="dropoff_location" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Next</button>
</form>
@endsection
