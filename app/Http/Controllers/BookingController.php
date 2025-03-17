<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\TaxiRoute;
use App\Models\Booking;

class BookingController extends Controller {
    public function showForm() {
        $carTypes = Car::where('status', 'free')->distinct()->pluck('type'); // Fetch unique car types with free status
        $routes = TaxiRoute::all(); // Fetch all routes
        return view('booking.index', compact('carTypes', 'routes'));
    }

    public function processBooking(Request $request) {
        $request->validate([
            'drive_type' => 'required',
            'car_type' => 'required',
            'car_id' => 'required|exists:cars,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^[0-9]{10}$/', // Ensures a valid 10-digit phone number
            'pickup_date' => 'required|date',
            'dropoff_date' => 'required|date|after_or_equal:pickup_date',
            'route_id' => 'required_if:drive_type,Driver-Driven|exists:taxi_routes,id',
        ], [
            'route_id.required_if' => 'The route field is required when selecting Driver-Driven.',
            'phone.regex' => 'Please enter a valid 10-digit phone number.',
            'car_id.exists' => 'The selected car is unavailable. Please choose another car.',
        ]);

        // Check if the selected car is already booked for the given date range
        $isBooked = Booking::where('car_id', $request->car_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('pickup_date', [$request->pickup_date, $request->dropoff_date])
                      ->orWhereBetween('dropoff_date', [$request->pickup_date, $request->dropoff_date])
                      ->orWhere(function ($q) use ($request) {
                          $q->where('pickup_date', '<=', $request->pickup_date)
                            ->where('dropoff_date', '>=', $request->dropoff_date);
                      });
            })
            ->exists();

        if ($isBooked) {
            return redirect()->back()->withErrors(['car_id' => 'This car is already booked for the selected dates. Please choose another car.']);
        }

        // Proceed with booking (Save the booking details in the database with default status "pending")
        Booking::create([
            'car_id' => $request->car_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pickup_date' => $request->pickup_date,
            'dropoff_date' => $request->dropoff_date,
            'route_id' => $request->route_id ?? null,
            'status' => 'pending', // Set default status to "pending"
        ]);

        return redirect()->back()->with('success', "Booking confirmed successfully and is now pending!");
    }
}
