<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @if(isset($top) && $top == true )
            {{ config('site.name', '') }}
        @else
            @yield('title') | {{ config('site.name', '') }}
        @endif
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('layouts.user.metadata')
    @include('layouts.user.styles')
    @section('styles')
    @show
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body class="{!! isset($bodyClasses) ? $bodyClasses : '' !!}">
@if( isset($noFrame) && $noFrame == true )
    @include('layouts.user.authFrame')
@else
    @include('layouts.user.frame')
@endif
@include('layouts.user.scripts')
@section('scripts')
@show
</body>
</html>
