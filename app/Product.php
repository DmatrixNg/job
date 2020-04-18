<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Product extends Model
{

  protected $fillable = [
    'vendorId', 'product_name', 'productSlug', 'product_pic', 'product_price',
    'product_desc', 'product_full_desc', 'product_type', 'ads_url','status'
];

protected $with = ['vendor'];
public static function listproducts()
{
  return $movies = app(Pipeline::class)
  ->send(Product::query()
  )
  ->through([
    \App\ProductFilters\ProductType::class,
    \App\ProductFilters\Search::class,
  ])->thenReturn();
   // ->simplePaginate(20);
}
public function vendor()
     {
         return $this->belongsTo('App\Vendor','id');
     }
}
