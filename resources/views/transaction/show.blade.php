@extends('layouts.base')


@section('content')

    <?php
        $user = auth()->user();
        $carts = $user->cart;
        $total = 0;
    ?>
    
    
    <div class="row my-3">
        <div class="col-md-12">
            {{-- Untuk card address --}}
        </div>
    </div>
    <div class="row my-3">
        @foreach ($carts as $cart)
        <div class="col-md-6 ">
            
                <?php 
                    $product = $cart->product; 
                    $total += $product->price*$cart->quantity;
                ?>
                
                <div class="card bg-light shadow">
                    <a href="/product/{{$product->id}}" style="text-decoration:none; font-style: italic;">
                        <img src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->productName}}" class="card-img-top">
                        <div class="card-body">
                            
                            <h4 class="card-title text-center mt-2">{{$product->productName}}</h4>
                            <p class="card-text text-center">Price: Rp {{$product->price}}</p>
                            {{-- Tambahkan counter product --}}
                        </div>
                    </a>
                </div>
            
        </div>
        @endforeach
    </div>
    
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title" style="font-style: italic;">Summary Cart</h3>
                    <p class="card-text">Total Price: Rp {{$total}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection