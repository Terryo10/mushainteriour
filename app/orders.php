<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\order_items as items;

class orders extends Model
{
    protected $with=['order_items'];

    public function order_items()
    {
        return $this->hasMany(items::class);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
