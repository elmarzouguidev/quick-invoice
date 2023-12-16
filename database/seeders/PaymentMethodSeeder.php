<?php

namespace Database\Seeders;

use App\Models\Tools\Finance\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [

            ['name' => 'Espèces'],
            ['name' => 'Chèque'],
            ['name' => 'Prélèvement'],
            ['name' => 'Virement bancaire'],
            ['name' => 'Cart bancaire'],
            ['name' => 'Lettre de change'],
        ];

        foreach ($methods as $method) {
            PaymentMethod::create($method);
        }
    }
}
