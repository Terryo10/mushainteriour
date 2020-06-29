<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\View;

class pagesController extends Controller
{

    public function contact(){
        return view('contact');
    }

    public function shop(){
        $products = product::all();
        // return $products;
        return view('shop')
        ->with('products',$products);
    }

    public function admin(){
        return view('admin.index');
    }

    public function eco(){
        return view('checkoutRtgs');
    }
  
}
