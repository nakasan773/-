<header>
    <h1><a href="/">観光地シェアサイト</a></h1>
    <nav>
        <ul>
            @if (Auth::check())
                <li><a href="/logout">ログアウト</a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            @else
                <li><a href="/signup">新規登録</a></li>
                <li><a href="/login">ログイン</a></li>
            @endif
        </ul>
    </nav>
</header>