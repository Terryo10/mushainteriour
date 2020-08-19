@extends('layouts.adminlay')
@section('content')
 <!-- main-heading -->
 <h2 class="main-title-w3layouts mb-2 text-center">Project categories</h2>
 <!--// main-heading -->
     <ul class="prof-widgt-content">
                 <li class="menu">
                     <ul>
                         <li class="button">
                             <a href="#">
                                 <i class="fas fa-envelope"></i> Project category ACTIONS
                             </a>
                         </li>
                         <li class="dropdown">
                             <ul class="icon-navigation">
                                 <li>
                                     <a href="/projects_cat/create">Create New Project category
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
         <h4 class="tittle-w3-agileits mb-4"> all Project categories</h4>
         <table class="table table-striped">
             <thead>
                 <tr>
                     <th scope="col">Project Name</th>
                   
                      <th scope="col">Action</th>
                      
                                               </tr>
             </thead>
             <tbody>
                 @foreach ($projectcat as $items)
                 <tr>
                 <th scope="row">{{$items->name}}</th>
              
                 <td>
                 <form class="delete_form" method="POST" action="{{action('CategoryController@destroy',$items->id)}}">
                         @csrf
                     <input type="hidden" name="_method" value="DELETE">
                     <button type="submit" class="btn btn-danger" >DELETE </button>
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