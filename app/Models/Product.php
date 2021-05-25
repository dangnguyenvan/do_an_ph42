<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function product_promotions()
    {
        return $this->hasMany(ProductPromotion::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function oneimage()
    {
        return $this->hasOne(Image::class);
    }
    

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
}
