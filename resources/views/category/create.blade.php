@extends('layouts.base')

@section('content')
    <form action="/category" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="categoryName">Category Title</label>
            <input type="text" name="name" class="form-control" id="categoryName" placeholder="What category?" required>
        </div>

        <div class="form-group">
            <label for="categoryCover">Category Cover Image</label>
            <input type="file" name="coverCategory" class="form-control-file" id="categoryCover">
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Submit</button>
            <a href="/category" class="btn btn-outline-success">Back</a>
        </div>
    </form>
@endsection