<?php

namespace App\Http\Controllers;

use App\cart;
use Illuminate\Http\Request;
use Auth;
use App\product;
use App\cart_items;
use Paynow\Payments\Paynow as Paynow;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth::user();

        //check if user has cart
        if ($user->cart !== null) {
            $total = $this->totalweb();
            $cart = cart::find($user->cart->id);
            $cart_items = $cart->cart_items;
            //return $total;
            //return $cart_items;
            return view('cart')
                ->with('cart_items', $cart_items)
                ->with('total', $total);
        }
        return view('cart')->with('cart_items', null)
            ->with('total', 0);
    }

    public function savecartweb(Request $request)
    {
        $user = auth::user();
        //if user already has a cart
        if ($user->cart !== null) {
            $cart = cart::find($user->cart->id);
        } else {
            $cart = new cart();
            $cart->user_id = $user->id;
            $cart->save();
        }

        $product = product::find($request->input('product_id'));
        if ($product->minOrder > $request->input('quantity')) {
            return redirect()->back()->with('error', 'Your quantity is less than the required minimum order quantity');
        }
        if ($cart_item = $this->checkProductInCart($product->id, $cart->cart_items)) {
            $cart_item = cart_items::find($cart_item->id);
            $cart_item->quantity = $cart_item->quantity + $request->input('quantity');
            $cart_item->save();
        } else {
            $cart_item = new cart_items();

            $cart_item->quantity = $request->input('quantity');
            $cart_item->product_id = $request->input('product_id');
            $cart_item->price = $product->price;
            $cart_item->cart_id = $cart->id;
        }
        if ($cart_item->quantity > $product->quantity) {
            return redirect()->back()->with('error', 'Product Out Of Stock');

        } else {
            $cart_item->save();
            return redirect()->back()->with('success', 'Product added to cart successfully <a href="/cart">View Your Shopping Cart</a>');
        }
    }

    public function checkProductInCart($product_id, $cart_items)
    {
        foreach ($cart_items as $item) {
            if ($product_id == $item->product_id) {
                return $item;
            }
        }
    }

    public function deleteCartItem(Request $request)
    {
        $user = auth::user();

        $cart_item = cart_items::find($request->input('cart_item_id'));
        if ($cart_item != null) {
            $cart_item->delete();
            return redirect()->back()->with('success', 'item removed Succesfully');
        } else {
            return redirect()->back()->with('error','failed to remove item');
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
    }

    public  $integration_key = '96bd2e52-0108-4b72-b35f-8f128d056fe9';
    public  $integration_id = '7741';

    public function mobilePaymentweb(Request $request)
    {
        $user = auth::user();

        $paynow = new Paynow(
            $this->integration_id,
            $this->integration_key,
            'http://booze.co.zw/gateways/paynow/update',
            'http://booze.co.zw/return?gateway=paynow'
        );
        $order = new order();
        $order->status = 'ordered';
        $order->user_id = $user->id;
        $order->save();

        if ($order_items = $user->cart->cart_items) {
            $payment = $paynow->createPayment('ORDER' . $order->id, $user->email);

            foreach ($order_items as $item) {
                $order_item = new order_items();
                $order_item->quantity = $item->quantity;
                $order_item->product_id = $item->product_id;
                $order_item->price = $item->price;
                $order_item->order_id = $order->id;
                $order_item->save();
                $payment->add($item->product->title, $item->price * $item->quantity);
            }
        }

        $response = $paynow->sendMobile($payment, $request->input('phone_number'), $request->input('method'));

        if ($response->success) {
            $order->pollurl = $response->pollUrl();
            $order->save();
            $cart = cart::find($user->cart->id);
            $cart->delete();

            return response()->json([
                'success' => true,
                'message' => $response->instructions(),
                'order' => $order
            ]);
            //Redirect::route('home')->with('success', 'payment made check status in oders');
        } else {
            return response()->json([
                'success' => false,
                'message' => $response->error
            ]);
        }
    }
}
