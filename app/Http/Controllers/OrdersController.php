<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;
use App\delivery;

class OrdersController extends Controller
{
    public function index(){
        $orders = orders::all();
        return view('admin.orders.index')
        ->with('orders',$orders);
    }

    public function parent($id){
        $order = orders::find($id);
        $delId = $order->delivery_id;
        $delivery= delivery::find($delId);
        return view('admin.orders.show')
        ->with('order',$order)
        ->with('delivery',$delivery);
    }
}
