<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Route;
use App\Models\User;


class DriverController extends Controller{

    public function index(){

        $user = auth()->user();

        $cities = City::all();
        // $routes = $user->route()->latest()->get();
        $routes = Route::where('user_id', auth()->id())
                   ->orderBy('date')
                   ->get();

        return view('driver.dashboard', compact('cities', 'routes'));
    }

    public function edit(){
        return view('driver.form');
    }

    public function update(Request $request, User $user){

        $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'immat' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'car' => ['required', 'string', 'max:255'],
            'payment' => ['required', 'string', 'max:255'],
        ]);

        $user->description = $request->description;
        $user->immat = $request->immat;
        $user->type = $request->car;
        $user->payment = $request->payment;
        $user->save();

        return redirect()->route('driver.dashboard');
    }

}