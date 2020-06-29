@extends('layouts.front')
@section('content')
<div class="container">
                       <div class="row row-sm product-ajax-grid">
							@foreach ($products as $item)
                            <div class="col-6 col-md-4">
                                <div class="product-default">
                                    <figure >

										<a href="/product/{{$item->id}}">
                                            <img style="" src="/storage/product_images/{{$item->imagePath}}">
                                        </a>


                                    </figure>
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
                                        <div class="product-action">
											 <form  method="post" action="{{route('savetocart')}}" >
                               					 @csrf
													<div>

													<div class="product-single-qty">
													<div class="input-group">
                                                    	<span class="input-group-btn">
																<button onclick="decrement({{$item->id}})" type="button" class="quantity-left-minus btn btn-dark btn-number"  data-type="minus" data-field="">
															-
																</button>
															</span>
													
														<input type="number" id="quantity{{$item->id}}" name="quantity" class="" value="1"s min="1" max="100" required="">
															<span class="input-group-btn">
																<button onclick="increment({{$item->id}})" type="button" class="quantity-right-plus btn btn-primary btn-number" data-type="plus" data-field="">
																	+
																</button>
														</span>
													</div>
                        							</div>
														{{-- <input name="quantity" type="number" value="1" min="1" max="100"> --}}
														<input type="hidden" value="{{$item->price}}" name="price" >
														<input type="hidden" value="{{$item->id}}" name="product_id">
													</div><br>

                            						<div class="emply-btns">

                                					<button type="submit" class="btn btn-dark"><i class="icon-bag"></i>ADD TO CART</button>
                            						</div>

                            						</form>

                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
							</div>
							@endforeach

                        </div>
</div>

@endsection