<?php

namespace App\ProductFilters;

use Closure;
/**
 *
 */
class Search extends Filter
{

  protected function applyFilter($builder)
  {
    // dd(request($this->filterName()));
    $q = request($this->filterName());
      return $builder->where("product_name", "like", "%$q%");
  // return $builder->orderBy('id', "desc");

  }

}
