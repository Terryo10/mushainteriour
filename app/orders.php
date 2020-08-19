<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\order_items as items;

class orders extends Model
{

    public function order_items()
    {
        return $this->hasMany(items::class);
    }
}
