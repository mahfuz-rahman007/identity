<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function bcategory(){
        return $this->belongsTo('App\Bcategory');
    }
}
