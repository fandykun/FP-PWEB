@extends('layouts.base')

@section('content')

@foreach ($details as $product)
<div class="card-columns">
    <div class="card shadow-sm">
        <img class="card-img-top" src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->name}}">
    </div>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title font-italic text-truncate">{{$product->productName}}</h3>
            <p class="card-text">{{$product->description}}</p>
        </div>
    </div>
    @include('buttons.addcart')
</div>
@endforeach

@endsection