<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'photo',
    ];

    public function category_child()
    {
        return $this->hasMany(CategoryChild::class, 'category_id');
    }
}
