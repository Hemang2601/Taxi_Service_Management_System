@extends('layouts.app')


@section('content')
<h2>Booking Confirmed!</h2>
<p>Thank you, {{ $booking->customer_name }}.</p>
<p>Your booking for {{ $booking->car }} ({{ $booking->car_type }}) with {{ $booking->drive_type }} has been confirmed.</p>

@endsection
