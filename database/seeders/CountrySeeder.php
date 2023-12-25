<?php

namespace Database\Seeders;

use App\Models\Tools\CRM\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'MAROC'],
            ['name' => 'Europe'],
            ['name' => 'États-Unis'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
