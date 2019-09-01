<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function links()
    {
        return $this->hasMany(ProductLink::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
