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
Route::get('about','pagesController@about');



Route::get('/paypal_visa','CartController@visapay')->middleware('auth');
Route::get('/shipping_details','CartController@shipping')->middleware('auth');
Route::get('/shipping_change/{id}', 'CartController@shippingChange')->middleware('auth');
Route::post('/shipping/store', 'CartController@shippingStore')->name('shipping.store')->middleware('auth');
Route::post('/pay','CartController@checkoutBraintree')->name('pay.braintree')->middleware('auth');
//page route will go here 

// Route::group(['middleware' => ['IsAdmin','auth']],function(){

// //admin routes will go here
// Route::get('rates','RatesController@index');
// Route::get('admin','pagesController@admin');
// Route::resource('projects','ProjectsController');
// Route::resource('category','CategoryController');
//
Route::resource('product','ProductController');
// Route::get('orders','OrdersController@index');
// Route::get('parent/{id}','OrdersController@parent');
// });
Route::resource('projects_cat','ProjectCategoryController');
Route::resource('projects','ProjectsController');
Route::Post('placeorder','ProductController@store')->name('place.order');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
