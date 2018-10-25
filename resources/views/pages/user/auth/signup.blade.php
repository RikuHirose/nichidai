@extends('layouts.user.application', ['noFrame' => true, 'bodyClasses' => ''])

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
    Sign Up
@stop

@section('header')
@stop

@section('content')
<div id="login-register" class="">

    <div class="card auth-container">
        <ul class="navigation-tab">
            <li class="tab -active">
                <span class="item">会員登録</span>
            </li>
            <li class="tab">
                <a href="{{ action('User\AuthController@getSignIn') }}" class="item">ログイン</a>
            </li>
        </ul>

        <div class="card-body">
            <div class="container">
                <form action="{{ action('User\AuthController@postSignUp') }}" method="post">
                    <!-- errors -->
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            @include('shared.flash-message', ['error' => $error])
                        @endforeach
                    @endif
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input type="email" name="email" placeholder="@lang('user.pages.auth.messages.email')"  class=" form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="@lang('user.pages.auth.messages.password')"  class="form-control">
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-poss form-control form-posslast" name="password_confirmation" required="" placeholder="パスワード(確認用)">
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" name="remember_me" value="1">
                        <label
                        for="remember-me">@lang('user.pages.auth.messages.remember_me')</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <p class="text-area text-area2">既にアカウントをお持ちの方はこちらから<a class="btn-sns " href="{{ action('User\AuthController@getSignIn') }}">ログイン</a></p>
            </div>
        </div>
    </div>
</div>

@stop
