@extends('layouts.base')

@section('content')
    <form action="/category" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="categoryName">Category Title</label>
            <input type="text" name="name" class="form-control" id="categoryName" placeholder="What category?" value="{{$category->name}}" required>
        </div>

        <div class="form-group">
            <label for="categoryCover">Category Cover Image</label>
            <input type="file" name="coverCategory" class="form-control-file" id="categoryCover">
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>

    </form>
    
@endsection