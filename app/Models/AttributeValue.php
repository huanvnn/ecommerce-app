<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_values';

    protected $fillable = [
        'attibute_id', 'value', 'price'
    ];

    protected $casts = [
        'attribute_id' => 'integer'
    ];
    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute');
        // return $this->belongsTo(Attribute::class);
    }

    public function productAttributes()
    {
        return $this->belongsToMany(ProductAttribute::class);
    }
}