<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'type',
        'color',
        'size',
        'weight',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProducts::class, 'category_id');
    }
}
