@extends('layouts.base')


@section('content')

    <?php
        $user = auth()->user();
        $carts = $user->cart;
        $total = 0;
    ?>
    
    {{-- {{dd($user->name)}} --}}
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card bg-white shadow-sm text-center">
                <div class="card-body">
                    <h4 class="card-title text-center mt-2 font-italic">
                        {{$user->name}},
                    </h4>
                    <p class="card-title">please check your cart.</p>
                </div>
                <div class="card-footer">
                    <h5 class="card-title">Your address: </h5>
                    <p class="card-text">{{$user->address}}</p>
                    <small class="text-muted"><a href="/dashboard/#address" style="text-decoration:None;color:black; ">Edit address</a></small>
                    
                    <h5 class="card-title my-2">Your phone number: </h5>
                    <p class="card-text">{{$user->phoneNumber}}</p>
                    <small class="text-muted"><a href="/dashboard/#phoneNumber" style="text-decoration:None;color:black; ">Edit phone number</a></small>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        @foreach ($carts as $cart)
        <div class="col-md-6 ">
            
                <?php 
                    $product = $cart->product; 
                    $total += $product->price*$cart->quantity;
                ?>
                
                <div class="card bg-light shadow-sm my-2 text-center">
                    <a href="/product/{{$product->id}}" style="text-decoration:none; font-style: italic; color: black;">
                        <img src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->productName}}" class="card-img-top">
                        <div class="card-body">
                            
                            <h4 class="card-title text-center mt-2">{{$product->productName}}</h4>
                            <p class="card-text">Quantity: {{$cart->quantity}}</p>
                            <p class="card-text text-center">Price: Rp {{$product->price * $cart->quantity}}</p>
                            {{-- Tambahkan counter product --}}
                        </div>
                    </a>
                </div>
            
        </div>
        @endforeach
    </div>
    
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h3 class="card-title" style="font-style: italic;">Cart Summary</h3>
                    <p class="card-text">Total Price: Rp {{$total}}</p>
                    @if ($total===0)
                        <script>
                            window.location.replace('/');
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <a href="/transaction/create" class="btn btn-outline-success btn-lg btn-block">Pay</a>
    </div>
@endsection