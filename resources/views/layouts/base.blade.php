<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{mix('/css/cart.css')}}">
    <link rel="stylesheet" href="{{mix('/css/stars.css')}}">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <link href="{{ asset('css/product.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('js/bootstrap3-typeahead.min.js') }}"></script> --}}
    {{-- <title>{{$title}}</title> --}}
 </head>

<body>
    @include('layouts.app')

    <div class="container">
        @yield('content')
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="{{ mix('/js/cart.js') }}"></script>

    <script>
        $( function() {
            $( "#searchProduct" ).autocomplete({
                source: 'http://localhost:8000/search'
            });
        } );
    </script>
</body>

</html>
