@extends('layouts.app')

@section('content')

    <main>
        <div class="container mt-5 pt-5 text-center">
            <h2>ログイン画面</h2>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="cal-xs-4">
                        <label for="email" class="mt-3">メールアドレス</label>
                        @if ($errors->has('email'))
                            <div class="row justify-content-center">
                                <div class="cal-xs-4">
                                    <span style="color:red">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                        @endif
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="cal-xs-4">
                        <label>パスワード</label>
                        @if ($errors->has('password'))
                            <div class="row justify-content-center">
                                <div class="cal-xs-4">
                                    <span style="color:red">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                        @endif
                        <input type="text" name="password" class="form-control">
                    </div>
                </div>

            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    ログイン
                </button>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-link">まだ登録がお済みでない方はこちら</button>
            </div>
        </form>
    </main>
@endsection