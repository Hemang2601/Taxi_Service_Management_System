@extends('layouts.app')

@section('content')
<form action="{{ route('car-booking.step1') }}" method="POST">
    @csrf
    <div class="row">
        <!-- Self-Drive Card -->
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Self-Drive</h5>
                    <p class="card-text">Drive the car yourself and enjoy your journey at your own pace.</p>
                    <input type="radio" name="drive_type" id="selfDrive" value="self" class="btn-check" required>
                    <label for="selfDrive" class="btn btn-outline-primary">Select</label>
                </div>
            </div>
        </div>

        <!-- Driver-Driven Card -->
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Driver-Driven</h5>
                    <p class="card-text">Sit back and relax while a professional driver takes you to your destination.</p>
                    <input type="radio" name="drive_type" id="driverDriven" value="driver" class="btn-check" required>
                    <label for="driverDriven" class="btn btn-outline-primary">Select</label>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">Next</button>
    </div>
</form>
@endsection
