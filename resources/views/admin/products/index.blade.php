@extends('layouts.adminlay')
@section('content')
 <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">Products</h2>
            <!--// main-heading -->
                <ul class="prof-widgt-content">
                            <li class="menu">
                                <ul>
                                    <li class="button">
                                        <a href="#">
                                            <i class="fas fa-envelope"></i> PRODUCT ACTIONS
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <ul class="icon-navigation">
                                            <li>
                                                <a href="/products/create">Create New Product
                                                    <span class="float-right"></span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                            <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">all Products</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                               <th>Image</th>
                               <th>Price</th>
                                 <th scope="col">Action</th>
                                 <th scope="col">Action</th>
                               
                                 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $items)
                            <tr>
                            <th scope="row">{{$items->name}}</th>
                            <th><img class="card-img-top"  style="height:100px; width:100px;" src="/storage/product_images/{{$items->imagePath}}" alt="Card image cap"></th>
                              <th>${{$items->price}}</th>
                            <td><a href="/product/{{$items->id}}"><button  class="btn btn-success" >View </button></a></td>
                            <td>
                            <form class="delete_form" method="POST" action="{{action('ProductController@destroy',$items->id)}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" >Delete </button>
                                </form>
                            </td>

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--// table3 -->

  

                <script>
                    $(document).ready(function(){

                         $('.delete_form').on ('submit', function(){
                    if(confirm("are you sure you want to delete it ?"))
                    {
                        return true;
                    }
                    else{
                        return false;
                    }
                });

                    });
               
                </script>
                  @endsection