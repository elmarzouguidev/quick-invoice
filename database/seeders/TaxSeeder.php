<?php

namespace Database\Seeders;

use App\Models\Tools\Finance\Tax;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taxes = [
            ['name' => 'TVA', 'taux' => 20.00, 'symbole' => '20%', 'country_id' => 1],
            ['name' => 'TVA', 'taux' => 14.00, 'symbole' => '14%', 'country_id' => 1],
        ];

        foreach ($taxes as $taxe) {
            Tax::create($taxe);
        }
    }
}
