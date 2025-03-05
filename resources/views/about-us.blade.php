@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section" style="position: relative; background: url('https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=1920,fit=crop/m6LJDMeBRLuKXoE8/chauffers-cars-YZ9b7MM0ePC79BXM.jpg') no-repeat center center/cover; height: 70vh; display: flex; align-items: center; justify-content: center; text-align: center; color: white;">
        <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.0);"></div>
        <div class="hero-content position-relative">
            <h1 class="display-3 fw-bold animate__animated animate__fadeInDown">About Us</h1>
            <p class="lead animate__animated animate__fadeInUp">Learn more about our mission, values, and commitment to providing excellent taxi services.</p>
        </div>
    </div>

    <!-- About Us Content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <!-- Mission Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded text-center p-4 d-flex flex-column h-100 animate__animated animate__fadeInUp">
                    <div class="icon-box mb-3">
                        <i class="fas fa-bullseye fa-4x text-primary"></i>
                    </div>
                    <div class="card-body flex-grow-1">
                        <h5 class="fw-bold">Our Mission</h5>
                        <p>We aim to provide safe, reliable, and affordable taxi services while ensuring customer satisfaction and convenience.</p>
                    </div>
                </div>
            </div>

            <!-- Easy Booking Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded text-center p-4 d-flex flex-column h-100 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="icon-box mb-3">
                        <i class="fas fa-mobile-alt fa-4x text-warning"></i>
                    </div>
                    <div class="card-body flex-grow-1">
                        <h5 class="fw-bold">Easy Booking</h5>
                        <p>Our user-friendly platform lets you book a taxi in just a few clicks, ensuring a seamless experience.</p>
                    </div>
                </div>
            </div>

            <!-- Superior Customer Service Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded text-center p-4 d-flex flex-column h-100 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="icon-box mb-3">
                        <i class="fas fa-headset fa-4x text-success"></i>
                    </div>
                    <div class="card-body flex-grow-1">
                        <h5 class="fw-bold">Superior Customer Service</h5>
                        <p>We prioritize customer satisfaction by offering 24/7 support and dedicated service to our riders.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Business Statistics Section (Replaced Team Photo) -->
        <div class="row text-center my-5">
            <div class="col-md-3">
                <div class="stat-box p-4 shadow-lg rounded animate__animated animate__fadeInUp">
                    <i class="fas fa-car fa-3x text-warning mb-2"></i>
                    <h2 class="fw-bold">10,000+</h2>
                    <p>Successful Rides</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box p-4 shadow-lg rounded animate__animated animate__fadeInUp animate__delay-1s">
                    <i class="fas fa-smile fa-3x text-primary mb-2"></i>
                    <h2 class="fw-bold">5,000+</h2>
                    <p>Happy Customers</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box p-4 shadow-lg rounded animate__animated animate__fadeInUp animate__delay-2s">
                    <i class="fas fa-taxi fa-3x text-success mb-2"></i>
                    <h2 class="fw-bold">100+</h2>
                    <p>Available Taxis</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box p-4 shadow-lg rounded animate__animated animate__fadeInUp animate__delay-3s">
                    <i class="fas fa-map-marker-alt fa-3x text-danger mb-2"></i>
                    <h2 class="fw-bold">20+</h2>
                    <p>Service Areas</p>
                </div>
            </div>
        </div>

        <!-- Our Values Section -->
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <h2 class="fw-bold text-primary">Our Values</h2>
                <ul class="list-group list-group-horizontal justify-content-center">
                    <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> Safety First</li>
                    <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> Customer Satisfaction</li>
                    <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> Affordable Pricing</li>
                    <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> 24/7 Availability</li>
                </ul>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-5">
            <p class="lead">Ready to book your ride? Experience fast, safe, and reliable taxi services now.</p>
            <a href="#" class="btn btn-warning btn-lg shadow-lg">
                <i class="fas fa-taxi me-2"></i> Book a Ride
            </a>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .icon-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
        }

        /* Equal Height Cards */
        .row > div {
            display: flex;
        }

        /* Statistics Box */
        .stat-box {
            background: #f8f9fa;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .stat-box:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 50vh;
            }
            .hero-content h1 {
                font-size: 2.5rem;
            }
        }
    </style>
@endsection
