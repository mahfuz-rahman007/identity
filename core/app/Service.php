<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Service extends Model
{
    //
    public function portfolios(){
      return  $this->hasMany('App\Portfolio');
   }
}
