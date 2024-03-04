<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'client_id',
        'driver_id',
        'reserved_at',
        'cancelled_at',
        'completed',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
