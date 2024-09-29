<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'photo', 'city', 'country'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
