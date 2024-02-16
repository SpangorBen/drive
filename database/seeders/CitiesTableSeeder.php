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
            ['name' => 'Casablanca', 'latitude' => 33.5731, 'longitude' => -7.5898],
            ['name' => 'Rabat', 'latitude' => 34.0209, 'longitude' => -6.8411],
            ['name' => 'Marrakech', 'latitude' => 31.6295, 'longitude' => -7.9811],
            ['name' => 'Fes', 'latitude' => 34.0181, 'longitude' => -5.0078],
            ['name' => 'Tangier', 'latitude' => 35.7595, 'longitude' => -5.8330],
            ['name' => 'Agadir', 'latitude' => 30.4220, 'longitude' => -9.5595],
            ['name' => 'Oujda', 'latitude' => 34.6800, 'longitude' => -1.9086],
            ['name' => 'Kenitra', 'latitude' => 34.2610, 'longitude' => -6.5802],
            ['name' => 'Tetouan', 'latitude' => 35.5706, 'longitude' => -5.3690],
            ['name' => 'Beni Mellal', 'latitude' => 32.3353, 'longitude' => -6.3531],
            ['name' => 'Nador', 'latitude' => 35.1688, 'longitude' => -2.9331],
            ['name' => 'Settat', 'latitude' => 33.0006, 'longitude' => -7.6166],
            ['name' => 'El Jadida', 'latitude' => 33.2549, 'longitude' => -8.5067],
            ['name' => 'Taza', 'latitude' => 34.2190, 'longitude' => -4.0086],
            ['name' => 'Safi', 'latitude' => 32.2995, 'longitude' => -9.2372],
            ['name' => 'Berkane', 'latitude' => 34.9180, 'longitude' => -2.3231],
            ['name' => 'Khouribga', 'latitude' => 32.8864, 'longitude' => -6.9071],
            ['name' => 'Mohammedia', 'latitude' => 33.6951, 'longitude' => -7.3893],
            ['name' => 'Larache', 'latitude' => 35.1939, 'longitude' => -6.1540],
            ['name' => 'Khenifra', 'latitude' => 32.9372, 'longitude' => -5.6669],
            ['name' => 'Errachidia', 'latitude' => 31.9244, 'longitude' => -4.4259],
            ['name' => 'Taroudant', 'latitude' => 30.4707, 'longitude' => -8.8774],
            ['name' => 'Laâyoune', 'latitude' => 27.1580, 'longitude' => -13.2150],
            ['name' => 'Ouarzazate', 'latitude' => 30.9406, 'longitude' => -6.9385],
            ['name' => 'Tétouan', 'latitude' => 35.5718, 'longitude' => -5.3670],
            ['name' => 'Meknès', 'latitude' => 33.8869, 'longitude' => -5.5155],
            ['name' => 'Chefchaouen', 'latitude' => 35.1688, 'longitude' => -5.2680],
            ['name' => 'Dakhla', 'latitude' => 23.6848, 'longitude' => -15.9574],
            ['name' => 'Tan-Tan', 'latitude' => 28.4377, 'longitude' => -11.1037],
            ['name' => 'Al Hoceima', 'latitude' => 35.2442, 'longitude' => -3.9302],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
