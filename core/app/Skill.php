<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function scategory(){
        return $this->belongsTo('App\Scategory');
    }
}
