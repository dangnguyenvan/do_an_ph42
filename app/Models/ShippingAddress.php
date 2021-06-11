<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $table = 'shipping_address';
    protected $fillable = [
        'address',
        'email',
        'phone',
        'name',
    ];





    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
