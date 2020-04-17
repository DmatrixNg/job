<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{

  protected $fillable = [
    'userId',
'requestId',
'pickup_code',
'status',
];

protected $with =['request'];

public function request()
     {
         return $this->belongsTo('App\Request','id');
     }

     public function user()
          {
              return $this->belongsTo('App\User','id');
          }

}
