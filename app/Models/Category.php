<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function clothigItems()
    {
        return $this->hasMany(ClothingItem::class);
    }
}
