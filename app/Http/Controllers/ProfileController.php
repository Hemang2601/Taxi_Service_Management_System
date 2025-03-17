<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request) {
        $user = Auth::user();

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'number'    => 'required|string|max:15',
            'city'      => 'required|string|max:100',
        ]);

        $user->update($request->only(['firstname', 'lastname', 'email', 'number', 'city']));

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
