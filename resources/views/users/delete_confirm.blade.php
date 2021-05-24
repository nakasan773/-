@extends('layouts.app')

@section('content')

    <div class="container mt-5 pt-5 text-center">
        <span class="display-4 font-weight-bold">本当に退会しますか？</span>
    </div>
    
    <div class="row justify-content-center mt-5">    
        <div class="col-4 text-center">
            <button type="button" class="btn btn-primary mt-5" onclick="history.back()" style="width:120px;height:50px">退会しない</button>
        </div>
        <div class="col-4 text-center">
            <form action="{{ route('users.destroy', ['id' => Auth::user()->id]) }}" method="delete">
            
                <button type="submit" class="btn btn-primary mt-5" style="width:120px;height:50px">退会する</button>
            </form>
        </div>
    </div>
    
@endsection