<!DOCTYPE html>
<html lang="ja">


    <head>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}"><!--//追記-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"><!--//追記-->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"><!--//追記-->
        <link rel="dns-prefetch" href="//fonts.gstatic.com"><!--//追記-->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="{{ asset('js/app.js') }}"></script><!--//追記-->

        <title>{{ config('app.name', 'Laravel') }}</title>
        
    </head>

    <body>

        <div class="wrapper">
            @include('commons.header')

                <div class="container">

                    @include('commons.error_messages')

                    @yield('content')

                </div>

            @include('commons.footer')
        </div>

    </body>