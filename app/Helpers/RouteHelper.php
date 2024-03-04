<?php

// namespace App\Helpers;

function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371;

    $latFrom = deg2rad($lat1);
    $lonFrom = deg2rad($lon1);
    $latTo = deg2rad($lat2);
    $lonTo = deg2rad($lon2);

    // Calculate the differences
    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;

    // Apply the Haversine formula
    $a = sin($latDelta / 2) * sin($latDelta / 2) +
         cos($latFrom) * cos($latTo) *
         sin($lonDelta / 2) * sin($lonDelta / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $earthRadius * $c;

    // $time = $distance / 100;

    return $distance;
}

function calculateTime($distance){
    $time = $distance / 100;

    return $time;
}

function routePrice($time, $type){

    if($type == 'suv'){
        $price = $time * 1.5 * 60;
    } elseif ($type == 'car'){
        $price = $time * 1.1 * 60;
    } elseif($type == 'limo'){
        $price = $time * 2.5 * 60;
    }

    return $price;
}