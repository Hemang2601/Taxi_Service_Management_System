@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Section Title -->
        <h1 class="text-center mb-4 display-4 fw-bold text-primary">Contact Us</h1>
        <p class="text-center text-muted">We're here to help! Reach out to us via email, phone, or send us a message.</p>

        <div class="row align-items-center">
            <!-- Contact Information (Left) -->
            <div class="col-lg-5">
                <div class="contact-info p-4 shadow-lg rounded">
                    <!-- Email Information -->
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-envelope fa-3x text-warning me-3"></i>
                        <div>
                            <h5 class="fw-bold">Email</h5>
                            <p>We respond to queries within 24 hours.</p>
                            <a href="mailto:support@taxi.com" class="text-decoration-none text-warning fw-bold">support@taxi.com</a>
                        </div>
                    </div>

                    <!-- Phone Information -->
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-phone fa-3x text-success me-3"></i>
                        <div>
                            <h5 class="fw-bold">Phone</h5>
                            <p>Our team is available 24/7.</p>
                            <a href="tel:+11234567890" class="text-decoration-none text-warning fw-bold">(123) 456-7890</a>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt fa-3x text-primary me-3"></i>
                        <div>
                            <h5 class="fw-bold">Office Address</h5>
                            <p>123 Main Street, City, Country</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form (Right) -->
            <div class="col-lg-7 mt-4 mt-lg-0">
                <div class="card shadow-lg border-light rounded p-4">
                    <h3 class="fw-bold text-center text-primary">Send Us a Message</h3>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Your Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Your Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label fw-bold">Your Message</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Write your message here"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 shadow">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .contact-info {
            background: #f8f9fa;
            border-radius: 10px;
        }

        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
                text-align: center;
            }

            .d-flex {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .d-flex i {
                margin-bottom: 10px;
            }
        }
    </style>
@endsection
