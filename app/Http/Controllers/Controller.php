<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function totalweb()
    {
        $user = auth::user();
        if ($user !== null) {
            if ($user->cart !== null) {
                $cart_items = $user->cart->cart_items;
                if (!$cart_items) {
                    return $total = 0;
                } else {
                    $total = 0;
                    foreach ($cart_items as $item) {
                        $total = $total + ($item->quantity * $item->price);
                    }
                    return $total;
                }
            }
            return $total = 0;

        }
        // dd($user);

    }
}
