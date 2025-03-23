<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\TaxiRoute;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

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
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'pickup_date' => 'required|date',
            'dropoff_date' => 'required|date|after_or_equal:pickup_date',
            'route_id' => ['nullable', 'exists:taxi_routes,id', function ($attribute, $value, $fail) use ($request) {
                if ($request->drive_type === 'Driver-Driven' && empty($value)) {
                    $fail('The route field is required when selecting Driver-Driven.');
                }
            }],
        ], [
            'phone.regex' => 'Please enter a valid 10-digit phone number.',
        ]);

        // Check if the car is already booked for the selected date range
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

        // Set route_id to null if Self-Drive is selected
        $routeId = $request->drive_type === 'Self-Drive' ? null : $request->route_id;

        // Calculate Booking Price
        $car = Car::findOrFail($request->car_id);
        $pickupDate = strtotime($request->pickup_date);
        $dropoffDate = strtotime($request->dropoff_date);
        $days = max(1, round(($dropoffDate - $pickupDate) / (60 * 60 * 24)));
        $totalPrice = $days * $car->price;

        // Create Booking
        Booking::create([
            'car_id' => $request->car_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pickup_date' => $request->pickup_date,
            'dropoff_date' => $request->dropoff_date,
            'route_id' => $routeId,
            'price' => $totalPrice,
            'status' => 'pending',
        ]);

        // Update car status to 'ride'
        $car->update(['status' => 'ride']);

        return redirect()->back()->with('success', "Booking confirmed successfully! Total Price: ₹{$totalPrice}. The car status has been updated to 'ride'.");
    }

    public function history() {
        $user = Auth::user();
        $bookings = Booking::with('car', 'route')->where('email', $user->email)->get();
        return view('booking.history', compact('bookings'));
    }

}
