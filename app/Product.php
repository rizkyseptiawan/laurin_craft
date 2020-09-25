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

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $appends = ['image_link'];

    public function links()
    {
        return $this->hasMany(ProductLink::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function getImageLinkAttribute()
    {
        return asset($this->image_path);
    }
}
