<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'percent',
        'status',
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
