@extends('layouts.app')


@section('content')
<form action="{{ route('booking.step4') }}" method="POST">
    @csrf
    <label>Select Car:</label>
    <select name="car" required>
        <option value="Toyota Corolla">Toyota Corolla</option>
        <option value="Honda CR-V">Honda CR-V</option>
        <option value="Mercedes-Benz E-Class">Mercedes-Benz E-Class</option>
    </select>
    <button type="submit">Next</button>
</form>

@endsection
