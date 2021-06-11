<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   

   
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function oneimage()
    {
        return $this->hasOne(Image::class);
    }
    
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function promotion()
    {
        return $this->belongsToMany(Promotion::class, 'product_promotion', 'product_id', 'promotion_id');
    }
    
    public function getTotal($quantity, $price){
        return $total = $quantity * $price;
    }
    public static function promotional_price($price,$discount){
       
        return $promotional_price = $price * (100 - $discount)/100 ;
    }
}
