@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h2><b>場所を探す🔎</b></h2>
    </div>

    <br>

    <div class="form-group row">
        <div class="col-sm-2 col-xs-2">
        </div>
        <div class="col-sm-2 col-xs-2">
            <label class="col-form-label">キーワード</label>
        </div>
        <div class="col-sm-4 col-xs-4">
            <input type="text" id="keyword" class="form-control mr-5">
        </div>
        <div class="col-sm-4 col-xs-4">
            <button type="search" class="btn btn-primary" id="search">検索</button>
            <button type="button" class="btn btn-secondary" id="clear">クリア</button>
        </div>
    </div>

    <br>

    <div class="text-center">
        <button class="btn btn-success" onclick=location.href='/tweets'>投稿を探す🔎</button>
    </div>

    <br>

    <div id="target"></div>

    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBDRJYfAdYhDcd46682pO3dcpOjZ_fw1Bs&callback=initMap" async defer></script>

@endsection