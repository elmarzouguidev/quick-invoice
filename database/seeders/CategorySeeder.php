<?php

namespace Database\Seeders;

use App\Models\Tools\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public $cates = [
        [
            'name' => 'default',
            'is_active' => true,
        ],
    ];

    public function run()
    {
        if (Category::count() <= 0) {
            foreach ($this->cates as $category) {
                Category::create($category);
            }
        }
    }
}
