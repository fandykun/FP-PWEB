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

    <div class="container mt-3">
        <div class="row">
            <div class="card-deck">
                {{-- OPTIONAL: Cleanup style maybe with css file --}}
                @foreach($products as $product)
                    <div class="card mb-4" style="min-width: 15rem; max-width: 15rem;">
                        <a href="/product/{{$product->id}}" style="text-decoration:none;" id="link-product-page"> 
                        <img class="card-img-top" src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->productName}}">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{$product->productName}}</h5>
                            <p class="card-text text-dark text-truncate" style="max-width:200px">{{$product->description}}</p>  
                        </div>
                        <div class="card-footer">
                                <h4 class="card-text text-dark">Rp {{$product->price}}</h4>
                                @guest
                                @else
                                    @include('buttons.cart')
                                @endguest
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection