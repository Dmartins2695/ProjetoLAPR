<nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"
           style="font-family: 'French Script MT'; font-size: 30px; padding-top: 0; padding-bottom: 0;"><img
                src="{{asset('logo1.png')}}"
                alt="logo" style="width: 50%"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav  me-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <!-- Authentication Links -->
                @guest

                    <li class="class">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Find Something" aria-label="Search">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </form>
                    </li>
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link  {{Request::path() === "login" ? "active":""}}"
                               href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{Request::path() === "register" ? "active":""}}"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" aria-haspopup="true" aria-expanded="false"
                           href="#">
                            {{ ucfirst(Auth::user()->name) }}
                        </a>
                    </li>
                    @can('edit_forum')
                        <li class="nav-item">
                            <a class="nav-link {{Request::path() === "dashboard" ? "active":""}}"
                               href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                @endguest
                <li class="nav-item">
                    <a class="nav-link  {{Request::path() === "cart" ? "active":""}}"
                       href="{{ url('/home/showCart') }}"><span><img src="{{asset('nav-cart.png')}}" alt="cart">{{ __('Cart') }}</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
