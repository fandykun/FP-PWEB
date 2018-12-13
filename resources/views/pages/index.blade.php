@extends('layouts.base')

@section('content')
    @if (!Auth::guest())
        @if(Auth::user()->name == 'Admin' || Auth::user()->email == 'felix@fpradipt.com')
            <a href="/product/create" class="btn btn-warning my-3">Create Product</a>
        @endif
    @endif
    <div class="card-columns">
        @foreach($products as $product)
        
            <div class="card">
                <a href="/product/{{$product->id}}">
                    <img src="/storage/coverProducts/noimage.jpg" alt="temporary-image" class="card-img-top">
                    <div class="card-body">
                        {{-- Jangan lupa pake foreach --}}
                        
                        <h4 class="card-title text-dark">{{$product->title}}</h4>
                        <p class="card-text text-dark">{{$product->description}}</p>  
                    </div>
                </a>
                
                <div class="card-footer">
                    {{-- Href masih belum fix --}}
                    {{-- <a href="/transaction/{{$transaction->id}}" class="btn btn-success my-2 my-sm-0">Buy</a> --}}
                    {{-- Tambah button untuk buy (redirect ke transaksi) tanpa harus visit show product --}}
                    <h4 class="card-text text-dark">Rp {{$product->price}}</h4>
                </div>
            </div>
        @endforeach
    </div>



@endsection