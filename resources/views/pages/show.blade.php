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

        {{-- Masih belum fix redirect ke transaksi atau cart --}}
        <a href="/transaction/{{$product->id}}" class="mt-2 btn btn-outline-primary shadow d-flex flex-fill justify-content-center">Buy</a>
    </div>    


@endsection