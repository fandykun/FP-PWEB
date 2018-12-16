@extends('layouts.base')

@section('content')
    @if (!Auth::guest())
        @if(Auth::user()->name == 'Admin' || Auth::user()->email == 'felix@fpradipt.com')
            <a href="/product/{{$product->id}}/edit" class="btn btn-warning my-3">Edit Product</a>
        @endif
    @endif

    <div class="card-columns">
        <div class="card shadow-sm">
            <img class="card-img-top" src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->name}}">
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title font-italic">{{$product->productName}}</h3>
                <p class="card-text">{{$product->description}}</p>
            </div>
        </div>
        @include('buttons.addcart')
    </div>    


@endsection