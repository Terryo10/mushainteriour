<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = auth::user()->orders;
        // return $orders;
        return view('home')
        ->with('orders',$orders);
    }
}
