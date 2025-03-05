@extends('layouts.app')


@section('content')
<form action="{{ route('booking.step2') }}" method="POST">
    @csrf
    <label>Select Drive Type:</label>
    <select name="drive_type" required>
        <option value="Self Drive">Self Drive</option>
        <option value="With Driver">With Driver</option>
    </select>
    <button type="submit">Next</button>
</form>


@endsection
