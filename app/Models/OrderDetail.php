<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "order_details";
    protected $fillable = [
        'product_id',
        'order_id',
        'price',
        'quantity',
        'promotion_id'
    ];




    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    
    public static function promotional_price($price,$discount){
       
        return $promotional_price = $price * (100 - $discount)/100 ;
    }
}
