<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'number' => 'required|digits_between:10,15',
            'city' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($request->id);
        $user->update($request->all());

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }
}
