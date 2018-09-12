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
    <div class="p-auth-box">
        <form action="{!! action('User\AuthController@postSignIn') !!}" method="post">
            {!! csrf_field() !!}
            <div class="p-auth-box__inner">
                <h4 class="p-auth-box__header">ログイン</h4>
                <div class="input-group">
                <span class="p-auth-box__label">
                    <i class="p-auth-box__icon fa fa-envelope"></i>
                </span>
                    <input type="email" name="email" class="p-auth-box__field form-control"
                           placeholder="@lang('user.pages.auth.messages.email')">
                </div>
                <div class="input-group">
                <span class="p-auth-box__label">
                    <i class="p-auth-box__icon fa fa-key"></i>
                </span>
                    <input type="password" name="password" class="p-auth-box__field form-control"
                           placeholder="@lang('user.pages.auth.messages.password')">
                </div>

                <div class="input-group">
                    <input id="remember-me" type="checkbox" name="remember_me" class="p-auth-box__field" value="1"> <label
                        for="remember-me">@lang('user.pages.auth.messages.remember_me')</label>
                </div>

            </div>

            <button class="p-auth-box__button">@lang('user.pages.auth.buttons.sign_in')</button>
            <p class="p-auth-box__link"><a href="{!! action('User\PasswordController@getForgotPassword') !!}">@lang('user.pages.auth.messages.forgot_password')</a></p>
        </form>
        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

@stop
