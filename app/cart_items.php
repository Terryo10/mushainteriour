<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart_items extends Model
{
    protected $with = ['product'];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
