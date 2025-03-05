<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function step1()
    {
        return view('booking.step1');
    }

    public function step2(Request $request)
    {
        session(['drive_type' => $request->drive_type]);
        return view('booking.step2');
    }

    public function step3(Request $request)
    {
        session(['car_type' => $request->car_type]);
        return view('booking.step3');
    }

    public function step4(Request $request)
    {
        session(['car' => $request->car]);
        return view('booking.step4');
    }

    public function confirm(Request $request)
    {
        $bookingData = [
            'drive_type' => session('drive_type'),
            'car_type' => session('car_type'),
            'car' => session('car'),
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'total_price' => $request->total_price,
            'status' => 'pending'
        ];

        $booking = Booking::create($bookingData);
        return view('booking.confirmation', compact('booking'));
    }
}
