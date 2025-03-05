@extends('layouts.app')


@section('content')
<form action="{{ route('booking.step3') }}" method="POST">
    @csrf
    <label>Select Car Type:</label>
    <select name="car_type" required>
        <option value="Sedan">Sedan</option>
        <option value="SUV">SUV</option>
        <option value="Luxury">Luxury</option>
    </select>
    <button type="submit">Next</button>
</form>

@endsection
