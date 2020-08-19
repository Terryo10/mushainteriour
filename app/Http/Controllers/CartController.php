<?php

namespace App\Http\Controllers;

use App\cart;
use Illuminate\Http\Request;
use Auth;
use App\temporaryAddress;
use App\product;
use App\cart_items;
use Paynow\Payments\Paynow as Paynow;
use Braintree;
use App\delivery;
use App\orders;
use App\order_items;

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

    public function shippingChange($id)
    {
        $shipping = temporaryAddress::find($id);
        $shipping->delete();

        return redirect('/shipping_details')
            ->with('success', 'Change your address here');

    }

    public function shippingStore(Request $request)
    {
        $temporaryAddress = auth::user()->temporaryAddress;
        if ($temporaryAddress == !null) {
           
        } else {
            $id = auth::user()->id;
            $temporary = new temporaryAddress();
            $temporary->user_id = $id;
            $temporary->firstname = $request->input('firstname');
            $temporary->lastname = $request->input('lastname');
            $temporary->state = $request->input('state');
            $temporary->zip = $request->input('zip');
            $temporary->company = $request->input('company');
            $temporary->phone = $request->input('phone');
            $temporary->city = $request->input('city');
            $temporary->country = $request->input('country');
            $temporary->address = $request->input('address');
            $temporary->email = auth::user()->email;
            $temporary->save();

            return redirect('/shipping_details')->with('success', 'Address Set');

        }



    }

    public function visapay(){
        $temporaryAddress = auth::user()->temporaryAddress;


            if ($temporaryAddress == !null) {
             
                $total = $this->totalweb();
                $gateway = $this->gateway();
                $token = $gateway->ClientToken()->generate();
                return view('pay')
                    ->with('token', $token)
                    ->with('total', $total);
            } else {
                return redirect('/shipping_details')->with('error', 'You dont have a shipping addresss');
            }
      
        //check if user has a temporary address 
        //token pass 
        // pass price 
        // pass designated address 
     

    }


    public function gateway()
    {
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);

        return $gateway;

    }

    public function shipping()
    {
        $temporaryAddress = auth::user()->temporaryAddress;
        return view('shipping')
            ->with('temporaryAddress', $temporaryAddress);
    }

    public function checkoutBraintree(Request $request)
    {
       
     
        $total = $this->totalweb();
//        return $cartItem;
        //        $amount = $checkoutComponent->
        $user = Auth::user();
        $gateway = $this->gateway();
        $amount = $total;
        $nonce = $request->payment_method_nonce;

        if ($user->cart == null) {
            return redirect('/cart');
        }
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);
        // dd($result);
        //shippingAmount
        /// || !is_null($result->transaction)
        if ($result->success) {
            $transaction = $result->transaction;
            $cart = $user->cart;
            // dd($transaction);
            $temporaryAddress = auth::user()->temporaryAddress;
            $delivery = new delivery();
            $delivery->user_id = Auth::id();
            $delivery->address = $temporaryAddress->address;
            $delivery->company = $temporaryAddress->company;
            $delivery->phone = $temporaryAddress->phone;
            $delivery->firstname = $temporaryAddress->firstname;
            $delivery->lastname = $temporaryAddress->lastname;
            $delivery->city = $temporaryAddress->city;
            $delivery->state = $temporaryAddress->state;
            $delivery->transaction_ref = $transaction->id;
            $delivery->country = $temporaryAddress->country;
            $delivery->save();
            $fetchdelivery = delivery::where('transaction_ref', $transaction->id)->first();

            //begin orders
            $order = new orders();
            $order->user_id = Auth::id();
            $order->delivery_id = $fetchdelivery->id;
            $order->transaction_ref = $transaction->id;
            $order->paymentStatus = $transaction->status;
            $order->status = 'ordered';
            $order->save();

            $orderSaved = $order;
            $order_items = $user->cart->cart_items ;
            foreach ($order_items as $item) {
                $order_item = new order_items();
                $order_item->quantity = $item->quantity;
                $order_item->status = 'ordered';
                $order_item->price = $item->product['price'];
                $order_item->product_id = $item->product_id;
                $order_item->order_id = $orderSaved->id;
                $order_item->save();
          
            }
        
       

        
            foreach ($order_items as $item) {
                $productOriginalQuantity = $item->product->quantity;
                //Subtract quantity
                $product = product::findOrFail($item->product->id);
                $product->update([
                    'quantity' => $productOriginalQuantity - $item->quantity,
                ]);
            }
           


            $cart->delete();


            return redirect('/home')->with('success', 'Transaction Successful: The Transaction Reference is' . $transaction->id);

        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('An Error Occurred', $result->message);

        }

    }
}


