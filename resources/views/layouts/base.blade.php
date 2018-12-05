<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    {{-- Using medium expand navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
        {{-- TODO:Add brand image. (optional) --}}
        <a href="/" class="navbar-brand">{{config(['APP_NAME', 'BTech Shop'])}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHide">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarHide">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownCategory">
                            {{-- TODO:Add icon for category items --}}
                            <a href="/category/computer" class="dropdown-item">PC & Laptop</a>
                            <a href="/category/smartphone" class="dropdown-item">Smartphone</a>
                            <a href="/category/smartwatch" class="dropdown-item">Smartwatch</a>
                            <a href="/category/peripheral" class="dropdown-item">Peripheral Device</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    {{-- TODO:Add search icon --}}
                    {{-- Belum fix action nya mau ke arah mana --}}
                    <form action="/product" method="POST" class="form-inline">
                        <input type="search" class="form-control mr-sm-2" name="search" placeholder="Find your product" aria-label="search">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                    </form>
                </li>
            </ul>
        </div>

        {{-- TODO:Login/Register Button (with make:auth) --}}

    </nav>

    <div class="container">
        @yield('content')
    </div>
    
</body>
</html>