<?php

namespace Database\Seeders;

use App\Enums\Company\CompanyType;
use App\Models\Tools\CRM\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach (CompanyType::cases() as $type) {
            Type::create(['name' => $type->getName()]);
        }
    }
}
