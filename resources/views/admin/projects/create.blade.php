@extends('layouts.adminlay')
@section('content')

      <!-- Forms-2 -->
      <div class="outer-w3-agile col-xl mt-3">
        <h4 class="tittle-w3-agileits mb-4">Create Subcategory Form</h4>
        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="name" class="form-control" id="exampleFormControlInput1" name="name" placeholder="name" required="">
            </div>

            <div class="form-group">
                <div align="center">
                    <input type="text" name="search" id="search" class="form-control"  placeholder="search"/>
                </div>
                <label for="exampleFormControlSelect2">Category Select</label>
                <select name="category_id" multiple class="form-control" id="exampleFormControlSelect2">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <textarea rows="5" type="text" class="form-control" id="exampleFormControlInput1" name="description" placeholder="Description" required=""></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Upload File</label>
                <input type="file" name="image"class="form-control" id="exampleFormControlTextarea1"  required="">
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection