@extends('layouts.app')

@section('content')

    <br>

    <br>

    <div class="text-center">
        <h2><b>投稿画面</b></h2>
    </div>

    <br>

    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tweets.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row mb-0">
                                <div class="col-md-12 p-3 w-100 d-flex">
                                    <img src="{{ Storage::disk('s3')->url($user->profile_image) }}" class="rounded-circle" width="50" height="50">
                                    <div class="ml-2 d-flex flex-column">
                                        <p class="mb-0">{{ $user->name }}</p>
                                        <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    タイトル
                                    <input class="form-control" name="text_title" rows="2">
                                    <div class="text-right">
                                        <p class="mb-4 mr-3 text-danger">12文字以内</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            @if ($errors->has('text_title'))
                                                <div class="mb-5">
                                                    <span style="color:red">{{ $errors->first('text_title') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    内容
                                    <textarea class="form-control" name="text" rows="4"></textarea>
                                    <div class="col-md-12">
                                        <div class="text-right">
                                        <p class="mb-4 text-danger">140文字以内</p>
                                        </div>
                                        <div class="text-left">
                                            @if ($errors->has('text'))
                                                <div class="mb-5">
                                                    <span style="color:red">{{ $errors->first('text') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-ms-2 mt-2">
                                画像
                                <br>
                                <input id="image" class="mt-1" type="file" name="image" autocomplete="image" rows="4" value="画像を選択">

                                @if ($errors->has('image'))
                                    <div class="row justify-content-left">
                                        <div class="cal-xs-4">
                                            <span style="color:red">{{ $errors->first('image') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-3">
                                都道府県
                                <br>
                                <select class="form-control-sm col-sm-2 mt-1 d-inline" id="changeSelect" name="city_id" onchange="entryChange2();">
                                    <option value="">未選択</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($errors->has('city_id'))
                                <div class="row justify-content-left">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('city_id') }}</span>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        ツイートする
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection