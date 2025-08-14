<?php

namespace App\Models;

use Database\Factories\ProductsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;


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

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    protected static function newFactory()
    {
        return ProductsFactory::new();
    }
}
