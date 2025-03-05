@extends('layouts.app')


@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary fw-bold">Car Booking</h2>

    <!-- Progress Bar -->
    <div class="progress mb-4">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
             role="progressbar" style="width: 0%;" id="progressBar"></div>
    </div>

    <div class="row">
        <!-- Sidebar Steps -->
        <div class="col-md-3">
            <ul class="list-group shadow-sm">
                <li class="list-group-item active" id="step1-nav"><i class="fas fa-car"></i> 1. Select Drive Type</li>
                <li class="list-group-item" id="step2-nav"><i class="fas fa-list"></i> 2. Select Car Type</li>
                <li class="list-group-item" id="step3-nav"><i class="fas fa-car-side"></i> 3. Select Car</li>
                <li class="list-group-item" id="step4-nav"><i class="fas fa-calendar-check"></i> 4. Booking Details</li>
            </ul>
        </div>

        <!-- Booking Form -->
        <div class="col-md-9">
            <div class="card shadow-lg p-4 m-">
                <form action="{{ route('booking.submit') }}" method="POST">
                    @csrf

                    <!-- Step 1: Select Drive Type -->
                    <div id="step1" class="container mt-4">
                        <h4 class="text-primary fw-bold mb-3">Select Drive Type</h4>

                        <div class="row">
                            <!-- Self Drive Option -->
                            <div class="col-md-6">
                                <label class="drive-option card shadow-sm p-3 border rounded text-center">
                                    <input type="radio" class="d-none" name="drive_type" value="Self Drive" required>
                                    <div class="option-content">
                                        <i class="fas fa-car-side text-primary fa-3x mb-2"></i>
                                        <h5 class="fw-bold">Self Drive</h5>
                                        <p class="text-muted small">Drive the car yourself with full freedom.</p>
                                    </div>
                                </label>
                            </div>

                            <!-- With Driver Option -->
                            <div class="col-md-6">
                                <label class="drive-option card shadow-sm p-3 border rounded text-center">
                                    <input type="radio" class="d-none" name="drive_type" value="With Driver" required>
                                    <div class="option-content">
                                        <i class="fas fa-user-tie text-primary fa-3x mb-2"></i>
                                        <h5 class="fw-bold">With Driver</h5>
                                        <p class="text-muted small">Relax while a professional driver takes you to your destination.</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-primary mt-4 next-step w-100">
                            Next <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>


                    <!-- Step 2: Select Car Type -->
                    <div id="step2" class="d-none container mt-4">
                        <h4 class="text-primary fw-bold mb-3">Select Car Type</h4>

                        <div class="row">
                            <!-- Sedan Option -->
                            <div class="col-md-4">
                                <label class="car-option card shadow-sm p-3 border rounded text-center">
                                    <input type="radio" class="d-none" name="car_type" value="Sedan" required>
                                    <div class="option-content">
                                        <img src="https://www.pngplay.com/wp-content/uploads/13/Sedan-PNG-Photos.png" alt="Sedan" class="car-img">
                                        <h5 class="fw-bold mt-2">Sedan</h5>
                                        <p class="text-muted small">Comfortable & fuel-efficient.</p>
                                    </div>
                                </label>
                            </div>

                            <!-- SUV Option -->
                            <div class="col-md-4">
                                <label class="car-option card shadow-sm p-3 border rounded text-center">
                                    <input type="radio" class="d-none" name="car_type" value="SUV" required>
                                    <div class="option-content">
                                        <img src="https://akm-img-a-in.tosshub.com/indiatoday/images/story/202211/1-platinum-white-pearl_0-sixteen_nine.png?VersionId=kc_gH7C5KdFxfnyAgMmHVZ5lvpH2xBPd" alt="SUV" class="car-img">
                                        <h5 class="fw-bold mt-2">SUV</h5>
                                        <p class="text-muted small">Spacious & powerful for all terrains.</p>
                                    </div>
                                </label>
                            </div>

                            <!-- Luxury Option -->
                            <div class="col-md-4">
                                <label class="car-option card shadow-sm p-3 border rounded text-center">
                                    <input type="radio" class="d-none" name="car_type" value="Luxury" required>
                                    <div class="option-content">
                                        <img src="https://www.pngplay.com/wp-content/uploads/9/Luxury-Car-PNG-Free-File-Download.png" alt="Luxury" class="car-img">
                                        <h5 class="fw-bold mt-2">Luxury</h5>
                                        <p class="text-muted small">Premium comfort & features.</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-secondary prev-step"><i class="fas fa-arrow-left"></i> Previous</button>
                            <button class="btn btn-primary next-step">Next <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>


                    <?php
                    $cars = [
    [
        'name' => 'Car A',
        'image' => 'https://www.pngplay.com/wp-content/uploads/13/Sedan-PNG-Photos.png',
        'description' => 'Description for Car A.'
    ],
    [
        'name' => 'Car B',
        'image' => 'https://pngimg.com/d/bmw_PNG99542.png',
        'description' => 'Description for Car B.'
    ],
    [
        'name' => 'Car C',
        'image' => 'https://www.pngall.com/wp-content/uploads/2018/04/Sedan-PNG-Clipart.png',
        'description' => 'Description for Car C.'
    ],
    [
        'name' => 'Car D',
        'image' => 'https://lakshmihyundai.s3.ap-south-1.amazonaws.com/models/display_images/1679903528.png',
        'description' => 'Description for Car D.'
    ],
    [
        'name' => 'Car E',
        'image' => 'https://lakshmihyundai.s3.ap-south-1.amazonaws.com/models/display_images/1662110515.png',
        'description' => 'Description for Car E.'
    ],
    [
        'name' => 'Car F',
        'image' => 'https://lakshmihyundai.s3.ap-south-1.amazonaws.com/models/display_images/1656409788.png',
        'description' => 'Description for Car F.'
    ],
    [
        'name' => 'Car G',
        'image' => 'https://lakshmihyundai.s3.ap-south-1.amazonaws.com/models/display_images/1659615610.png',
        'description' => 'Description for Car G.'
    ],
    [
        'name' => 'Car H',
        'image' => 'https://lakshmihyundai.s3.ap-south-1.amazonaws.com/models/display_images/1689152983.png',
        'description' => 'Description for Car H.'
    ],
    [
        'name' => 'Car I',
        'image' => 'https://lakshmihyundai.s3.ap-south-1.amazonaws.com/models/display_images/1675149576.png',
        'description' => 'Description for Car I.'
    ],
    [
        'name' => 'Car J',
        'image' => 'https://lakshmihyundai.s3.ap-south-1.amazonaws.com/models/display_images/1662112191.png',
        'description' => 'Description for Car J.'
    ]
];
                    ?>
                    <!-- Step 3: Select Car -->
                    <div id="step3" class="d-none container mt-4">
                        <h4 class="text-primary fw-bold mb-3">Select Your Car</h4>
                        <div class="row">
                            <?php foreach ($cars as $car): ?>
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <label class="car-option card shadow-sm p-3 border rounded text-center">
                                        <input type="radio" class="d-none" name="car" value="<?php echo htmlspecialchars($car['name']); ?>" required>
                                        <div class="option-content">
                                            <img src="<?php echo htmlspecialchars($car['image']); ?>" alt="<?php echo htmlspecialchars($car['name']); ?>" class="car-img">
                                            <h6 class="fw-bold mt-2"><?php echo htmlspecialchars($car['name']); ?></h6>
                                            <p class="text-muted small"><?php echo htmlspecialchars($car['description']); ?></p>
                                        </div>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Navigation Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-secondary prev-step"><i class="fas fa-arrow-left"></i> Previous</button>
                            <button class="btn btn-primary next-step">Next <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>

                  <!-- Step 4: Booking Details -->
<div id="step4" class="d-none container mt-4">
    <div class="card shadow-lg p-4 border-0 rounded">
        <h4 class="text-primary fw-bold text-center">Enter Booking Details</h4>

        <!-- Pickup Location -->
        <div class="input-group mt-3">
            <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt text-primary"></i></span>
            <input type="text" class="form-control" name="pickup_location" placeholder="Enter Pickup Location" required>
        </div>

        <!-- Drop Location -->
        <div class="input-group mt-3">
            <span class="input-group-text bg-light"><i class="fas fa-map-marker text-danger"></i></span>
            <input type="text" class="form-control" name="drop_location" placeholder="Enter Drop Location" required>
        </div>

        <!-- Pickup Date & Time -->
        <div class="input-group mt-3">
            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-success"></i></span>
            <input type="datetime-local" class="form-control" name="pickup_date" required>
        </div>

        <!-- Phone Number -->
        <div class="input-group mt-3">
            <span class="input-group-text bg-light"><i class="fas fa-phone text-warning"></i></span>
            <input type="tel" class="form-control" name="phone_number" placeholder="Enter Phone Number" required>
        </div>

        <!-- Navigation Buttons -->
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-secondary prev-step px-4"><i class="fas fa-arrow-left"></i> Previous</button>
            <button class="btn btn-success px-4">Confirm Booking <i class="fas fa-check"></i></button>
        </div>
    </div>
</div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!-- JavaScript for Step Navigation -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let stepIndex = 1;
        const totalSteps = 4;

        function showStep(step) {
            for (let i = 1; i <= totalSteps; i++) {
                document.getElementById('step' + i).classList.add('d-none');
                document.getElementById('step' + i + '-nav').classList.remove('active');
            }
            document.getElementById('step' + step).classList.remove('d-none');
            document.getElementById('step' + step + '-nav').classList.add('active');
            document.getElementById('progressBar').style.width = (step / totalSteps) * 100 + "%";
        }

        document.querySelectorAll('.next-step').forEach(button => {
            button.addEventListener('click', () => {
                if (stepIndex < totalSteps) {
                    stepIndex++;
                    showStep(stepIndex);
                }
            });
        });

        document.querySelectorAll('.prev-step').forEach(button => {
            button.addEventListener('click', () => {
                if (stepIndex > 1) {
                    stepIndex--;
                    showStep(stepIndex);
                }
            });
        });
    });
</script>

@endsection
<!-- Custom CSS -->
<style>
    .drive-option {
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .drive-option:hover, .drive-option input:checked + .option-content {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .drive-option:hover i, .drive-option input:checked + .option-content i {
        color: white;
    }

    .drive-option input:checked + .option-content {
        border-radius: 10px;
    }
    .car-option {
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        height: 250px; /* Ensures uniform height */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .car-option .option-content {
        text-align: center;
        width: 100%;
    }

    .car-img {
        width: 100px;  /* Fixed width for all images */
        height: 60px;  /* Fixed height for uniformity */
        object-fit: contain; /* Ensures images scale correctly */
    }

    .car-option:hover, .car-option input:checked + .option-content {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .car-option:hover img, .car-option input:checked + .option-content img {
        filter: brightness(0) invert(1);
    }

    .car-option input:checked + .option-content {
        border-radius: 10px;
    }
    .car-option {
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.car-option:hover, .car-option input:checked + .option-content {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

.car-option:hover img, .car-option input:checked + .option-content img {
    filter: brightness(0) invert(1);
}

.car-img {
    width: 100px;
    height: 60px;
    object-fit: cover;
}

.option-content {
    border-radius: 10px;
}
.input-group-text {
        border-right: 0;
    }
    .form-control {
        border-left: 0;
    }
    .btn {
        font-weight: bold;
        border-radius: 8px;
    }

</style>
