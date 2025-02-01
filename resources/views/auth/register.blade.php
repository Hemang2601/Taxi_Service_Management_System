@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-5 animate__animated animate__fadeInDown" style="max-width: 500px; width: 100%; border-radius: 15px;">
        <!-- Header -->
        <div class="text-center mb-4">
            <img src="https://static.vecteezy.com/system/resources/previews/013/974/344/non_2x/taxi-service-logo-illustration-vector.jpg" alt="Taxi Logo" class="mb-3" style="width: 80px;">
            <h2 class="text-warning fw-bold">Create Your Account</h2>
            <p class="text-muted">Sign up to book your rides and enjoy our services</p>
        </div>

        <!-- Registration Form -->
        <form id="registerForm" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3 position-relative">
                    <label class="form-label fw-semibold">First Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                        <input type="text" name="firstname" class="form-control ps-3" placeholder="Enter first name" value="{{ old('firstname') }}" required aria-label="First Name">
                    </div>
                    @error('firstname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3 position-relative">
                    <label class="form-label fw-semibold">Last Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                        <input type="text" name="lastname" class="form-control ps-3" placeholder="Enter last name" value="{{ old('lastname') }}" required aria-label="Last Name">
                    </div>
                    @error('lastname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 position-relative">
                <label class="form-label fw-semibold">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control ps-3" placeholder="Enter your email" value="{{ old('email') }}" required aria-label="Email Address">
                </div>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3 position-relative">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control ps-3" placeholder="Enter password" required aria-label="Password">
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3 position-relative">
                    <label class="form-label fw-semibold">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password_confirmation" class="form-control ps-3" placeholder="Confirm password" required aria-label="Confirm Password">
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3 position-relative">
                    <label class="form-label fw-semibold">Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                        <input type="text" name="number" class="form-control ps-3" placeholder="Enter phone number" value="{{ old('number') }}" required aria-label="Phone Number">
                    </div>
                    @error('number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3 position-relative">
                    <label class="form-label fw-semibold">City</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-city"></i></span>
                        <input type="text" name="city" class="form-control ps-3" placeholder="Enter city" value="{{ old('city') }}" required aria-label="City">
                    </div>
                    @error('city')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-warning w-100 py-2 position-relative">
                <span id="btnText">Sign Up</span>
                <div id="btnLoader" class="spinner-border spinner-border-sm text-light d-none" role="status"></div>
            </button>
        </form>

        <!-- Login Link -->
        <div class="text-center mt-3">
            <p class="text-muted">Already have an account?
                <a href="{{ route('login') }}" class="text-warning text-decoration-none fw-semibold">Login</a>
            </p>
        </div>
    </div>
</div>
@endsection

<!-- Styles -->
<style>
/* Card Styling */
.card {
    border: none;
    background-color: #ffffff;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-warning:hover {
    background-color: #ff9800;
    transform: scale(1.05);
}

/* Input Styling */
.form-control {
    border-radius: 10px;
    border: 1px solid #ced4da;
    padding: 12px 16px;
    font-size: 15px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus {
    border-color: #ffc107;
    box-shadow: 0 0 8px rgba(255, 193, 7, 0.5);
}

/* Input Group Icons */
.input-group-text {
    background-color: #f1f1f1;
    border: none;
    border-radius: 10px 0 0 10px;
    font-size: 18px;
}

.input-group .form-control {
    border-radius: 0 10px 10px 0;
}

/* Label Styling */
.form-label {
    font-weight: 600;
    font-size: 16px;
}

/* Animation */
.animate__fadeInDown {
    animation-duration: 0.8s;
}

/* Spinner for Button */
.spinner-border {
    width: 20px;
    height: 20px;
}

/* Hero Background Customization */
body {
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
}

/* Text Link Styling */
.text-warning {
    color: #ffc107 !important;
}

/* Button Styling */
.btn-warning {
    background-color: #ffb300;
    border-radius: 10px;
    padding: 15px;
    font-size: 16px;
}

.btn-warning:hover {
    background-color: #ff9e00;
    transform: scale(1.05);
}

.text-muted {
    color: #6c757d !important;
}

/* Card Hover Effect */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

/* Forgot Password Link */
.text-muted a {
    font-size: 14px;
}
</style>

<!-- Script -->
<script>
document.getElementById('registerForm').addEventListener('submit', function () {
    const btnText = document.getElementById('btnText');
    const btnLoader = document.getElementById('btnLoader');

    // Hide text and show loader
    btnText.classList.add('d-none');
    btnLoader.classList.remove('d-none');
});

</script>
