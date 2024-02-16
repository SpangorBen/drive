<?php

use App\Http\Controllers\DriverRouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/driver/form', function () {
//     return view('driver.form');
// })->middleware(['auth', 'role:driver'])->name('driver_form');

// Route::get('/user/form', function () {
//     return view('user.form');
// })->middleware(['auth', 'role:user'])->name('user_form');

Route::middleware(['auth', 'role:user'])->group(function(){
    Route::get('user/form', [UserController::class, 'form'])->name('user.form');
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

Route::middleware(['auth', 'role:driver'])->group(function(){
    Route::get('driver/form', [DriverController::class, 'edit'])->name('driver.edit');
    Route::put('driver/form/{user}', [DriverController::class, 'update'])->name('driver.update');
    Route::get('driver/dashboard', [DriverController::class, 'index'])->name('driver.dashboard');
    Route::post('/driver/dashboard', [DriverRouteController::class, 'store'])->name('driver.routes.store');
});



Route::get('/admin/index', function () {
    return view('admin.index');
})->middleware(['auth', 'role:admin'])->name('admin.index');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
