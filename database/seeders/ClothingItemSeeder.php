<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClothingItem;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ClothingItemSeeder extends Seeder
{
    public function run()
    {
        // First, create some categories
        $categories = [
            ['name' => 'tops'],
            ['name' => 'bottoms'],
            ['name' => 'shoes'],
        ];

        // Create the categories and store their IDs
        foreach ($categories as $category) {
            Category::create($category);
        }

        // Get the ID of the 'tops' category
        $topsCategory = Category::where('name', 'tops')->first();

        // Check if 'tops' category exists and assign its ID to avoid null errors
        if ($topsCategory) {
            $topsCategoryId = $topsCategory->id;
            Log::info('Tops category ID: ' . $topsCategoryId);
        } else {
            // Handle the error if the category is not found
            Log::error('Tops category not found.');
            return;  // Exit the seeder if the category is not found
        }

        // Now create clothing items with a valid category_id and description
        $items = [
            [
                'name' => 'Black T-shirt',
                'description' => 'A classic black T-shirt suitable for everyday wear.',
                'size' => 'M',
                'color' => 'Black',
                'category'=> $topsCategoryId,
                'category_id' => $topsCategoryId,  // Use the tops category ID
            ],
            [
                'name' => 'White T-shirt',
                'description' => 'A comfortable white T-shirt with a soft cotton feel.',
                'size' => 'L',
                'color' => 'White',
                'category'=> $topsCategoryId,
                'category_id' => $topsCategoryId,  // Use the tops category ID
            ],
            // Add more items with description here
        ];

        foreach ($items as $item) {
            if ($item['category_id']) {  // Only create if category_id is not null
                Log::info('Creating item: ' . json_encode($item));
                ClothingItem::create($item);
            } else {
                // Log an error if the category_id is null
                Log::error('Category ID is null for item: ' . json_encode($item));
            }
        }
    }
}