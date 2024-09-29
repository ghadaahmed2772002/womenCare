<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =
    ['category_child_id','name', 'price', 'photo', 'quantity_in_stock', 'discount_id', 'status','company_id'];


    public function categoryChild()
    {
        return $this->belongsTo(CategoryChild::class, 'category_child_id');
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class,'category_id');
    }


    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}
