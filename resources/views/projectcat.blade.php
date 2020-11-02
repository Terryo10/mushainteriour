@extends('layouts.front')
@section('content')
<br>
<div class="container">
  <div class="row">
@foreach ($projects as $project)

<div class="col-md-4">
  <div class="card" style="width: 18rem;">
    <img src="/storage/{{$project->imagePath}}" class="card-img-top" alt="...">
    <div class="card-body">
    <h2>{{$project->name}}</h2>
    <p class="card-text">{{$project->description}}</p>
    </div>
  </div>
</div>


@endforeach
</div>
</div>

@endsection