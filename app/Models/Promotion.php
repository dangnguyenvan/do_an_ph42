<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_promotion', 'product_id', 'promotion_id');
    }
    public static function promotional_price($price,$discount){
       
        return $promotional_price = $price * (100 - $discount)/100 ;
    }
}
