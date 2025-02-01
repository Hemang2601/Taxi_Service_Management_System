@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Step 3: Choose Date & Time</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('car-booking.step3') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date_time" class="form-label">Choose Date & Time</label>
            <input type="datetime-local" name="date_time" id="date_time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Confirm Booking</button>
    </form>
</div>
@endsection
