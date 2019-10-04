<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";

    protected $fillable = [
        'name', 'slug', 'logo'
    ];

    public function setNameAttribute($value)
    {
       $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
