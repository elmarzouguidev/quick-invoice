<?php

namespace Database\Seeders;

use App\Models\Tools\CRM\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Particulier'],
            ['name' => 'Entreprise'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
