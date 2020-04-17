<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
  protected $fillable = [
    'userId',
'type',
'privilages',
'status',
  ];
}
