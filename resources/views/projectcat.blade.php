@extends('layouts.front')
@section('content')
<br>
<div class="container">
@foreach ($projects as $project)
<div class="card" style="width: 18rem;">
    <img src="/storage/project_images/{{$project->imagePath}}" class="card-img-top" alt="...">
    <div class="card-body">
    <h2>{{$project->name}}</h2>
    <p class="card-text">{{$project->description}}</p>
    </div>
  </div>
@endforeach
</div>

@endsection