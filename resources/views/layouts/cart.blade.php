<div class="mycontent" style="display:none;">
    <?php $sum = 0; $count=0;?>  
    <div class="card-rows"> 
        @guest
            <tr>
                <td>You aren't signed in.</td>
            </tr>    
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
                                <h6 class="card-title">{{$product->productName}}</h6>
                                <p class="d-flex mb-0 text-muted flex-row-reverse pr-1">x{{$cart->quantity}}</p>
                                <p class="d-flex flex-row-reverse pb-0 pr-1">Rp. {{$product->price * $cart->quantity}}</p>
                            </td>
                        </tr>
                    </table>
                </div>
            @endforeach
                <p class="text-muted d-flex flex-row-reverse pb-0 pr-1">Total item :{{$count}}</p>
                <p class="d-flex flex-row-reverse pb-0 pr-1">Total Price :Rp. {{$sum}},-</p>
        @endguest
    </div>
    <div>
        <button type="button" class="btn btn-primary mx-auto" style="width: 200px; display: block;">Check Out</button>
    </div>
</div>