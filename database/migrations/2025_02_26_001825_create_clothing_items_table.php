<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clothing_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();  // Description field is nullable
            $table->string('size')->nullable();  // Nullable size field
            $table->string('color')->nullable();  // Nullable color field
            $table->string('category')->nullable();  // Nullable category field
            $table->unsignedBigInteger('category_id');  // Foreign key to categories
            $table->timestamps();

            // Explicitly define the foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothing_items');
    }
};