<?php

namespace App\Http\Controllers;

use App\Models\ClothingItem;
use Illuminate\Http\Request;

class ClothingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all clothing items with their associated category
        $clothingItems = ClothingItem::with('category')->get();

        return response()->json([
            'message' => 'Clothing items retrieved successfully',
            'data' => $clothingItems
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'size' => 'required|string',
            'color' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create a new clothing item
        $clothingItem = ClothingItem::create($validated);

        return response()->json([
            'message' => 'Clothing item added successfully',
            'data' => $clothingItem
        ], 201); // Return a 201 status code for resource created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the clothing item by ID, with the associated category
        $clothingItem = ClothingItem::with('category')->findOrFail($id);

        return response()->json([
            'message' => 'Clothing item retrieved successfully',
            'data' => $clothingItem
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the clothing item by ID
        $clothingItem = ClothingItem::findOrFail($id);

        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'size' => 'required|string',
            'color' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Update clothing item with validated data
        $clothingItem->update($validated);

        return response()->json([
            'message' => 'Clothing item updated successfully',
            'data' => $clothingItem
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find and delete the clothing item by ID
        ClothingItem::destroy($id);

        return response()->json(['message' => 'Clothing item deleted successfully'], 204);
    }
}
