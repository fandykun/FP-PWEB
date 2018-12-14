@extends('layouts.base')

@section('content')
    @if (!Auth::guest())
        @if(Auth::user()->name == 'Admin' || Auth::user()->email == 'felix@fpradipt.com')
            <a href="/product/create" class="btn btn-warning my-3">Create Product</a>
        @endif
    @endif
    <div class="card-columns">
        @foreach($products as $product)
            {{-- OPTIONAL: Cleanup style maybe with css file --}}
            <a href="/product/{{$product->id}}" style="text-decoration:none;" id="link-product-page"> 
                <div class="card">
                    <img src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->productName}}" class="card-img-top">
                   
                    <div class="card-body">
                        <h4 class="card-title text-dark">{{$product->productName}}</h4>
                        <p class="card-text text-dark">{{$product->description}}</p>  
                    </div>
                
                    <div class="card-footer">
                        <h4 class="card-text text-dark">Rp {{$product->price}}</h4>
                        {{-- Href masih belum fix --}}
                        {{-- <a href="/transaction/{{$transaction->id}}" class="btn btn-success my-2 my-sm-0">Buy</a> --}}
                        {{-- Tambah button untuk buy (redirect ke transaksi) tanpa harus visit show product --}}
                    </div>
                </div>
            </a>
        @endforeach
    </div>



@endsection