@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Welcome Section -->
    <div class="text-center">
        <h1 class="text-primary fw-bold">Welcome to Taxi Service Management</h1>
        <p class="text-muted lead">Providing top-notch taxi and self-drive car rental services for over a decade. Your journey, our responsibility.</p>
        <img src="https://blog.infinitecab.com/wp-content/uploads/2020/09/taxi-aggregator-business-model.png" alt="Taxi Service" class="img-fluid mt-4 rounded shadow">
    </div>

    <!-- About Company Section -->
    <div class="mt-5">
        <h2 class="text-center text-secondary fw-bold">About Our Company</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-trophy fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Award-Winning Services</h5>
                        <p class="text-muted">Recognized for excellence in customer satisfaction and service quality.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Customer-Centric Approach</h5>
                        <p class="text-muted">We prioritize your needs and preferences to offer personalized solutions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-car fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Diverse Fleet</h5>
                        <p class="text-muted">Choose from a wide range of vehicles tailored for every journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="mt-5">
        <h2 class="text-center text-secondary fw-bold">Our Services</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary fw-bold">Self-Drive Cars</h5>
                        <p class="card-text text-muted">Enjoy the freedom to drive at your convenience with our well-maintained and fuel-efficient cars. Perfect for road trips, city commutes, and personal errands.</p>
                        <a href="{{ route('service') }}" class="btn btn-primary">Explore Self-Drive Cars</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary fw-bold">Chauffeur-Driven Taxis</h5>
                        <p class="card-text text-muted">Sit back and relax while our professional drivers take you to your destination safely and comfortably. Ideal for airport transfers, business trips, and city tours.</p>
                        <a href="{{ route('service') }}" class="btn btn-primary">Book a Taxi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Fleet Highlights Section -->
<div class="mt-5">
    <h2 class="text-center text-secondary fw-bold">Explore Our Fleet</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="https://cdn.cars24.com/prod/auto-news24-cms/CARS24-Blog-Images/2024/11/12/1bc6fa67-58cc-4a8d-bbe2-4d6d08f2894b-Amaze-(Compressify.io).jpg"
                     alt="Sedans"
                     class="card-img-top fleet-image rounded">
                <div class="card-body text-center">
                    <h5 class="fw-bold">Sedans</h5>
                    <p class="text-muted">Experience comfort and affordability with our range of sedans, perfect for daily commutes and city rides.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="https://cdn.cars24.com/prod/auto-news24-cms/CARS24-Blog-Images/2024/11/12/15267c8f-7230-46d4-a0b6-43b34bc5a490-Toyota-Innova-Crysta-(Compressify.io).jpg"
                     alt="SUVs"
                     class="card-img-top fleet-image rounded">
                <div class="card-body text-center">
                    <h5 class="fw-bold">SUVs</h5>
                    <p class="text-muted">For those who love adventure or need extra space, our SUVs provide style, power, and comfort.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="https://i.pinimg.com/originals/d9/e9/33/d9e9332c1569d673011c87ee0398cea5.jpg"
                     alt="Luxury Cars"
                     class="card-img-top fleet-image rounded">
                <div class="card-body text-center">
                    <h5 class="fw-bold">Luxury Cars</h5>
                    <p class="text-muted">Turn heads on the road with our premium luxury cars for business or leisure travel.</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Call-to-Action Section -->
    <div class="mt-5 text-center">
        <h2 class="text-secondary fw-bold">Ready to Start Your Journey?</h2>
        <p class="text-muted lead">Book your ride or car today and experience hassle-free travel.</p>
        <a href="{{ route('booking.index') }}" class="btn btn-warning btn-lg mt-3">Book Now</a>
    </div>
</div>

<!-- SweetAlert Script -->
@if(session('login_success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Welcome!',
            text: 'You have logged in successfully!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Okay'
        });
    </script>
@endif

@if(session('logout_success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Goodbye!',
            text: 'You have logged out successfully!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Okay'
        });
    </script>
@endif

@endsection
<style>
    .fleet-image {
        height: 300px; /* Set consistent height */
        width: 100%;   /* Ensure it spans the container width */
        object-fit:cover; /* Maintain aspect ratio and crop excess */
    }
</style>
