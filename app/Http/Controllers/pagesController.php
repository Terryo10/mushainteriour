<?php

namespace App\Http\Controllers;

use App\aboutSections;
use App\category;
use Illuminate\Http\Request;
use App\product;
use App\team_profiles;
use Illuminate\Support\Facades\View;

class pagesController extends Controller
{

    public function contact(){
        return view('contact');
    }

    public function shop(){
        $categories = category::all();
        $products = product::all();
        // return $products;
        return view('shop')
        ->with('products',$products)
        ->with('categories',$categories);
    }

    public function category($id){
        $categories = category::all();
        $products = product::where('category_id', $id)->get();
        // return $products;
        return view('shop')
        ->with('products',$products)
        ->with('categories',$categories);
    }

    public function admin(){
        return view('admin.index');
    }

    public function eco(){
        return view('checkoutRtgs');
    }

    public function about(){
        $sections = aboutSections::all();
        $team = team_profiles::all();
        return view('about')
        ->with('sections',$sections)
        ->with('team',$team);
    }
  
}
