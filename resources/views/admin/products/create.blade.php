@extends('layouts.adminlay')
@section('content')
<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Create Product</h2>
            <!--// main-heading -->
                <!-- Forms-2 -->
                        <div class="outer-w3-agile col-xl mt-3">
                            <h4 class="tittle-w3-agileits mb-4">Form Controls</h4>
                            <form action="{{route('products.store')}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Product Name</label>
                                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" required=""> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2"> Category select</label>
                                    <select name="category_id" multiple class="form-control" id="exampleFormControlSelect2" required="">
                                       @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                       @endforeach

                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Price</label>
                                    <input type="number" min="0.00" max="10000.00" step="0.01" name="price" class="form-control" id="exampleFormControlInput1" placeholder="" required=""> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Quantity In Stock</label>
                                    <input type="number" name="qty" class="form-control" id="exampleFormControlInput1" placeholder="" required=""> 
                                </div>
                                <br>
                                 <label for="exampleFormControlInput1">Product Face Image</label>
                                 <br>
                                <div class="control-group input-group" style="margin-top:10px">
                                   
                                  <input type="file" name="firstImage" id="fileToUpload">
                                  
                                </div>
                                
                               
                             
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea name="description"class="form-control" id="exampleFormControlTextarea1" rows="3" required=""></textarea>
                                </div>
                                <br>
                               
                              
                                <div>
                                <button type="submit" class="btn btn-primary">Submit to system</button>
                                </div>
                           

                                
                            </form>
                        </div>
                        <!--// Forms-2 -->



@endsection