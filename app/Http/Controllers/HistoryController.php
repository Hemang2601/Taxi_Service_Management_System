<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index() {
        return view('history');
    }

    public function history() {
        $user = Auth::user();
        $bookings = Booking::with('car', 'route')->where('email', $user->email)->get();
        return view('history', compact('bookings'));
    }

}
