<?php

namespace App\Http\Controllers;

use App\Models\TaxiRoute;
use Illuminate\Http\Request;

class TaxiRouteController extends Controller
{
    public function index()
    {
        $routes = TaxiRoute::all();
        return view('admin.routes.index', compact('routes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'route_name' => 'required|string|max:255',
            'start_location' => 'required|string|max:255',
            'end_location' => 'required|string|max:255',
        ]);

        TaxiRoute::create($request->all());

        return redirect()->route('admin.routes')->with('success', 'Route added successfully!');
    }

    public function update(Request $request, TaxiRoute $route)
    {
        $request->validate([
            'route_name' => 'required|string|max:255',
            'start_location' => 'required|string|max:255',
            'end_location' => 'required|string|max:255',
        ]);

        $route->update($request->all());

        return redirect()->route('admin.routes')->with('success', 'Route updated successfully!');
    }

    public function destroy(TaxiRoute $route)
    {
        $route->delete();

        return redirect()->route('admin.routes')->with('success', 'Route deleted successfully!');
    }
}
