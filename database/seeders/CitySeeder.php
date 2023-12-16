<?php

namespace Database\Seeders;

use App\Models\Tools\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Casablanca', 'country_id' => 1],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
