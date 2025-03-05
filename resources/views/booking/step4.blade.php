@extends('layouts.app')


@section('content')
<form action="{{ route('booking.confirm') }}" method="POST">
    @csrf
    <input type="text" name="customer_name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <input type="text" name="phone" placeholder="Your Phone" required>
    <input type="date" name="pickup_date" required>
    <input type="date" name="return_date" required>
    <input type="text" name="total_price" placeholder="Total Price" required>
    <button type="submit">Confirm Booking</button>
</form>
@endsection
