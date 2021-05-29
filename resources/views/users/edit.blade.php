@extends('layouts.app')

@section('content')

    <br>
    
    <br>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center"><b>プロフィール編集画面</b></div>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ url('users/' .$user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            @if (Auth::id() == 1)
                                <p class="text-danger">※ゲストユーザーは、アカウントIDとメールアドレスを編集できません。</p>
                            @endif
    
                            <div class="form-group row align-items-center">
                                <label for="profile_image" class="col-md-4 col-form-label text-md-right">{{ __('プロフィール画像') }}</label>
    
                                <div class="col-md-6 d-flex align-items-center">
                                    
                                    <img src="{{ Storage::disk('s3')->url($user->profile_image) }}" class="mr-2 rounded-circle" width="80" height="80" alt="">
                                    <input type="file" name="profile_image" class="@error('profile_image') is-invalid @enderror" autocomplete="profile_image" readonly>
                                    
                                    @error('profile_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="screen_name" class="col-md-4 col-form-label text-md-right">{{ __('アカウントID') }}</label>
    
                                <div class="col-md-6">
                                    
                                    @if (Auth::id() == 1)
                                        <input id="screen_name" type="text" class="form-control @error('screen_name') is-invalid @enderror" name="screen_name" value="{{ $user->screen_name }}" required autocomplete="screen_name" autofocus readonly>
                                    @else
                                        <input id="screen_name" type="text" class="form-control @error('screen_name') is-invalid @enderror" name="screen_name" value="{{ $user->screen_name }}" required autocomplete="screen_name" autofocus>
                                    @endif
                                    
                                    @error('screen_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="single_comment" class="col-md-4 col-form-label text-md-right">{{ __('ひとこと') }}</label>
    
                                <div class="col-md-6">
                                    <input id="single_comment" type="text" class="form-control @error('single_comment') is-invalid @enderror" name="single_comment" value="{{ $user->single_comment }}" autocomplete="single_comment">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Eメールアドレス') }}</label>
    
                                <div class="col-md-6">
                                    
                                    @if (Auth::id() == 1)
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" readonly>
                                    @else
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                    @endif
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" onclick="history.back()" class="btn btn-primary">戻る</button>
                                    <button type="submit" class="btn btn-primary">更新する</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection