<?php

namespace Database\Seeders;

use App\Models\Tools\CRM\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Hébergement Web'],
        ];

        foreach ($types as $type) {
            Activity::create($type);
        }
    }
}
