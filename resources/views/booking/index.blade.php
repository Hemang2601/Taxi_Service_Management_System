@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-body p-5">
            <h3 class="text-center fw-bold mb-4">Taxi Booking</h3>

            <!-- Step Progress -->
            <div class="progress mb-4">
                <div id="progressBar" class="progress-bar bg-success" style="width: 25%;"></div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('booking.process') }}" method="POST">
                @csrf

                <!-- Step 1: Select Drive Type -->
                <div class="step">
                    <h5 class="fw-bold">Step 1: Choose Drive Type</h5>
                    <div class="mb-3">
                        <label class="form-label">Select Drive Type</label>
                        <select class="form-select" id="driveType" name="drive_type" required>
                            <option value="">Choose...</option>
                            <option value="Self-Drive">Self-Drive</option>
                            <option value="Driver-Driven">Driver-Driven</option>
                        </select>
                    </div>

                    <!-- Route Selection (Shown only for Driver-Driven) -->
                    <div class="mb-3 d-none" id="routeSelection">
                        <label class="form-label">Select Route</label>
                        <select class="form-select" id="route" name="route_id">
                            <option value="">Choose...</option>
                            @foreach($routes as $route)
                                <option value="{{ $route->id }}">{{ $route->route_name }} ({{ $route->start_location }} to {{ $route->end_location }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <!-- Step 2: Select Car Type -->
                <div class="step d-none">
                    <h5 class="fw-bold">Step 2: Select Car Type</h5>
                    <div class="mb-3">
                        <label class="form-label">Select Car Type</label>
                        <select class="form-select" id="carType" name="car_type" required>
                            <option value="">Choose...</option>
                            @foreach($carTypes as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Step 3: Select Car -->
                <div class="step d-none">
                    <h5 class="fw-bold">Step 3: Choose Your Car</h5>
                    <div class="mb-3">
                        <label class="form-label">Select Car</label>
                        <select class="form-select" id="carId" name="car_id" required>
                            <option value="">Choose...</option>
                        </select>
                    </div>

                    <!-- Car Image Preview -->
                    <div class="mb-3 text-center" id="carPreview" style="display: none;">
                        <img id="carImage" src="" class="img-fluid rounded shadow"
                             style="max-width: 300px;" alt="Car Image">
                        <p class="mt-2 fw-bold" id="carDetails"></p>
                    </div>
                </div>

                <!-- Step 4: Booking Form -->
                <div class="step d-none">
                    <h5 class="fw-bold">Step 4: Enter Booking Details</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email"
                                   value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone"
                                   value="{{ Auth::user()->number }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pickup Date</label>
                            <input type="date" class="form-control" id="pickupDate" name="pickup_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dropoff Date</label>
                            <input type="date" class="form-control" id="dropoffDate" name="dropoff_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Days</label>
                            <input type="text" class="form-control" id="totalDays" name="total_days" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Price</label>
                            <input type="text" class="form-control" id="totalPrice" name="total_price" readonly>
                        </div>
                    </div>
                </div>


                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" id="prevStep" class="btn btn-secondary d-none">Previous</button>
                    <button type="button" id="nextStep" class="btn btn-primary">Next</button>
                    <button type="submit" id="submitBtn" class="btn btn-success d-none">Confirm Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Step Navigation and Dynamic Calculations -->
<script>
 document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 0;
    const steps = document.querySelectorAll(".step");
    const progressBar = document.getElementById("progressBar");
    const prevStepBtn = document.getElementById("prevStep");
    const nextStepBtn = document.getElementById("nextStep");
    const submitBtn = document.getElementById("submitBtn");

    function showStep(stepIndex) {
        steps.forEach((step, index) => step.classList.toggle("d-none", index !== stepIndex));
        prevStepBtn.classList.toggle("d-none", stepIndex === 0);
        nextStepBtn.classList.toggle("d-none", stepIndex === steps.length - 1);
        submitBtn.classList.toggle("d-none", stepIndex !== steps.length - 1);
        progressBar.style.width = `${((stepIndex + 1) / steps.length) * 100}%`;
    }

    function validateStep(stepIndex) {
        let isValid = true;
        const inputs = steps[stepIndex].querySelectorAll("input, select");
        let driveType = document.getElementById("driveType").value;

        inputs.forEach(input => {
            if (input.id === "route" && driveType === "Self-Drive") {
                input.classList.remove("is-invalid");
            } else if (!input.value) {
                isValid = false;
                input.classList.add("is-invalid");
            } else {
                input.classList.remove("is-invalid");
            }
        });
        return isValid;
    }

    nextStepBtn.addEventListener("click", () => {
        if (validateStep(currentStep) && currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    });

    prevStepBtn.addEventListener("click", () => {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    });

    document.querySelectorAll("input, select").forEach(input => {
        input.addEventListener("change", function () {
            if (this.value) this.classList.remove("is-invalid");
        });
    });

    document.getElementById("carType").addEventListener("change", function () {
        let carType = this.value;
        let carSelect = document.getElementById("carId");
        carSelect.innerHTML = '<option value="">Choose...</option>';

        let cars = @json(\App\Models\Car::all());
        cars.forEach(car => {
            if (car.type === carType) {
                let imagePath = `${window.location.origin}/cars/${car.image}`;
                carSelect.innerHTML += `<option value="${car.id}" data-price="${car.price}" data-image="${imagePath}" data-details="${car.name} (${car.model}, ${car.seats} seats, ${car.fuel}, ${car.transmission})">${car.name} (${car.model})</option>`;
            }
        });
    });

    let pickupDateInput = document.getElementById("pickupDate");
    let dropoffDateInput = document.getElementById("dropoffDate");
    let today = new Date().toISOString().split("T")[0];
    pickupDateInput.min = today;

    function handleDateChange() {
        let pickupDate = new Date(pickupDateInput.value);
        let dropoffDate = new Date(dropoffDateInput.value);
        dropoffDateInput.min = pickupDateInput.value;
        if (dropoffDateInput.value && dropoffDate < pickupDate) dropoffDateInput.value = "";
        calculateTotal();
    }

    pickupDateInput.addEventListener("change", handleDateChange);
    dropoffDateInput.addEventListener("change", calculateTotal);

    document.getElementById("carId").addEventListener("change", function () {
        let selectedCar = this.selectedOptions[0];
        let imagePath = selectedCar.getAttribute("data-image");
        let details = selectedCar.getAttribute("data-details");

        document.getElementById("carPreview").style.display = "block";
        document.getElementById("carImage").src = imagePath;
        document.getElementById("carDetails").innerText = details;
        calculateTotal();
    });

    document.getElementById("driveType").addEventListener("change", function () {
        let routeSelection = document.getElementById("routeSelection");
        routeSelection.classList.toggle("d-none", this.value !== "Driver-Driven");
        calculateTotal();
    });

    function calculateTotal() {
        let pickup = new Date(pickupDateInput.value);
        let dropoff = new Date(dropoffDateInput.value);
        let totalDays = Math.max(1, (dropoff - pickup) / (1000 * 3600 * 24));
        let carPrice = document.getElementById("carId").selectedOptions[0]?.getAttribute("data-price") || 0;
        let driveType = document.getElementById("driveType").value;
        let additionalCharge = driveType === "Driver-Driven" ? 1500 : 0;
        let totalPrice = totalDays * carPrice + additionalCharge;

        document.getElementById("totalDays").value = totalDays;
        document.getElementById("totalPrice").value = `₹ ${totalPrice}`;
    }

    pickupDateInput.addEventListener("change", calculateTotal);
    dropoffDateInput.addEventListener("change", calculateTotal);
    document.getElementById("driveType").addEventListener("change", calculateTotal);

    showStep(currentStep);

});

</script>
@endsection
