<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarBookingController;

// Public Routes
Route::get('/', [PageController::class, 'home'])->name('home'); // Homepage
Route::get('/service', [PageController::class, 'service'])->name('service'); // Service Page
Route::get('/about-us', [PageController::class, 'about'])->name('about'); // About Us Page
Route::get('/contact', [PageController::class, 'contact'])->name('contact'); // Contact Page
Route::get('/faqs', [PageController::class, 'faqs'])->name('faqs'); // FAQs Page


// Authentication Routes
// Registration
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Show Registration Form
    Route::post('/register', [AuthController::class, 'register']); // Handle Registration

    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Show Login Form
    Route::post('/login', [AuthController::class, 'login']); // Handle Login
});

// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Routes for Authenticated Users
Route::middleware('auth')->group(function () {
    // Booking and History Routes
    Route::get('/history', [HistoryController::class, 'index'])->name('history'); // User's booking history
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile'); // User profile


    Route::get('/car-booking/step1', [CarBookingController::class, 'showStep1'])->name('car-booking.step1');
    Route::post('/car-booking/step1', [CarBookingController::class, 'handleStep1']);
    Route::get('/car-booking/step2', [CarBookingController::class, 'showStep2'])->name('car-booking.step2');
    Route::post('/car-booking/step2', [CarBookingController::class, 'handleStep2']);
    Route::get('/car-booking/step3', [CarBookingController::class, 'showStep3'])->name('car-booking.step3');
    Route::post('/car-booking/step3', [CarBookingController::class, 'handleStep3']);
    Route::get('/car-booking/success', [CarBookingController::class, 'success'])->name('car-booking.success');
});
