<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    protected $guarded = [];

    public $appends = ['image_link'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function links()
    {
        return $this->hasMany(ProductLink::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getLinkAttribute()
    {
        return route('frontpage.product.detail', $this);
    }

    public function getImageLinkAttribute()
    {
        $path = $this->attributes['image_path'];

        if (empty($path)) {
            return 'https://via.placeholder.com/468x60?text=LaurinCraft';
        }

        return asset($path);
    }
}
