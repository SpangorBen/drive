<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DriverController extends Controller{

    public function index(){

        $cities = City::all();
        return view('driver.dashboard', compact('cities'));
    }

    public function edit(){
        return view('driver.form');
    }

    public function update(Request $request, User $user){

        $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'immat' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'car' => ['required', 'string', 'max:255'],
        ]);

        $user->description = $request->description;
        $user->immat = $request->immat;
        $user->type = $request->car;
        $user->save();

        return redirect()->route('driver.dashboard');
    }

}