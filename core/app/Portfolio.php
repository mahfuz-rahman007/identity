<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
  public function service(){
    return $this->belongsTo('App\Service');
  }
}
