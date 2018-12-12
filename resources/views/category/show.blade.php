@extends('layouts.base')

@section('content')
    @if (!Auth::guest())
        @if(Auth::user()->name == 'Admin' || Auth::user()->email == 'felix@fpradipt.com')
            <a href="/category/{{$categories->id}}/edit" class="btn btn-warning my-3">Edit Category</a>
            <form action="/category/{{$categories->id}}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        @endif
    @endif
    <a href="/category" class="float-right btn btn-outline-success">Back</a>
    <h3>{{$categories->name}}</h3>

    <div class="card-deck">
        @foreach ($products as $product)
            <div class="card">
                {{-- TODO:Add product image --}}
                <div class="card-body">
                    <h4 class="card-title">{{$product->productName}}</h4>
                    <p class="card-text">{{$product->description}}</p>
                </div>
                <div class="card-footer">
                    <h4>Price</h4>
                    <p>Rp {{$product->price}}</p>
                    <h5>Stock Available:</h5>
                    <p class="text-muted">{{$product->stock}}</p>
                    {{-- TODO:Fix link --}}
                    <a href="/product/{{$product->id}}" class="btn btn-primary">Buy</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection