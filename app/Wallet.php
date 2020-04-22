<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
protected $fillable = [
   'userId',
'amount',
'book_balance',
'bonus',
'currency',
'type',
'status',
];

protected $with =['user'];

public function user()
     {
         return $this->belongsTo('App\User','id');
     }

}
