@php
    $route_name = Route::currentRouteName();
@endphp
<nav class="navbar sticky-top navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if($route_name == 'dashboard') active @endif" aria-current="page" href="{{route('dashboard')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($route_name == 'site.index') active @endif" href="{{route('site.index')}}">Site</a>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('profile.edit')}}">Perfil</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
