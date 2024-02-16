<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Route;
use App\Rules\DifferentCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverRouteController extends Controller
{
    //
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'pickup_city' => ['required', new DifferentCity()],
            'destination_city' => 'required',
        ]);
        
        $user = Auth::user();
        
        $route = $user->route()->create([
            'pickup_city_id' => $validatedData['pickup_city'],
            'destination_city_id' => $validatedData['destination_city'],
        ]);

        if ($route) {
            return redirect()->route('driver.dashboard')->with('success', 'Route created successfully');
        } else {
            return back()->with('error', 'Failed to create route');
        }
    }
}
