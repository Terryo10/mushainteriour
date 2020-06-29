<?php

namespace App\Http\Controllers;

use App\product;
use App\category;
use Image;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('admin.products.index')
        ->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.products.create')
        ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstImage' => 'required',
            'firstImage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //Handle Images Uploads
        if ($request->hasFile('firstImage')) {
            //append file to variable
            $image = $request->file('firstImage');
            //Get filename with extension
            $filenameWithExt = $image->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Getting file extension
            $extension = $image->getCLientOriginalExtension();
            //Stored name
            // $hashedName = hash_file('md5', $image->path());
            $malobolo = $filename . '_' . time() . '_.' . $extension;
            //Uploading Thumbnail and resizing

            $img = Image::make($image)->resize(250, 250)->encode('jpg');
            //    ->save(public_path('/product_images'.$malobolo
            //    Storage::disk('local')->putFile('/product_images'.'/'.$malobolo, $img);
            Storage::put('/public/product_images' . '/' . $malobolo, $img->__toString());

        } else {
            $malobolo = 'noimage.jpg';
        }
        $user = auth::user()->id;
        $product = new product;
        $product->name = $request->input('name');
        $product->imagePath = $malobolo;
        $product->price = $request->input('price');
        $product->quantity = $request->input('qty');
        $product->description = $request->input('description');
        $product->user_id = $user;
        $product->category_id = $request->input('category_id');
        $product->save();
        return redirect('/products')->with('success', 'Product Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
