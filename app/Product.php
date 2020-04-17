<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = [
    'vendorId', 'product_name', 'productSlug', 'product_pic', 'product_price',
    'product_desc', 'product_full_desc', 'product_type', 'ads_url','status'
];

protected $with = ['vendor'];

public function vendor()
     {
         return $this->belongsTo('App\Vendor','id');
     }
}
