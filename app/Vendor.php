<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
  protected $fillable = [
    'userId','name','slug','logo', 'des', 'type', 'status', 'token',
  ];


  public function user()
       {
           return $this->belongsTo('App\User','userId');
       }


  public function products()
    {
        return $this->hasMany('App\Product', 'vendorId');
    }

}
