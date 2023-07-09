@extends('layouts.front')
@section('content')
  
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 font-weight-normal">Get To Know More !!</h1>
      <p class="lead font-weight-normal">ABOUT US</p>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>
   <!-- Wrap the rest of the page in another container to center all the content. -->

   <div class="container marketing">

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    @foreach ($sections as $section)
    
  
    <div class="row featurette">
      <div class="col-md-7">
      <h2 class="featurette-heading">{{$section->heading_dark}} <span class="text-muted">{{$section->heading_grey}}</span></h2>
        <p class="lead">{!!$section->body!!} </p>
    </div>
      <div class="col-md-5">
      <img class="img-fluid" src="/upload/{{$section->image_path}}" style="width:500; height:500;"> 
      </div>
    </div>

    <hr class="featurette-divider">
    @endforeach

    <!-- /END THE FEATURETTES -->

    
    <!-- Three columns of text below the carousel -->
    <div class="row">
      @foreach ($team as $team)
      <div class="col-lg-4">
      <img class="img-thumbnail" src="/upload/{{$team->image_path}}" >
          <h2>
            {{$team->title}}
            </h2>
          <p>{{$team->name}} </p>
  
        </div><!-- /.col-lg-4 -->
      @endforeach
        
       
       
      </div><!-- /.row -->

  </div><!-- /.container -->

  
@endsection