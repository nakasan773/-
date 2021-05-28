@extends('layouts.app')

@section('content')

    <div class="page-header mt-5 text-center">
            <h2>新規登録画面</h2>
    </div>
    
    <br>
        
    <div class="row mt-5 mb-5">
        <div class="form-control-sm col-sm-5 mx-auto float-right">
            <form method="POST" action="{{ route('signup.post') }}">
            @csrf
                
                <br>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">アカウントID（6桁以上）</a>
                    @if ($errors->has('screen_name'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('screen_name') }}</span>
                            </div>
                        </div>
                    @endif
                    <input type="text" name="screen_name" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                </div>
                
                <br>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">ユーザー名（15字以内）</a>
                    @if ($errors->has('name'))
                        <div class="row justify-content-center ml-5">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                    @endif
                    <input type="text" name="name" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                </div>
                
                <br>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <div class="form-control-sm d-inline float-left">
                        <h6>年齢</h6>
                    </div>
                    @if ($errors->has('birthday'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('birthday') }}</span>
                            </div>
                        </div>
                    @endif
                    @livewire('birthday')
                    
                </div>
                
                <br>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">性別</p>
                    
                    @if ($errors->has('user_sex_id'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('user_sex_id') }}</span>
                            </div>
                        </div>
                    @endif
                    <select class="form-control-sm col-sm-8 ml-5 d-inline float-right" id="changeSelect" name="user_sex_id" onchange="entryChange2();">
                        <option value="">未選択</option>
                        @foreach ($sexes as $sex)
                            <option value="{{ $sex->id }}">{{ $sex->sex }}</option>
                        @endforeach
                    </select>
                    
                </div>
                
                <br>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">メースアドレス</p>
                    @if ($errors->has('email'))
                        <div class="row justify-content-center ml-5">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                    @endif
                    <input type="text" name="email" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                </div>
                
                <br>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">パスワード（6桁以上）</p>
                    @if ($errors->has('password'))
                        <div class="row justify-content-center ml-5">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                    @endif
                    <input type="text" name="password" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                </div>
                
                <br>
                
                <br>
                
                <div class="mt-1 clearfix">
                    <p class="d-inline ml-2">パスワード再入力</p>
                    @if ($errors->has('password_confirmation'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>
                    @endif
                    <input type="password" name="password_confirmation" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                </div>
                
                <br>
                
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
