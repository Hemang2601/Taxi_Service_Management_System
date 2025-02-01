<form action="{{ route('car-booking.complete') }}" method="POST">
    @csrf
    <h5>Confirm Your Booking</h5>
    <p><strong>Car Model:</strong> {{ session('car_model') }}</p>
    <p><strong>Pickup Location:</strong> {{ session('pickup_location') }}</p>
    <p><strong>Dropoff Location:</strong> {{ session('dropoff_location') }}</p>
    <p><strong>Pickup Date:</strong> {{ session('pickup_date') }}</p>
    <p><strong>Dropoff Date:</strong> {{ session('dropoff_date') }}</p>
    <button type="submit" class="btn btn-success">Confirm Booking</button>
</form>
