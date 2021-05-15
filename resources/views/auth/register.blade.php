@extends('layouts.app')

@section('content')

    <div class="page-header mt-5 text-center">
            <h2>ユーザー登録</h2>
    </div>
        
    <div class="row mt-5 mb-5">
        <div class="col-sm-5 mx-auto">
            <form method="POST" action="{{ route('signup.post') }}">
            @csrf
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">ユーザー名</a>
                    <input type="text" name="user_name" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                    @if ($errors->has('user_name'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('user_name') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">年齢</p>
                    <input type="text" name="age" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                    @if ($errors->has('age'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('age') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">性別</p>
                    <select class="form-control-sm col-sm-8 ml-5 d-inline float-right" id="changeSelect" name="user_sexes_id" onchange="entryChange2();">
                        <option value="">未選択</option>
                        @foreach ($sexes as $sex)
                            <option value="{{ $sex->id }}">{{ $sex->sex }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user_sexes_id'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('user_sexes_id') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">居住地</p>
                    <input type="text" name="residence" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                    @if ($errors->has('residence'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('residence') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">メースアドレス</p>
                    <input type="text" name="email" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                    @if ($errors->has('email'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">パスワード</p>
                    <input type="text" name="password" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                    @if ($errors->has('password'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">パスワード再入力</p>
                    <input type="password" name="password_confirmation" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                    @if ($errors->has('password_confirmation'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
                
                <br>
                
                <div class="text-center mt-5">
                  <button type="submit" class="btn btn-primary w-50">登録</button>
    
                  <p class="mt-5">
                    <a href="#" class="text-primary d-inline">ログインはこちらから</a>
                  </p>
                </div>
           
            </form>
        </div>    
    </div>
@endsection
