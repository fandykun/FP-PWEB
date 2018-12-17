{{-- Add Cart di show product --}}

@guest
@else

<?php 
    // Cek User sudah punya produk di cart apa tidak
    $curr_car = NULL;
    $carts = auth()->user()->cart;
    foreach ($carts as $cart) {
        if ($cart->product_id == $product->id) {
            $curr_car = $cart;
        }
    }
    if($curr_car == NULL){
?>

<form action="/cart" method="post" enctype="multipart/form-data">
@csrf
    <div class="input-group">
            <span class="input-group-btn">
                <button type="button" class="btn btn-outline-danger btn-number"  data-type="minus" data-field="quant">-</button>
            </span>
            <input type="text" name="quant" class="form-control input-number" value="0" min="0" max="{{$product->stock}}">
            <span class="input-group-btn">
                <button type="button" class="btn btn-outline-success btn-number" data-type="plus" data-field="quant">+</button>
            </span>
        </div>
        <a href="/transaction/{{$product->id}}" class="mt-2 btn btn-outline-primary shadow-md btn-block">Buy</a>
    <input type="hidden" name="productId" value="{{$product->id}}">
    <button type="submit" class="mt-2 btn btn-outline-primary shadow-md btn-block">Add to Cart</button>
</form>

<?php }else{ ?>

    <form action="/cart/{{$curr_car->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="input-group">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-danger btn-number"  data-type="minus" data-field="quant">-</button>
                </span>
                <input type="text" name="quant" class="form-control input-number" value="0" min="0" max="{{$product->stock}}">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-success btn-number" data-type="plus" data-field="quant">+</button>
                </span>
            </div>
            <a href="/transaction/{{$product->id}}" class="mt-2 btn btn-outline-primary shadow-md btn-block">Buy</a>
        <input type="hidden" name="productId" value="{{$product->id}}">
        <button type="submit" class="mt-2 btn btn-outline-primary shadow-md btn-block">Add to Cart</button>
    </form>

<?php } ?>
@endguest

