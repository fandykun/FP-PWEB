{{-- Hide by default. When button is clicked, this div is called. --}}
<div class="mycontent" style="display:none;">
    <?php $sum = 0; $count=0;?>  
    <div class="card-rows"> 
        @guest
            <h6>You aren't logged in.</h6>
        @else
            <?php $carts = auth()->user()->cart?>
            {{-- OPTIONAL: Cleanup style maybe with css file --}}
            @foreach($carts as $cart)
                <?php
                    $product = $cart->product;
                    $count = $count + $cart->quantity;
                    $sum += $cart->quantity*$product->price;
                ?>
                <div class="card">
                    <table class="table">
                        <tr>
                            <td><img src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->productName}}" class="card-img-top cart-img"></td>
                            <td class="mx0">
                                <h6 class="card-title" style="max-width:100px">{{$product->productName}}</h6>
                                <p class="d-flex rightflex text-muted">x{{$cart->quantity}}</p>
                                <p class="d-flex rightflex">Rp. {{$product->price * $cart->quantity}}</p>
                            </td>
                        </tr>
                    </table>
                    <form action="/cart/{{$cart->id}}" method="post">
                        @csrf
                        @method('DELETE')

                        <div class="input-group">
                            <button type="submit" class="btn btn-danger btn-block">Remove Cart</button>
                        </div>

                    </form>
                </div>
            @endforeach
                <p class="text-muted d-flex rightflex">Total item :{{$count}}</p>
                <p class="d-flex rightflex">Total Price :Rp. {{$sum}},-</p>
        @endguest
    </div>
    <div>
        @guest
            <br>
            <a class="btn btn-primary centered" href="{{ route('login') }}">{{ __('Login') }}</a>
        @else
            <button class="my-2 btn btn-primary centered">Check Out</button>
        @endguest
    </div>
</div>