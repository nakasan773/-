<header>
    <h2><a href="/tweets">個人開発 掲示板</a></h2>
    <nav class="pc-nav">
        @if (Auth::check())
            <ul>
                <p class="mt-1 mr-5" >
                    
                    <img src="{{ Storage::disk('s3')->url(auth()->user()->profile_image) }}" class="rounded-circle" width="30" height="25">
                    
                    {{ Auth::user()->name }}
                
                </p>
                <a href="{{ url('tweets/create') }}" class="btn btn-md btn-primary mr-2">ツイートする</a>
                <a href="{{ url('users/' .auth()->user()->id) }}" class="btn btn-md btn-success mr-2 test">マイページ</a>
                <li><a href="{{ url('users/' .auth()->user()->id .'/favorite') }}">お気に入り</a></li>
                <li><a href="{{ url('users/' .auth()->user()->id) }}">マイページ</a></li>
                <li><a href="/logout">ログアウト</a></li>
            </ul>
        @else
            <ul>
                <li><a href="/login">ログイン</a></li>
                <li><a href="/signup">新規登録</a></li>
                <li><a href="/guest">ゲストログイン</a></li>
            </ul>
        @endif
    </nav>
</header>