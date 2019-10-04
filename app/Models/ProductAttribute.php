<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;

class ProductAttribute extends Model
{
    protected $table = 'product_attributes';

    protected $fillable = [
        'product_id', 'quantity', 'price', 'value', 'attribute_id'
    ];

   public function product()
   {
       return $this->belongsTo(Product::class);
   }

   public function attributeValues()
   {
       return $this->belongsToMany(AttributeValue::class);
   }
   public function attribute()
   {
       return $this->belongsTo(Attribute::class);
   }
}
