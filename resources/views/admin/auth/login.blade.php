<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Bootstrap & FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-5 animate__animated animate__fadeInDown" style="max-width: 400px; width: 100%; border-radius: 15px;">

            <!-- Logo & Title -->
            <div class="text-center mb-4">
                <img src="https://static.vecteezy.com/system/resources/previews/013/974/344/non_2x/taxi-service-logo-illustration-vector.jpg"
                     alt="Taxi Logo" class="mb-3" style="width: 80px;">
                <h2 class="text-warning fw-bold">Admin Login</h2>
                <p class="text-muted">Sign in to manage your system</p>
            </div>

            <!-- Login Form -->
            <form id="loginForm" action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control ps-3" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control ps-3" placeholder="Enter your password" required>
                    </div>
                </div>

                <!-- Submit Button with Animation -->
                <button type="submit" class="btn btn-warning w-100 py-2 position-relative">
                    <span id="btnText">Login</span>
                    <div id="btnLoader" class="spinner-border spinner-border-sm text-light d-none" role="status"></div>
                </button>
            </form>



        </div>
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Button Loader Script -->
    <script>
        document.getElementById('loginForm').addEventListener('submit', function () {
            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');

            btnText.classList.add('d-none');
            btnLoader.classList.remove('d-none');
        });
    </script>

    <!-- Custom Styles -->
    <style>
        /* General Styles */
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        }

        /* Card Styling */
        .card {
            border: none;
            background-color: #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        /* Input Styles */
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

        /* Button Styling */
        .btn-warning {
            background-color: #ffb300;
            border-radius: 10px;
            padding: 15px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-warning:hover {
            background-color: #ff9e00;
            transform: scale(1.05);
        }

        /* Animation */
        .animate__fadeInDown {
            animation-duration: 0.8s;
        }

        /* Spinner Loader */
        .spinner-border {
            width: 20px;
            height: 20px;
        }

        /* Text Link Styling */
        .text-warning {
            color: #ffc107 !important;
        }
    </style>

</body>
</html>
