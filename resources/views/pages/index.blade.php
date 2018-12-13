@extends('layouts.base')

@section('content')
    @if (!Auth::guest())
        @if(Auth::user()->name == 'Admin' || Auth::user()->email == 'felix@fpradipt.com')
            <a href="/product/create" class="btn btn-warning my-3">Create Product</a>
        @endif
    @endif
    <div class="card-deck">
        @foreach($products as $product)
            <div class="card">
                <img src="" alt="temporary-image" class="card-img-top">
                <div class="card-body">
                    {{-- Jangan lupa pake foreach --}}
                    
                    <h4 class="card-title">{{$product->title}}</h4>
                    <p class="card-text">{{$product->description}}</p>  
                </div>
                <div class="card-footer">
                    {{-- Href masih belum fix --}}
                    <a href="/product/{{$product->id}}" class="btn btn-success my-2 my-sm-0"></a>
                    {{-- Tambah button untuk cart tanpa harus visit show product --}}
                </div>
            </div>
        @endforeach
    </div>



@endsection