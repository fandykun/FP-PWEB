@extends('layouts.base')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Update Profile</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="/dashboard" >
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <?php $temp = $user->email; ?>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label text-md-right">Address</label>
                        <div class="col-md-6">
                            <textarea id="address" type="text" class="form-control" name="address">{{$user->address}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phoneNumber" class="col-sm-4 col-form-label text-md-right">Phone-Number</label>
                        <div class="col-md-6">
                            <input id="phoneNumber" type="text" class="form-control" name="phoneNumber" value="{{ $user->phoneNumber }}">
                        </div>
                    </div>
    
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-8 my-3">
        <div class="card">
            <div class="card-header">Recently Purchased Items</div>
            <div class="card-body">
                <div class="container mt-3">
                    <div class="row">
                        <div class="card-deck">
                            <?php $carts = auth()->user()->cart?>
                            @foreach($carts as $cart)
                            <?php
                                $product = $cart->product;
                            ?>
                            <div class="card">
                                <h6 class="card-header text-truncate">{{$product->productName}}</h6>
                                <div class="card-body">
                                <img src="/storage/coverProducts/{{$product->coverProducts}}" alt="{{$product->productName}}" class="card-img-top">
                                </div>
                                <div class="form-group card-footer" id="rating-ability-wrapper">
                                    <label class="control-label" for="rating">
                                    <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                    </label>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                    </button>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                    </button>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                    </button>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                    </button>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                    </button>
                                </div>                               
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
