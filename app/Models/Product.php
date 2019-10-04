<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'brand_id', 'sku', 'name', 'slug', 'description', 'quantity', 'weight', 'price', 'sale_price',
        'status', 'featured'
    ];

    protected $casts = [
        'quantity'  => 'integer',
        'brand_id'  => 'integer',
        'status'    => 'boolean',
        'featured'  => 'boolean'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
       // $this->attributes('slug') = str_slug($value);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
}
