<header>
    <h1><a href="/">観光地シェアサイト</a></h1>
    
    @if (Auth::check())
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <img src="{{ auth()->user()->profile_image }}" class="rounded-circle" width="50" height="50">
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ url('users/' .auth()->user()->id) }}" class="dropdown-item">マイページ</a>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    @else
        <nav>
            <ul>
                <li><a href="/signup">新規登録</a></li>
                <li><a href="/login">ログイン</a></li>
            </ul>
        </nav>
    @endif
    
</header>