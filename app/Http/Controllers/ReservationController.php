<?php 

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Route;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function store(Request $request)
    {
        // $reserved = 0;
        $validatedData = $request->validate([
            'route_id' => 'required|exists:routes,id',
            // 'pickup_date' => 'required|date|after_or_equal:today',
        ]);

        $existingReservation = Reservation::where('route_id', $validatedData['route_id'])
            ->where('client_id', auth()->id())
            ->exists();

        if ($existingReservation) {
            // $reservation->re = 1;
            return redirect()->back()->with('error', 'You already have a reservation for this route.');
        }

        $routeId = $request->input('route_id');
        $route = Route::find($routeId);

        $reservation = new Reservation();
        $reservation->route_id = $validatedData['route_id'];
        $reservation->driver_id = $route->user_id;
        $reservation->reserved_at = now();
        $reservation->client_id = auth()->id();
        $route->reserved = 1;
        // dd($reservation);

        $route->save();

        $reservation->save();

        return redirect()->back()->with('success', 'Route reserved successfully');
    }

    public function destroy(Reservation $reservation){
        $reservation->delete();

        return redirect()->route('user.dashboard')->with('success', ' deleted successfully');

    }

}