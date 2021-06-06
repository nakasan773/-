@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h2><b>ユーザー一覧画面</b></h2>
    </div>
    
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3 text-right">
                <a href="{{ url('tweets') }}">投稿を見る <i class="fas fa-users" class="fa-fw"></i> </a>
            </div>
            <div class="col-md-8">
                
                @foreach ($all_users as $user)
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="{{ Storage::disk('s3')->url($user->profile_image) }}" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $user->name }}</p>
                                <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                            </div>
                            @if (auth()->user()->isFollowed($user->id))
                                <div class="px">
                                    <span class="px-1 ml-5 bg-secondary text-light">フォローされています</span>
                                    <div class="mt-10 ml-5">
                                        <p>{{ $user->single_comment }}</p>
                                    </div>
                                </div>
                                
                            @else
                                <div class="px mt-10 ml-5">
                                    <p>{{ $user->single_comment }}</p>
                                </div>
                            @endif
                            <div class="d-flex justify-content-end flex-grow-1">
                                @if (auth()->user()->isFollowing($user->id))
                                    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
    
                                        <button type="submit" class="btn btn-danger">フォロー解除</button>
                                    </form>
                                @else
                                    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}
    
                                        <button type="submit" class="btn btn-primary">フォローする</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-4 d-flex justify-content-center">
            {{ $all_users->links() }}
        </div>
    </div>
    
@endsection