@extends('layouts.app')

@section('content')

@if (Auth::check())
    <h1>ようこそ！！{{ Auth::user()->user_name }}さん</h1>
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
