<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'shipping_price',
        'shipping_address_id',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
