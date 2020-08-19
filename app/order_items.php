<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product as items;

class order_items extends Model
{
    
    public function product()
    {
        return $this->Belongsto(items::class);
    }
}
