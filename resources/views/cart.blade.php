@extends('layouts.front')
@section('content')



<div class="uk-section uk-section-default">
  <div class="container">
    <div class="uk-grid-large" data-uk-grid>
      <div class="uk-width-expand@m">
        <div class="uk-article">
        <br>
        <h3>{{auth()->user()->name}}'s Shopping Cart</h3>
          <div id="step-1" class="uk-grid-small uk-margin-medium-top" data-uk-grid>
        <div class="row">
        <div class="col-md-8">
         @isset($cart_items)
              @forelse ($cart_items as $items)
                  <div class="comment-box">
                <div class="comment">
                 <article class="uk-comment uk-visible-toggle" tabindex="-1">
                <header class="uk-comment-header uk-position-relative">
                  <div class="uk-grid-medium uk-flex-middle" data-uk-grid>
                    <div class="uk-width-auto">
                      <img class="uk-comment-avatar uk-border-circle" src="/storage/product_images/{{$items->product['imagePath']}}" width="50" height="50" alt="Product Image">
                    </div>
                    <div class="uk-width-expand">
                      <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">{{$items->product['title']}}</a></h4>
                    <p class="uk-comment-meta uk-margin-remove"><a class="uk-link-reset" href="#">${{$items['product']->price}} x {{$items->quantity}} Items</a></p>
                     
                    </div>
                  </div>
                  <div class="uk-position-top-right uk-position-small uk-hidden-hover">
                  </div>
                </header>
                                      
                                        
                                        <form action="/cart/delete" method="get">
                                            @csrf
                                            <input class="form-control" type="hidden" value="{{$items->id}}" name="cart_item_id">
                                            <button class="btn btn-danger" value="delete " type="submit">Remove Product from Cart</button>
                                        </form>

                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-warning">
                                    Empty
                                </div>
              @endforelse
            @endisset 
        </div>
        <div class="col-md-4">
        
        <div class="uk-width-1-3@m">
        <h3>Select Payment Method</h3>
        <ul class="uk-list uk-list-large uk-list-divider uk-margin-medium-top">
          <li>Total Price USD :$ {{$total}}</li>
           @if(!empty($cart_items))
         <li>
         <a href="/paypal_visa"><div class="uk-width-1-1 uk-width-auto@s">
                <input type="submit" value="Checkout via PAYPAL | MASTERCARD | VISA" class="btn btn-dark">
              </div>
            </a>
        </li>
        <br>
           @else
<li><a href="/shop"><div class="uk-width-1-1 uk-width-auto@s">
                <input value="CONTINUE SHOPPING" class="uk-button uk-button-large uk-button-warning">
              </div>
            </a>
        </li>
           @endif
          
          
        </ul>
      
      </div>
        </div>
        </div>
          

           
             
              
          </div>
         
          <hr class="uk-margin-medium-top uk-margin-large-bottom">
          
        </div>
      </div>
      
    </div>
  </div>
</div>


@endsection