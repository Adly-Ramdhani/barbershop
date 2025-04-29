<?php

namespace App\Models;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
