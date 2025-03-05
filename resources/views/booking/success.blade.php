@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="text-success">Booking Confirmed!</h2>
    <p>Your car has been successfully booked. Our team will contact you soon.</p>
    <a href="{{ route('booking.form') }}" class="btn btn-primary">Book Another Car</a>
</div>
@endsection
