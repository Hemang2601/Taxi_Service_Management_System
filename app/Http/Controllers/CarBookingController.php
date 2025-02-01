<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarBookingController extends Controller
{
    public function showStep1()
    {
        return view('car-booking.step1');
    }

    public function handleStep1(Request $request)
    {
        $request->validate([
            'drive_type' => 'required'
        ]);

        session(['drive_type' => $request->drive_type]);

        return redirect()->route('car-booking.step2');
    }

    public function showStep2()
    {
        return view('car-booking.step2');
    }

    public function handleStep2(Request $request)
    {
        $request->validate([
            'pickup_location' => 'required',
            'dropoff_location' => 'required',
        ]);

        session([
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
        ]);

        return redirect()->route('car-booking.step3');
    }

    public function showStep3()
    {
        return view('car-booking.step3');
    }

    public function handleStep3(Request $request)
    {
        $request->validate([
            'date_time' => 'required|date',
        ]);

        session(['date_time' => $request->date_time]);

        // Process the booking (store in database, send confirmation, etc.)
        // Assuming a Booking model exists
        /*
        Booking::create([
            'drive_type' => session('drive_type'),
            'pickup_location' => session('pickup_location'),
            'dropoff_location' => session('dropoff_location'),
            'date_time' => session('date_time'),
        ]);
        */

        // Clear session after booking is complete
        session()->forget(['drive_type', 'pickup_location', 'dropoff_location', 'date_time']);

        return redirect()->route('car-booking.success')->with('success', 'Car booked successfully!');
    }

    public function success()
    {
        return view('car-booking.success');
    }
}
