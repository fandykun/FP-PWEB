@extends('layouts.base')


@section('content')

    <?php
        $user = auth()->user();
        $carts = $user->cart;
        $total = 0;
    ?>
    @foreach ($carts as $cart)
        <?php 
            $product = $cart->product*$cart->quantity; 
            $total += $product->price;
        ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$product->productName}}</h4>
                        <p class="card-text">{{$user->phoneNumber}}</p>
                        <p class="card-text">{{$user->address}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/dashboard/{{$user->id}}/edit/#address" class="card-link">Edit Address</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Summary</h4>
                        <p class="card-text">Total Price: Rp {{$total}}</p>
                    </div>
                    <div class="card-footer">
                        <form action="/transaction/" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button class="btn btn-primary" type="submit">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
@endsection