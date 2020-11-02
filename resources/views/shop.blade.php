@extends('layouts.front')
@section('content')
<div class="container">
	
                       <div class="row row-sm product-ajax-grid">
							@foreach ($products as $item)
                            <div class="col-6 col-md-4">
								<div class="card" style="width: 18rem;">
									<img src="/storage/{{$item->imagePath}}" class="card-img-top" alt="...">
									<div class="card-body">

										<div class="product-details">
											<div class="ratings-container">
	
											</div><!-- End .product-container -->
											<h2 class="product-title">
											<a href="/product/{{$item->id}}">{{$item->name}}</a>
											</h2>
											@if($item->quantity > 0)
												<h3 class="product-title">
											<a href=""> ({{$item->quantity}})products in stock</a>
											</h3>
											@else
											<h3 class="product-title">
											<a href="">Out of Stock</a>
											</h3>
											@endif
	
											<div class="price-box">
											<span class="product-price">${{$item->price}}</span>
											</div><!-- End .price-box -->
										</div><!-- End .product-details -->
										<div class="product-action">
											

									   </div>
									   <a href="/product/{{$item->id}}">
									   <button   class="btn btn-dark"><i class="icon-bag"></i>PLACE ORDER</button>
									   </a>
									</div>
								  </div>
							</div>
							@endforeach

                        </div>
</div>

@endsection