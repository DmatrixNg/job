<?php

namespace App\ProductFilters;

use Closure;
/**
 *
 */
class ProductType extends Filter
{

  protected function applyFilter($builder)
  {
    // dd(request($this->filterName()));
    $q = request($this->filterName());
    // dd($builder->where("product_type", "like", "%$q%")->get());
      return $builder->where($this->filterName(), "like", "%$q%");

  // return $builder->orderBy('id', "desc");

  }

}
