<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountrySeeder::class);
        $this->call(TaxSeeder::class);

        $this->call(PaymentMethodSeeder::class);

        $this->call(CurrencySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(CategorySeeder::class);

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
    }
}
