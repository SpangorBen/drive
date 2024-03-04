<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Route;
use Illuminate\Support\Carbon;
use App\Models\City;
use App\Rules\DifferentCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverRouteController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'pickup_city' => ['required', new DifferentCity()],
            'destination_city' => 'required',
            'date' => ['required', 'date', 'after_or_equal:' . Carbon::today()->toDateString()],
        ]);

        $pickupCity = City::find($validatedData['pickup_city']);
        $destinationCity = City::find($validatedData['destination_city']);

        $distance = calculateDistance($pickupCity->latitude, $pickupCity->longitude, $destinationCity->latitude, $destinationCity->longitude);

        $time = calculateTime($distance);
        $existingRoute = $user->route()->whereDate('date', $validatedData['date'])->first();

        if ($existingRoute) {
            return back()->with('error', 'You already have a route for the selected date.');
        }

        // dd($distance);

        $route = $user->route()->create([
            'pickup_city_id' => $validatedData['pickup_city'],
            'destination_city_id' => $validatedData['destination_city'],
            'distance' => ceil($distance),
            'date' => $validatedData['date'],
            'time' =>round($time, 2),
        ]);

        if ($route) {
            return redirect()->route('driver.dashboard')->with('success', 'Route created successfully');
        } else {
            return back()->with('error', 'Failed to create route');
        }
    }

    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route('driver.dashboard')->with('success', 'Route deleted successfully');
    }

}
