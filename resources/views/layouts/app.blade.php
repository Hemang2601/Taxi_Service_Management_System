<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxi Service Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Light background for contrast */
        }
        .navbar {
            background-color: #343a40; /* Dark navbar */
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #ffc107 !important; /* Gold for branding */
        }
        .nav-link {
            color: #ffffff !important;
        }
        .nav-link:hover {
            color: #ffc107 !important; /* Gold hover effect */
        }
        .nav-link.active {
            font-weight: bold;
            color: #ffc107 !important;
        }
        .dropdown-menu {
            background-color: #343a40; /* Match navbar color */
        }
        .dropdown-item {
            color: #ffffff;
        }
        .dropdown-item:hover {
            background-color: #ffc107;
            color: #000;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        .content {
            padding: 40px 20px;
            min-height: calc(100vh - 160px); /* Adjust for header and footer */
        }
        .hero-section {
            position: relative;
            width: 100%;
            height: 100vh; /* Full viewport height */
            background: url('{{ asset('images/backgroud.png') }}') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            color: white;
            overflow: hidden;

        }

            /* Gradient Overlay */
            .hero-section::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3));
            }

            /* Hero Content Styling */
            .hero-content {
                position: relative;
                z-index: 1;
                max-width: 800px;
                text-align: center;
                animation: fadeIn 1.5s ease-in-out;
            }

            /* Heading Animation */
            .hero-section h1 {
                font-size: 4rem;
                font-weight: bold;
                text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
                opacity: 0;
                animation: fadeInUp 1s ease-in-out forwards;
            }

            /* Subheading */
            .hero-section p {
                font-size: 1.5rem;
                margin-top: 10px;
                opacity: 0;
                animation: fadeInUp 1.5s ease-in-out forwards;
            }

            /* Call-to-Action Button */
            .hero-btn {
                display: inline-block;
                margin-top: 25px;
                padding: 14px 40px;
                font-size: 1.3rem;
                font-weight: bold;
                text-transform: uppercase;
                background: #ffc107;
                color: #000;
                border-radius: 50px;
                transition: all 0.3s ease-in-out;
                box-shadow: 0 8px 16px rgba(255, 193, 7, 0.4);
                opacity: 0;
                animation: fadeInUp 1.8s ease-in-out forwards;
                text-decoration: none; /* Removes underline */
            }


            /* Hover Effect */
            .hero-btn:hover {
                background: #ffdb4d;
                transform: scale(1.08);
                box-shadow: 0 10px 20px rgba(255, 193, 7, 0.5);
            }

            /* Keyframe Animations */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Responsive Adjustments */
            @media (max-width: 768px) {
                .hero-section h1 {
                    font-size: 3rem;
                }
                .hero-section p {
                    font-size: 1.2rem;
                }
                .hero-btn {
                    font-size: 1.1rem;
                    padding: 12px 30px;
                }
            }
        .d-none {
            display: none !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-taxi me-2"></i> Taxi Service
            </a>
            <!-- Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-2"></i> Home
                        </a>
                    </li>

                    <!-- Service -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">
                            <i class="fas fa-car me-2"></i> Service
                        </a>
                    </li>

                    @if(Auth::check())
                    <!-- Links for Logged-In Users -->
                    <li class="nav-item">
                        <!-- Book Car Link -->
                        <a class="nav-link {{ request()->routeIs('car-booking.step1') ? 'active' : '' }}" href="{{ route('car-booking.step1') }}">
                            <i class="fas fa-car-side me-2"></i> Book a Car
                        </a>
                    </li>



                    <li class="nav-item">
                        <!-- History Link -->
                        <a class="nav-link {{ request()->routeIs('history') ? 'active' : '' }}" href="{{ route('history') }}">
                            <i class="fas fa-history me-2"></i> Booking History
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- Profile Link -->
                        <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                            <i class="fas fa-user-circle me-2"></i> My Profile
                        </a>
                    </li>
                @endif


                        <!-- More Dropdown -->
                <li class="nav-item dropdown {{ in_array(request()->route()->getName(), ['about', 'contact', 'faqs']) ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('about') || request()->routeIs('contact') || request()->routeIs('faqs') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h me-2"></i> More
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                                <i class="fas fa-info-circle me-2"></i> About Us
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                <i class="fas fa-envelope me-2"></i> Contact
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('faqs') ? 'active' : '' }}" href="{{ route('faqs') }}">
                                <i class="fas fa-question-circle me-2"></i> FAQs
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

                <!-- Login/Signup or Username/Logout -->
                <div class="d-flex ms-lg-3">
                    @if(Auth::check())
                        <!-- Display Username and Logout if Logged In -->
                        <span class="navbar-text text-white me-3">
                            Welcome, {{ session('user_name') }}
                        </span>

                        <!-- Logout Form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-outline-light" id="logout-btn">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    @else
                        <!-- Show Login and Sign Up buttons if Not Logged In -->
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-warning">
                            <i class="fas fa-user-plus me-2"></i> Sign Up
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="hero-section @if(in_array(request()->route()->getName(), ['login','service', 'register','bookCar', 'history','profile','about','contact','faqs','car-booking.index','car-booking.step1','car-booking.step2','car-booking.step3','car-booking.success'])) d-none @endif">
        <div class="hero-content">
            <h1>Your Ride, Your Way</h1>
            <p>Reliable, Affordable & Safe Taxi Services at Your Fingertips</p>
            <a href="{{ route('car-booking.step1') }}" class="hero-btn">Book a Ride</a>
        </div>
    </div>



    <div class="content">
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2025 Taxi Service Management System. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('logout-btn').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to log out?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, log out',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    document.getElementById('logout-form').submit();
                }
            });
        });
    </script>
</body>
</html>
