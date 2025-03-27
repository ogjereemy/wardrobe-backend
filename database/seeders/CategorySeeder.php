<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $defaultCategories = [
            ['name' => 'Tops'],
            ['name' => 'Bottoms'],
            ['name' => 'Shoes'],
            ['name' => 'Accessories'],
        ];

        foreach ($defaultCategories as $category) {
            Category::create($category);
        }
    }
}
