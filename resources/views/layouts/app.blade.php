{{-- Using medium expand navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
        {{-- TODO:Add brand image. (optional) --}}
        <a href="/" class="navbar-brand">{{config('app.name', 'BTech Shop')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHide">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarHide">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark text-light dropdown-toggle" type="button" id="dropdownCategory"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownCategory">
                            {{-- TODO:Add icon for category items --}}
                            <a href="/category/1" class="dropdown-item">Smartphone</a>
                            <a href="/category/2" class="dropdown-item">PC & Laptop</a>
                            <a href="/category/3" class="dropdown-item">Smartwatch</a>
                            <a href="/category/4" class="dropdown-item">Peripheral Device</a>
                        </div>
                    </div>
                </li>
            </ul>
            {{-- TODO:Add search icon --}}
                    {{-- Belum fix action nya mau ke arah mana --}}
                    <form action="/product" method="POST" class="form-inline mx-auto">
                        <input type="search" class="form-control mr-sm-2" name="search" placeholder="Find your product"
                            aria-label="search">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                    </form>

            <a href="javascript:void(0)" class="btn btn-primary" rel="popover" data-contentwrapper=".mycontent" data-trigger="focus">Cart</a>

            @include('layouts.cart')

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>

        {{-- TODO:Login/Register Button (with make:auth) --}}

    </nav>