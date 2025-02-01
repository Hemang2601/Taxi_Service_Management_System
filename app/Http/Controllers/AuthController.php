<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
{
    // Validate incoming request data
    $request->validate([
        'firstname' => 'required|max:50',
        'lastname' => 'required|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'number' => 'required|max:15',
        'city' => 'required|max:100',
    ]);

    // Capitalize the first letter of the first name
    $formattedFirstName = ucfirst(strtolower($request->firstname)); // Lowercase the entire string, then capitalize the first letter

    // Create the user
    $user = User::create([
        'firstname' => $formattedFirstName,
        'lastname' => ucfirst(strtolower($request->lastname)), // Optional: apply same logic to last name
        'email' => $request->email,
        'password' => Hash::make($request->password), // Hash the password
        'number' => $request->number,
        'city' => ucfirst(strtolower($request->city)), // Optional: capitalize city name
    ]);

    // Store user information in the session
    session(['user_name' => $user->firstname]); // Store the first name for easy access

    // Log the user in immediately after registration
    Auth::login($user);

    // Redirect to the desired route with a success message
    return redirect()->route('home')->with('success', 'Registration successful and logged in!');
}

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle user login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
{
    // Validate the login form input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to log the user in
    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ], $request->remember)) { // Added 'remember' functionality if the user wants to stay logged in
        // Store user name in the session for easy access in views
        session(['user_name' => Auth::user()->firstname]);

        // Redirect to home or the intended route with a success message
        return redirect()->route('home')->with('success', 'Login successful!');
    }

    // If authentication fails, redirect back with error message
    return back()->withErrors([
        'email' => 'Invalid credentials. Please check your email or password.',
    ]);
}


    /**
     * Handle user logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout(); // Log the user out
        session()->forget('user_name'); // Clear only the user session data

        // Optionally regenerate the session to prevent session fixation attacks
        session()->regenerate();

        // Redirect to the login page with a success message
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
