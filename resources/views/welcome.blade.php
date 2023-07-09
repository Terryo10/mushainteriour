@extends('layouts.front')
@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($slide as $key => $slidePicture)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="/upload/{{ $slidePicture->imagePath }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color: #fff;">{{ $slidePicture->title }}</h5>
                        <p>{{ $slidePicture->title2 }}</p>
                        <p>{{ $slidePicture->title3 }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @if (!$sections->isEmpty())
        <br>
        <br>
    @endif

    <div class="container">
        @foreach ($sections as $section)
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">{{ $section->heading_dark }} <span
                            class="text-muted">{{ $section->heading_grey }}</span></h2>
                    <p class="lead">{!! $section->body !!} </p>
                </div>
                <div class="col-md-5">
                    <img class="img-fluid" src="/upload/{{ $section->image_path }}" style="width:500; height:500;">
                </div>
            </div>
            <br>
              @endforeach
    </div>
    @if (!$sections->isEmpty())
        <br>
        <br>
    @endif
  
@endsection
