@extends('layouts.base')

@section('content')
    <form action="/product/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="productName">Product</label>
            <input type="text" name="productName" id="productName" class="form-control mb-2" value="{{$product->productName}}" required>

            <label for="categoryName">Category</label>
            <select name="categoryName" class="form-control" id="categoryName" required>
                {{-- <option selected>{{$categoryProd->name}}</option> --}}
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <textarea name="description" class="form-control" id="desc" cols="30" rows="10" placeholder="Enter Description of Product">{{$product->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="priceProduct">Price</label>
            <input type="text" name="priceProduct" class="form-control mb-2" id="priceProduct" value="{{$product->price}}" required>

            <label for="stockProduct">Stock Available</label>
            <input type="text" name="stockProduct" class="form-control" id="stockProduct" value="{{$product->stock}}" required>
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

    <form action="/product/{{$product->id}}">
        @csrf
        @method('DELETE')

        <button class="btn btn-md btn-danger" type="submit">Delete Product</button>
    </form>
@endsection