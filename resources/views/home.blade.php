@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            @if ($orders->count() == 0)
        <div class="alert alert-success">
            <p>You have no orders yet <a href="shop">click here to start shopping</a></p>
        </div>
        @endif
            @foreach ($orders as $items )
                 <div class="card">
                 <div class="card-header">Order id : {{$items->id}} & Order Transaction Ref ({{$items->transaction_ref}})</div>

                <div class="card-body">
                   @foreach ($items->order_items as $lols)
                   <div class="uk-width-auto">
                    <img class="uk-comment-avatar uk-border-circle" src="/storage/product_images/{{$lols->product['imagePath']}}" width="50" height="50" alt="Product Image">
                  </div>
                  <br>
                  <div>
                <p>  {{$lols->product['name']}}   X{{$lols->quantity}}   For ${{$lols->product->price}}</p>
                  </div>

                   @endforeach
                </div>
            </div>
            <br>
            @endforeach
           
        </div>
    </div>
</div>
@endsection
