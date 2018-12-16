<?php 
    $curr_car;
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
    <input type="hidden" name="productId" value="{{$product->id}}">
    <button type="submit" class="btn btn-success">Add to Cart</button>
</form>

<?php }else{ ?>

<form action="/cart/{{$curr_car->id}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')
    <input type="hidden" name="productId" value="{{$product->id}}">
    <button type="submit" class="mt-2 btn btn-outline-primary shadow btn-block">Add to Cart</button>
</form>

<?php } ?>