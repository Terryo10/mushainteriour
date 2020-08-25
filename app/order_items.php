<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product as items;

class order_items extends Model
{
    protected $with =['product'];
    public function product()
    {
        return $this->Belongsto(items::class);
    }
}
