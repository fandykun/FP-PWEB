@extends('layouts.base')

@section('content')
    @if (!Auth::guest())
        @if(Auth::user()->name == 'Admin' || Auth::user()->email == 'felix@fpradipt.com')
            <a href="/product/create" class="btn btn-warning my-3">Create Product</a>
        @endif
    @endif

    {{-- <div class="carousel slide my-4" data-ride="carousel" id="carouselProduct">
        <ol class="carousel-indicators">
            <li data-target="#carouselProduct" data-slide-to="0" class="active"></li>
            @for($i = 1; $i < count($products); $i++)
                <li data-target="#carouselProduct" data-slide-to="{{$i}}"></li>
            @endfor
        </ol>
            
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/storage/coverProducts/{{$products[0]->coverProducts}}" alt="{{$products[0]->productName}}" class="d-block" style="height:50%; width:50%; background-size:100%;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$products[0]->productName}}</h5>
                    <p>{{$products[0]->description}}</p>
                </div>
            </div>
            @foreach ($products as $product)
                <div class="carousel-item">
                    <img src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->productName}}" class="d-block"  style="height:50%; width:50%; background-size:100%;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$product->productName}}</h5>
                        <p>{{$product->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>

         <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#carouselProduct" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carouselProduct" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div> --}}
    
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
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/transaction/{{$product->id}}" class="mt-2 mx-2 btn btn-outline-primary btn-block rounded-left">Buy</a>
                                        @include('buttons.cart')
                                    </div>
                                @endguest
                            </div>
        
                    </div>
                @endforeach
            </div>
        </div>
    </div>



@endsection