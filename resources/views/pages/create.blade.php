@extends('layouts.base')

@section('content')
    {{-- TODO:Fix form layout --}}
    {{-- https://getbootstrap.com/docs/4.1/components/forms/#form-row --}}
    <form action="/product" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="productName">Product</label>
            <input type="text" name="productName" id="productName" class="form-control mb-2" required>

            <label for="categoryName">Category</label>
            <select name="categoryName" class="form-control" id="categoryName" required>
                <option selected>Pick Category </option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <textarea name="description" class="form-control" id="desc" cols="30" rows="10" placeholder="Enter Description of Product"></textarea>
        </div>

        <div class="form-group">
            <label for="priceProduct">Price</label>
            <input type="text" name="priceProduct" class="form-control mb-2" id="priceProduct" required>

            <label for="stockProduct">Stock Available</label>
            <input type="text" name="stockProduct" class="form-control" id="stockProduct" required>
        </div>

        <div class="form-group">
            <label for="coverProduct">Product Image</label>
            <input type="file" name="coverProduct" class="form-control-file mb-3" id="coverProduct">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            {{-- <a href="/" class="btn btn-outline-warning mx-2">Cancel</a> --}}
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    </form>



@endsection