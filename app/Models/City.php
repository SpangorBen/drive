<?php

namespace App\Models;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'latitude', 'longitude'];

    public function pickupRoutes()
    {
        return $this->hasMany(Route::class, 'pickup_city_id');
    }

    public function destinationRoutes()
    {
        return $this->hasMany(Route::class, 'destination_city_id');
    }
}
