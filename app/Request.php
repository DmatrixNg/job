<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{


  protected $fillable = [
    'orderId', 'pay','pickup_code',
'status'
];

protected $with =['orders'];

public function orders()
     {
         return $this->belongsTo('App\Order','orderId');
     }
}
