<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
  'userId',
'order',
'type',
'location',
'cost',
'pay_status',
'pickup_code',
];
protected $with = ['user'];
public function user()
     {
         return $this->belongsTo('App\User','id');
     }

     public function requests()
         {
             return $this->hasMany('App\Request', 'requestId');
         }
     public function responds()
         {
             return $this->hasMany('App\Responds', 'orderId');
         }
}
