@extends('layouts.app')

@section('content')

@if (Auth::check())
    <h1>ようこそ！！{{ Auth::user()->user_name }}さん</h1>
    
    <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto align-items-center">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <img src="{{ auth()->user()->profile_image }}" class="rounded-circle" width="50" height="50">
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ auth()->user()->user_name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="{{ url('users/' .auth()->user()->id) }}" class="dropdown-item">プロフィール</a>
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();
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
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    
@else
    <div class="container mt-5 pt-5 text-center">
        <span class="display-4 font-weight-bold">人から人へつながる旅</span>
    </div>
    
    <div class="row justify-content-center mt-5">
        <div class="col-4 text-center">
            <h3>まだアカウントを<br>お持ちでない方はこちら</h3>
            <button type="button" class="btn btn-primary mt-5" onclick=location.href='signup' style="width:120px;height:50px">新規登録</button>
        </div>
        
        <div class="col-4 text-center">
            <h3>すでにアカウントを<br>お持ちの方はこちら</h3>
            <button type="button" class="btn btn-primary mt-5" onclick=location.href='login' style="width:120px;height:50px">ログイン</button>
        </div>
    </div>
@endif

@endsection
