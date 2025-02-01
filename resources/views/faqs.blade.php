@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Page Title -->
        <h1 class="text-center mb-4 display-4 fw-bold text-primary">Frequently Asked Questions</h1>
        <p class="text-center text-muted">Find answers to common questions about our taxi service.</p>

        <!-- FAQ Section -->
        <div class="accordion mt-4" id="faqAccordion">
            <!-- Question 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fas fa-taxi me-2 text-warning"></i> How do I book a taxi?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Simply go to the <strong>“Book a Car”</strong> section on our website, select your pickup location, choose your ride, and confirm your booking. You will receive a confirmation and ETA within minutes.
                    </div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-times-circle me-2 text-danger"></i> Can I cancel my ride?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, you can cancel your ride <strong>up to 10 minutes before</strong> the scheduled pickup time without any charge. After that, a cancellation fee may apply.
                    </div>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fas fa-shield-alt me-2 text-success"></i> Are your drivers insured?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, all our drivers are <strong>fully insured</strong> and undergo rigorous background checks to ensure your safety.
                    </div>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <i class="fas fa-headset me-2 text-primary"></i> How do I contact customer support?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You can reach us via email at <a href="mailto:support@taxi.com" class="text-decoration-none text-warning fw-bold">support@taxi.com</a> or call us at <strong>(123) 456-7890</strong>. Our team is available <strong>24/7</strong> to assist you.
                    </div>
                </div>
            </div>

            <!-- Question 5: Payment Options -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <i class="fas fa-credit-card me-2 text-info"></i> What payment methods do you accept?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We accept <strong>credit/debit cards, digital wallets (Google Pay, Apple Pay), and cash</strong>. You can also pay securely through our app.
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="text-center mt-5">
            <h3 class="fw-bold text-dark">Still have questions?</h3>
            <p class="text-muted">Our support team is available 24/7 to assist you.</p>
            <a href="{{ route('contact') }}" class="btn btn-warning btn-lg shadow-lg">
                <i class="fas fa-envelope me-2"></i> Contact Us
            </a>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .accordion-button {
            font-size: 1.2rem;
        }

        .accordion-button:not(.collapsed) {
            background-color: #ffc107;
            color: #000;
        }

        .accordion-body {
            font-size: 1rem;
            color: #555;
        }

        .btn-lg {
            transition: all 0.3s ease-in-out;
        }

        .btn-lg:hover {
            background-color: #ffb300;
        }
    </style>
@endsection
