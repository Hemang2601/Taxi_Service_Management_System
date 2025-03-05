<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarBookingController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaxiRouteController;

// Public Routes
Route::get('/', [PageController::class, 'home'])->name('home'); // Homepage
Route::get('/service', [PageController::class, 'service'])->name('service'); // Service Page
Route::get('/about-us', [PageController::class, 'about'])->name('about'); // About Us Page
Route::get('/contact', [PageController::class, 'contact'])->name('contact'); // Contact Page
Route::get('/faqs', [PageController::class, 'faqs'])->name('faqs'); // FAQs Page

// Authentication Routes (Public - Only for Guests)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Show Registration Form
    Route::post('/register', [AuthController::class, 'register']); // Handle Registration

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Show Login Form
    Route::post('/login', [AuthController::class, 'login']); // Handle Login
});

// Logout (For Authenticated Users)
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Routes for Authenticated Users
Route::middleware('auth')->group(function () {
    Route::get('/history', [HistoryController::class, 'index'])->name('history'); // Booking history
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile'); // User profile

    // Multi-Step Booking Process
    Route::get('/booking/step1', [BookingController::class, 'step1'])->name('booking.index'); // Select Drive Type
    Route::post('/booking/step2', [BookingController::class, 'step2'])->name('booking.step2'); // Select Car Type
    Route::post('/booking/step3', [BookingController::class, 'step3'])->name('booking.step3'); // Select Car
    Route::post('/booking/step4', [BookingController::class, 'step4'])->name('booking.step4'); // Booking Details
    Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm'); // Final Confirmation
});

// Redirect /admin to /admin/login
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

// Admin Authentication
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Admin Panel - Protected Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::post('/users/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
        Route::get('/bookings', [AdminPageController::class, 'bookings'])->name('admin.bookings');
        Route::get('/routes', [TaxiRouteController::class, 'index'])->name('admin.routes');
        Route::post('/routes/store', [TaxiRouteController::class, 'store'])->name('admin.routes.store');
        Route::post('/routes/update/{route}', [TaxiRouteController::class, 'update'])->name('admin.routes.update');
        Route::post('/routes/delete/{route}', [TaxiRouteController::class, 'destroy'])->name('admin.routes.destroy');

        // Car Management Routes
        Route::prefix('cars')->group(function () {
            Route::get('/', [CarController::class, 'index'])->name('admin.cars'); // Show all cars
            Route::get('/create', [CarController::class, 'create'])->name('admin.cars.create'); // Show Add Car Form
            Route::post('/store', [CarController::class, 'store'])->name('admin.cars.store'); // Store New Car
            Route::get('/edit/{id}', [CarController::class, 'edit'])->name('admin.cars.edit'); // Edit Car Form
            Route::put('/update/{id}', [CarController::class, 'update'])->name('admin.cars.update'); // Update Car
            Route::delete('/delete/{id}', [CarController::class, 'destroy'])->name('admin.cars.delete'); // Delete Car
        });
    });
});
