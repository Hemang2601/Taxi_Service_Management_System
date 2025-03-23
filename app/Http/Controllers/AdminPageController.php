<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking;
use App\Models\User;

class AdminPageController extends Controller
{


    public function dashboard()
    {
        $totalCars = Car::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $acceptedBookings = Booking::where('status', 'accepted')->count();
        $rejectedBookings = Booking::where('status', 'rejected')->count();
        $totalDrivers = 100;
        $totalCustomers = User::all()->count();
        $completedRides = Booking::where('status', 'completed')->count();
        $cancelledBookings = Booking::where('status', 'rejected')->count();
        $totalEarnings = Booking::where('status', 'completed')->sum('price');

        return view('admin.dashboard', compact(
            'totalCars',
            'pendingBookings',
            'acceptedBookings',
            'rejectedBookings',
            'totalDrivers',
            'totalCustomers',
            'completedRides',
            'cancelledBookings',
            'totalEarnings'
        ));
    }

    public function cars()
    {
        return view('admin.cars');
    }

    public function bookings()
    {
        return view('admin.bookings');
    }

    public function users()
    {
        return view('admin.users');
    }
}
