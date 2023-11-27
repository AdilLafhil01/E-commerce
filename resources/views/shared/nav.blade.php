@php

    $user=Auth::user();
    if($user !==null)
    {
        $dashboardRoute=$user->getRedirectRoute();

    }

@endphp



<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a href="/" class="nav-item nav-link active">Home<span class="sr-only">(current)</span></a>
        <a href="{{ route('products.index') }}" class="nav-item nav-link">Products</a>

                    @auth
                    <a href="{{ route($dashboardRoute) }}" class="nav-item nav-link">Dashboard</a>
                    <a href="{{ route('logout') }}" class="nav-item nav-link" >Log out</a>

                    @else
                        <a class="nav-item nav-link" href="{{ route('login') }}" >Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-item nav-link" >Register</a>
                        @endif
                    @endauth
                </div>

    </div>
</nav>
