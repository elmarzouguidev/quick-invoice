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
            ['name' => 'TVA ', 'taux' => 0, 'country_id' => 1],
            ['name' => 'TVA MAROC', 'taux' => 20, 'symbole' => 'TVA', 'country_id' => 1],
        ];

        foreach ($taxes as $taxe) {
            Tax::create($taxe);
        }
    }
}
