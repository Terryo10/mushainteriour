<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectCategory extends Model
{
    protected $with =['projects'];
    
    public function projects(){
        return $this->hasMany('App\projects');
    }
}
