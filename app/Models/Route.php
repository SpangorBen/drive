<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'pickup_city_id',
        'destination_city_id',
    ];

    public function pickupCity()
    {
        return $this->belongsTo(City::class, 'pickup_city_id');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
