@extends('layouts.adminlay')
@section('content')
 <!-- main-heading -->
 <h2 class="main-title-w3layouts mb-2 text-center">Projects</h2>
 <!--// main-heading -->
     <ul class="prof-widgt-content">
                 <li class="menu">
                     <ul>
                         <li class="button">
                             <a href="#">
                                 <i class="fas fa-envelope"></i> Project ACTIONS
                             </a>
                         </li>
                         <li class="dropdown">
                             <ul class="icon-navigation">
                                 <li>
                                     <a href="/projects_cat/create">Create New Project category
                                         <span class="float-right"></span>
                                     </a>
                                 </li>
                                 <li>
                                    <a href="/projects/create">Create New Project
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
         <h4 class="tittle-w3-agileits mb-4">all Projects</h4>
         <table class="table table-striped">
             <thead>
                 <tr>
                     <th scope="col">Project Name</th>
                    <th>Image</th>
                      <th scope="col">Action</th>
                      <th>Action</th>
                      
                                               </tr>
             </thead>
             <tbody>
                 @foreach ($project as $items)
                 <tr>
                 <th scope="row">{{$items->name}} </th>
                 <th scope="row"><img src="/storage/project_images/{{$items->imagePath}}" height="50px"></th>
                 <th><a><button class="btn btn-success"> view</button></a></th>
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