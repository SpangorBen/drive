<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Reservation;
use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;


class UserController extends Controller{

    public function index(){
        $cities = City::all();
        // $searchedRoutes;
        return view('user.dashboard', compact('cities'));
    }
    
    public function form(){
        return view('user.form');
    }
    
    public function searchRoutes(Request $request)
    {
        $cities = City::all();
        
        // dd($reservation);
        
        $currentDate = Carbon::now()->toDateString();
        $pickupCityId = $request->input('pickup_city');
        $destinationCityId = $request->input('destination_city');
        
        $pickupCity = City::find($pickupCityId);
        $destinationCity = City::find($destinationCityId);
        
        $searchedRoutes = Route::where('pickup_city_id', $pickupCityId)
                ->where('destination_city_id', $destinationCityId)
                ->whereDate('date', '>=', $currentDate)
                ->get();
        
        // $reservation = Reservation::find($route->id);
        return view('user.dashboard', [
            'searchedRoutes' => $searchedRoutes,
            'pickupCity' => $pickupCity,
            'destinationCity' => $destinationCity,
            'cities' => $cities,
            // 'reservation' => $reservation,
        ]);
    }
}