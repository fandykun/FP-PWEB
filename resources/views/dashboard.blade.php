@extends('layouts.base')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header collapse-one">Update Profile</div>

            <div class="card-body collapsed-one collapse show">
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
    @include('layouts.rating')
</div>

<script>
    $(document).ready(function(){
        $(".collapse-one").click(function(){
            $(".collapsed-one").collapse('toggle');
            // $(".collapsed-two").collapse('hide');
        });
        $(".collapse-two").click(function(){
            $(".collapsed-two").collapse('toggle');
            // $(".collapsed-one").collapse('hide');
        });
        $(".collapsed-one").on('show.bs.collapse', function(){
            $(".collapsed-two").collapse('hide');
        });
        $(".collapsed-two").on('show.bs.collapse', function(){
            $(".collapsed-one").collapse('hide');
        });
    });
</script>

@endsection
