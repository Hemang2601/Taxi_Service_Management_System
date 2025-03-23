<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use App\Models\TaxiRoute;

class ManageBookingController extends Controller
{
    // Display all bookings
    public function index(Request $request)
    {
        $status = $request->input('status', 'pending'); // Default to 'all'

        $bookings = Booking::with(['car', 'route'])
            ->when($status !== 'all', function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->paginate(10); // Add pagination

        return view('admin.bookings', compact('bookings', 'status'));
    }


    // Update booking status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        // If rejected, set car status back to 'free'
        if ($request->status === 'rejected') {
            $booking->car->update(['status' => 'free']);
        }

        return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated successfully!');
    }

    // Delete booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'pickup_date' => 'required|date',
            'dropoff_date' => 'required|date|after_or_equal:pickup_date',
            'price' => 'required|numeric|min:0',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('admin.bookings.index')->with('success', 'Booking details updated successfully!');
    }


        public function acceptedBookings()
    {
        $bookings = Booking::where('status', 'accepted')->get();
        return view('admin.acceptedbooking', compact('bookings'));
    }

    public function history()
    {
        $bookings = Booking::whereIn('status', ['rejected', 'completed'])->get();
        return view('admin.historybooking', compact('bookings'));
    }


    public function acceptedStatusChange(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,accepted,rejected,completed',
    ]);

    $booking = Booking::findOrFail($id);
    $booking->status = $request->status;
    $booking->save();

    return redirect()->back()->with('success', 'Booking status updated successfully!');
}



}
