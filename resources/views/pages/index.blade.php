@extends('layouts.base')

@section('content')
    
    <div class="card-deck">
        @foreach($products as $product)
            <div class="card">
                <img src="" alt="temporary-image" class="card-img-top">
                <div class="card-body">
                    {{-- $product->title --}}
                    <h4 class="card-title">One</h4>
                    {{-- $product->description --}}
                    <p class="card-text">Product One. Product One. Product One</p>
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