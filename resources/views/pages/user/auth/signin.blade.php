@extends('layouts.user.application', ['noFrame' => true, 'bodyClasses' => ''])

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
    Sign In
@stop

@section('header')
    Sign In
@stop

@section('content')
    <div id="login-register" class="">
        <div class="card auth-container">
            <ul class="navigation-tab">
                <li class="tab">
                    <a href="{{ action('User\AuthController@getSignUp') }}" class="item">会員登録</a>
                </li>
                <li class="tab -active">
                    <span class="item">ログイン</span>
                </li>
            </ul>

            <div class="card-body">
                <div class="container">
                    <form action="{{ action('User\AuthController@postSignIn') }}" method="post">
                        <!-- errors -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                @include('shared.flash-message', ['error' => $error])
                            @endforeach
                        @endif
                        {!! csrf_field() !!}
                      <div class="form-group">
                        <input type="email" name="email" class="p-auth-box__field form-control"
                               placeholder="@lang('user.pages.auth.messages.email')">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="p-auth-box__field form-control"
                               placeholder="@lang('user.pages.auth.messages.password')">
                      </div>
                      <div class="form-group form-check">
                        <input id="remember-me" type="checkbox" name="remember_me" class="p-auth-box__field" value="1"> <label
                            for="remember-me">@lang('user.pages.auth.messages.remember_me')</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <p class="text-area text-area2">アカウントをお持ちでない方はこちらから<a class="btn-sns " href="{{ action('User\AuthController@getSignUp') }}">会員登録</a></p>
                </div>
            </div>
        </div>
    </div>
@stop
