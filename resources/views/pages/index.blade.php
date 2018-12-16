@extends('layouts.base')

@section('content')
    @if (!Auth::guest())
        @if(Auth::user()->name == 'Admin' || Auth::user()->email == 'felix@fpradipt.com')
            <a href="/product/create" class="btn btn-warning my-3">Create Product</a>
        @endif
    @endif

    <div class="carousel slide my-4" data-ride="carousel" id="carouselProduct">
        <ol class="carousel-indicators">
            <li data-target="#carouselProduct" data-slide-to="0" class="active"></li>
            @for($i = 1; $i < count($products); $i++)
                <li data-target="#carouselProduct" data-slide-to="{{$i}}"></li>
            @endfor
        </ol>
            
        {{-- <div class="carousel-inner">
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
        </div> --}}

         <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#carouselProduct" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carouselProduct" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div class="row">
        @foreach($products as $product)
            {{-- OPTIONAL: Cleanup style maybe with css file --}}
            <a href="/product/{{$product->id}}" style="text-decoration:none;" id="link-product-page"> 
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card">
                    <img src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->productName}}" class="card-img-top">
                   
                    <div class="card-body">
                        <h4 class="card-title text-dark" style="text-align: center;">{{$product->productName}}</h4>
                        <p class="card-text text-dark text-truncate" style="max-width:200px">{{$product->description}}</p>  
                    </div>
                
                    <div class="card-footer">
                        <h4 class="card-text text-dark">Rp {{$product->price}}</h4>
                        {{-- Href masih belum fix --}}
                        @guest
                        @else
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/transaction/{{$product->id}}" class="mt-2 btn btn-outline-primary shadow btn-block">Buy</a>
                                @include('buttons.addcart')
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
            </a>
        @endforeach
    </div>



@endsection