<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'total_price',
        'status',
        'user_id',
        'shipping_id',
        
    ];




    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function shipping_address()
    {
        return $this->hasOne(ShippingAddress::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
