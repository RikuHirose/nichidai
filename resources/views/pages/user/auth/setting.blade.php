@extends('layouts.user.application', ['noFrame' => true, 'bodyClasses' => ''])

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
    Setting
@stop

@section('header')
    Setting
@stop

@section('content')

    <div class="p-auth-box">
        <form action="{!! action('User\AuthController@postSetting') !!}" method="post">
            {!! csrf_field() !!}
            <div class="p-auth-box__inner">
                <h4 class="p-auth-box__header">プロフィール編集</h4>

                <!-- errors -->
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        @include('shared.flash-message', ['error' => $error, 'success' => $success])
                    @endforeach
                @endif
                @if(isset($success))
                    @include('shared.flash-message', ['success' => $success])
                @endif



                <div class="input-group">
                    <input type="text" name="name" class="p-auth-box__field form-control"
                           placeholder="@lang('user.pages.auth.messages.name')" value="{{ $authUser->name }}">
                </div>
                <div class="input-group">
                    <input type="email" name="email" class="p-auth-box__field form-control"
                           placeholder="@lang('user.pages.auth.messages.email')" value="{{ $authUser->email }}">
                </div>
                <input type="hidden" name="id" value="{{ $authUser->id }}">
               <!--  <div class="input-group">
                    <input type="password" name="password" class="p-auth-box__field form-control"
                           placeholder="@lang('user.pages.auth.messages.password')">
                </div> -->


            </div>

            <button class="p-auth-box__button btn btn-primary">@lang('user.pages.auth.buttons.setting')</button>
            <p class="p-auth-box__link"><a href="{!! action('User\PasswordController@getForgotPassword') !!}">@lang('user.pages.auth.messages.forgot_password')</a></p>
        </form>
    </div>

@stop
