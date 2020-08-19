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

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Musha<span class="text-muted"> Interior.</span></h2>
        <p class="lead">  is a 100% women owned and established company committed to professional excellence and value addition in delivery of full-service interior design solutions to a broad spectrum of clients including those in residential, commercial and hospitality environments</p>
    <p class="lead">Most environments do not speak a story of what they entail and who they belong to. Consequently, there is a standard look in many living spaces whether home, store or office showing a lack within personal interpretations and expressions of spaces. Musha Interior as an integral part of the design and development team, seeks to bridge the gap between a space that simply delivers its function and one with the right opulence and style making it comfortable to a level that will inspire those experiencing the environments. </p>  
    </div>
      <div class="col-md-5">
        <img src="{{asset('pics/nice.jpg')}}" style="width:500; height:500;"> 
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-6 order-md-3">
        <h2 class="featurette-heading">Vision  <span class="text-muted">Redefining Interior Design </span></h2>
        <p class="lead"> redefine Interior Design. We seek to drift  away from the standard and monotonous  way of decorating through incorporating “the best of both worlds”. To harness our deep creative resources, the highest caliber trade professionals and artisans.</p>
        <p class="lead">Maintaining the uses and purposes of spaces whilst incorporating  their personal styles and preferences . We seek to be an organization that brings chic pieces and spaces to life  through the incorporation of our local talent and a few imported items. We further seek to export our products and pieces to other countries in-order to showcase the local talent and to also have a little bit of Zimbabwe in a foreign space. </p>
    </div>
    <div class="col-md-1 order-md-2">
      <span></span>
    </div>
      <div class="col-md-5 order-md-1">
      <img src="{{asset('pics/mushaint.jpg')}}" style="width:500; height:500;"> 
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading"> Mission  <span class="text-muted"></span></h2>
        <p class="lead"><i class="fa fa-pencil-alt"></i>
                To change the face of interior design within the country through using our expertise to give projects an undeniable touch of luxury. 
        </p>
        <p class="lead"><i class="fa fa-pencil-alt"></i>
            To showcase our   innovative and stunning solutions for any home and commercial project.   
        </p>
        <p class="lead"><i class="fa fa-pencil-alt"></i>
           To fully utilize and appreciate the redundant spaces.
        </p>
        <p class="lead"><i class="fa fa-pencil-alt"></i>
            To positively Influence the lives our our customers
        </p>
          </div>
      <div class="col-md-5">
        <img src="{{asset('pics/lol.jpg')}}" style="width:500; height:500;"> 
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

    
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
        <img class="img-thumbnail" src="{{asset('pics/ghy.png')}}" >
          <h2>
            Founder & Senior Designer 
            </h2>
          <p>Sharleen Gapare </p>
  
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-thumbnail" src="{{asset('pics/ghy1.png')}}" >
          <h2>     
            Marketing and Operations Manager    
            </h2>
          <p>Fadzai Gunda  </p>
         
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-thumbnail" src="{{asset('pics/ghy2.png')}}" >
          <h2> 
            Finance Director 
            </h2>
          <p>Miriam Gapare</p>
  
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

  </div><!-- /.container -->

  
@endsection