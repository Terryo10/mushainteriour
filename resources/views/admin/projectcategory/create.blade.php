@extends('layouts.adminlay')
@section('content')
  <!-- Forms-2 -->
  <div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4">Create project category Form</h4>
    <form action="{{ route('projects_cat.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" name="name" placeholder="name" required="">
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection