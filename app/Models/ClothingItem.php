<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClothingItem extends Model
{
    protected $fillable = ['name', 'description', 'size', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
