@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="text-primary fw-bold">Our Services</h1>
        <p class="text-muted lead">Experience seamless travel with our premium taxi services designed to meet all your needs.</p>
    </div>

    <!-- Services Section -->
    <div class="row g-4">
        @php
            $services = [
                ['icon' => 'fas fa-taxi', 'title' => 'Quick Booking', 'text' => 'Book your ride in just a few clicks through our user-friendly platform.', 'color' => 'primary'],
                ['icon' => 'fas fa-dollar-sign', 'title' => 'Affordable Rates', 'text' => 'Enjoy competitive pricing without compromising on quality or safety.', 'color' => 'success'],
                ['icon' => 'fas fa-id-card', 'title' => 'Professional Drivers', 'text' => 'Our courteous and experienced drivers ensure a safe and comfortable journey.', 'color' => 'warning'],
                ['icon' => 'fas fa-headphones-alt', 'title' => '24/7 Support', 'text' => 'Our dedicated support team is available round-the-clock to assist you.', 'color' => 'info'],
                ['icon' => 'fas fa-map-marker-alt', 'title' => 'Pickup & Drop Service', 'text' => 'Enjoy hassle-free pickup and drop services at your convenience and location.', 'color' => 'danger'],
                ['icon' => 'fas fa-car', 'title' => 'Luxury Rides', 'text' => 'Travel in style with our premium and luxurious vehicles, ensuring utmost comfort and class.', 'color' => 'purple']
            ];
        @endphp
        @foreach ($services as $service)
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100 hover-effect animate__animated animate__fadeInUp">
                    <div class="card-body text-center">
                        <i class="{{ $service['icon'] }} fa-3x text-{{ $service['color'] }} mb-3"></i>
                        <h4 class="fw-bold text-dark">{{ $service['title'] }}</h4>
                        <p class="text-muted">{{ $service['text'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Why Choose Us Section -->
<div class="my-5 py-5 bg-light rounded shadow-sm position-relative">
    <div class="text-center mb-5">
        <h2 class="text-primary fw-bold">Why Choose Us?</h2>
        <p class="text-muted lead">Discover what makes us stand out from the rest.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 h-100 text-center position-relative card-gradient hover-effect">
                <div class="card-body">
                    <div class="icon-container mx-auto mb-3">
                        <i class="fas fa-shield-alt fa-3x text-white"></i>
                    </div>
                    <h5 class="fw-bold text-white">Safety First</h5>
                    <p class="text-white-50">We prioritize your safety with well-maintained vehicles and trained drivers.</p>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 h-100 text-center position-relative card-gradient hover-effect">
                <div class="card-body">
                    <div class="icon-container mx-auto mb-3">
                        <i class="fas fa-clock fa-3x text-white"></i>
                    </div>
                    <h5 class="fw-bold text-white">On-Time Service</h5>
                    <p class="text-white-50">Punctuality is our promise—reach your destination on time, every time.</p>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 h-100 text-center position-relative card-gradient hover-effect">
                <div class="card-body">
                    <div class="icon-container mx-auto mb-3">
                        <i class="fas fa-thumbs-up fa-3x text-white"></i>
                    </div>
                    <h5 class="fw-bold text-white">Customer Satisfaction</h5>
                    <p class="text-white-50">We strive for excellence to provide you with an exceptional travel experience.</p>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </div>
</div>

    <!-- FAQ Section -->
    <div class="my-5">
        <div class="text-center mb-4">
            <h2 class="text-primary fw-bold">Frequently Asked Questions</h2>
            <p class="text-muted lead">Have questions? We’ve got answers!</p>
        </div>
        <div class="accordion" id="faqAccordion">
            @php
                $faqs = [
                    ['question' => 'How do I book a ride?', 'answer' => 'Booking a ride is simple. Use our platform to select your pickup location, destination, and preferred time, and confirm your booking!'],
                    ['question' => 'Are your services available 24/7?', 'answer' => 'Yes, we operate round-the-clock to ensure you have access to reliable transportation at any time of the day or night.'],
                    ['question' => 'What safety measures do you have in place?', 'answer' => 'All our drivers are background-checked, and our vehicles are regularly inspected to ensure your safety and comfort.']
                ];
            @endphp
            @foreach ($faqs as $index => $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq{{ $index + 1 }}">
                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#answer{{ $index + 1 }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="answer{{ $index + 1 }}">
                            {{ $faq['question'] }}
                        </button>
                    </h2>
                    <div id="answer{{ $index + 1 }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="faq{{ $index + 1 }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ $faq['answer'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

<style>
  /* Hover Effect */
.hover-effect {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-effect:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

/* Updated Why Choose Us Section Styles */
.card-gradient {
    background: linear-gradient(135deg, #1d3557, #457b9d);
    color: #fff;
    overflow: hidden;
    border-radius: 15px;
    transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
    position: relative;
    z-index: 1;
    border: 2px solid transparent; /* Border for focus */
    background-clip: padding-box;
    animation: fadeInUp 0.5s ease-out;
}

.card-gradient:hover {
    transform: translateY(-15px) rotate(2deg); /* Adds slight rotation */
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    border-color: #ffc107; /* Gold border color on hover */
}

.icon-container {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
}

.card-gradient:hover .icon-container {
    background: rgba(255, 255, 255, 0.4); /* Lighter background on hover */
}

.card-gradient:hover .icon-container i {
    transform: scale(1.1); /* Slight increase in icon size */
    color: #ffdf00; /* Golden icon color on hover */
}

.card-body h5 {
    font-size: 1.25rem;
    transition: all 0.3s ease;
}

.card-gradient:hover h5 {
    color: #ffc107; /* Change title color to gold on hover */
    transform: scale(1.05); /* Slight scale increase for title */
}

/* Overlay Effect */
.overlay {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.2);
    z-index: 0;
    border-radius: 15px;
    transition: all 0.3s ease;
}

.card-gradient:hover .overlay {
    background: rgba(0, 0, 0, 0.1); /* Fade overlay when hovered */
}

/* Keyframes for FadeInUp Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Adjustments for mobile responsiveness */
@media (max-width: 767px) {
    .icon-container {
        width: 60px;
        height: 60px;
    }
}

</style>
