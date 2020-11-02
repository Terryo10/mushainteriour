<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    public function projects(){
        return $this->belongsTo('App\projectCategory');
    }
}
