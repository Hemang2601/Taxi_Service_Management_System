<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // Show all cars
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    // Store a new car in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|unique:cars',
            'seats' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'fuel' => 'required|string',
            'transmission' => 'required|string',
            'type' => 'required|string|in:SUV,Sedan,Luxury',
            'image' => 'required|image|max:2048',
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('cars'), $imageName);
        } else {
            $imageName = 'default.png';
        }

        // Save Car
        Car::create([
            'name' => $request->name,
            'model' => $request->model,
            'license_plate' => $request->license_plate,
            'seats' => $request->seats,
            'price' => $request->price,
            'fuel' => $request->fuel,
            'transmission' => $request->transmission,
            'type' => $request->type,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.cars')->with('success', 'Car added successfully.');
    }

    // Show form to edit a car
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    // Update car details
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => "required|unique:cars,license_plate,$id",
            'seats' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'fuel' => 'required|string',
            'transmission' => 'required|string',
            'type' => 'required|string|in:SUV,Sedan,Luxury',
            'image' => 'nullable|image|max:2048',
        ]);

        $car = Car::findOrFail($id);

        // Handle Image Update
        if ($request->hasFile('image')) {
            // Delete old image
            if ($car->image && file_exists(public_path('cars/' . $car->image))) {
                unlink(public_path('cars/' . $car->image));
            }

            // Save new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('cars'), $imageName);
            $car->image = $imageName;
        }

        // Update Car
        $car->update($request->except('image') + ['image' => $car->image]);

        return redirect()->route('admin.cars')->with('success', 'Car updated successfully.');
    }

    // Delete a car
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        // Delete image from storage
        if ($car->image && file_exists(public_path('cars/' . $car->image))) {
            unlink(public_path('cars/' . $car->image));
        }

        // Delete car record
        $car->delete();

        return redirect()->route('admin.cars')->with('success', 'Car deleted successfully.');
    }
}
