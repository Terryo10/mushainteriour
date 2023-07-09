@extends('layouts.front')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card" >
                    <img src="/upload/{{$product->imagePath}}" class="card-img-top" alt="...">
                    <div class="card-body">

                        <div class="product-details">
                            <div class="ratings-container">

                            </div><!-- End .product-container -->
                            <h2 class="product-title">
                            <a href="#">{{$product->name}}</a>
                            </h2>
                            @if($product->quantity > 0)
                                <h3 class="product-title">
                            <a href="#"> ({{$product->quantity}})products in stock</a>
                            </h3>
                            @else
                            <h3 class="product-title">
                            <a href="#">Out of Stock</a>
                            </h3>
                            @endif

                            <div class="price-box">
                            <span class="product-price">${{$product->price}}</span>
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                        <div class="product-action">
                            

                       </div>
                    
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                <h2 class="h1-responsive font-weight-bold text-center my-4">Place Order For {{$product->name}} here</h2>
                <form action="{{route('place.order')}}" method="POST">
                    @csrf
                    <input type="name" name="name" class="form-control" placeholder="Full Name" required>
                    <br>
                    <input type="tel" name="phone" class="form-control" placeholder="Your Phone Number" required>
                    <br>
                    <input type="number" max="300" name="quantity" class="form-control" placeholder="Enter Quantity of items" required>
                    <br>
                    <textarea class="form-control" name="info" placeholder="Type additional info" rows="3"></textarea>
                    <br>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="text-center">
                        <button type="submit" class="btn-lg btn-success">Place Your Order</button>
                    </div>
                    
                </form>   
                </div>
               
            </div>
        </div>
        
    </div>
@endsection