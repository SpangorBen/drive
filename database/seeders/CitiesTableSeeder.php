<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cities = [
            ['name' => 'Casablanca', 'latitude' => 33.5333, 'longitude' => -7.5833],
            ['name' => 'El Kelaa des Srarhna', 'latitude' => 32.0481, 'longitude' => -7.4083],
            ['name' => 'Fès', 'latitude' => 34.0433, 'longitude' => -5.0033],
            ['name' => 'Tangier', 'latitude' => 35.7767, 'longitude' => -5.8039],
            ['name' => 'Marrakech', 'latitude' => 31.6300, 'longitude' => -8.0089],
            ['name' => 'Sale', 'latitude' => 34.0333, 'longitude' => -6.8000],
            ['name' => 'Mediouna', 'latitude' => 33.4500, 'longitude' => -7.5100],
            ['name' => 'Rabat', 'latitude' => 34.0209, 'longitude' => -6.8416],
            ['name' => 'Meknès', 'latitude' => 33.8950, 'longitude' => -5.5547],
            ['name' => 'Oujda-Angad', 'latitude' => 34.6867, 'longitude' => -1.9114],
            ['name' => 'Kenitra', 'latitude' => 34.2500, 'longitude' => -6.5833],
            ['name' => 'Agadir', 'latitude' => 30.4333, 'longitude' => -9.6000],
            ['name' => 'Tétouan', 'latitude' => 35.5667, 'longitude' => -5.3667],
            ['name' => 'Taourirt', 'latitude' => 34.4169, 'longitude' => -2.8850],
            ['name' => 'Temara', 'latitude' => 33.9267, 'longitude' => -6.9122],
            ['name' => 'Safi', 'latitude' => 32.2833, 'longitude' => -9.2333],
            ['name' => 'Khénifra', 'latitude' => 32.9394, 'longitude' => -5.6675],
            ['name' => 'Laâyoune', 'latitude' => 27.1536, 'longitude' => -13.2033],
            ['name' => 'Mohammedia', 'latitude' => 33.6833, 'longitude' => -7.3833],
            ['name' => 'Kouribga', 'latitude' => 32.8833, 'longitude' => -6.9167],
            ['name' => 'El Jadid', 'latitude' => 33.2333, 'longitude' => -8.5000],
            ['name' => 'Béni Mellal', 'latitude' => 32.3394, 'longitude' => -6.3608],
            ['name' => 'Ait Melloul', 'latitude' => 30.3342, 'longitude' => -9.4972],
            ['name' => 'Nador', 'latitude' => 35.1667, 'longitude' => -2.9333],
            ['name' => 'Taza', 'latitude' => 34.2167, 'longitude' => -4.0167],
            ['name' => 'Settat', 'latitude' => 33.0000, 'longitude' => -7.6167],
            ['name' => 'Barrechid', 'latitude' => 33.2667, 'longitude' => -7.5833],
            ['name' => 'Al Khmissat', 'latitude' => 33.8167, 'longitude' => -6.0667],
            ['name' => 'Inezgane', 'latitude' => 30.3658, 'longitude' => -9.5381],
            ['name' => 'Ksar El Kebir', 'latitude' => 35.0090, 'longitude' => -5.9000],
            ['name' => 'Larache', 'latitude' => 35.1833, 'longitude' => -6.1500],
            ['name' => 'Guelmim', 'latitude' => 28.9833, 'longitude' => -10.0667]
           
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
