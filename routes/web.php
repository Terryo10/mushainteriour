<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('contact','pagesController@contact');
Route::get('cart', 'CartController@index')->name('cart')->middleware('auth');
Route::get('cart/delete', 'CartController@deleteCartItem')->middleware('auth');
Route::post('cart/save', 'CartController@savecartweb')->name('savetocart')->middleware('auth');
Route::get('checkout/paynow','pagesController@eco')->middleware('auth');
Route::post('make_payment', 'CartController@mobilePaymentweb')->name('make_payment');
Route::get('shop','pagesController@shop');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin','pagesController@admin');
Route::resource('category','CategoryController');
Route::resource('products','ProductController')->middleware('auth');
Route::resource('projects','ProjectsController');

//page route will go here 



//admin routes will go here
Route::get('rates','RatesController@index');