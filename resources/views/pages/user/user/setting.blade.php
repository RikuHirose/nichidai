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
        <h4 class="p-auth-box__header">プロフィール編集</h4>
        

        <div class="card auth-container">

            <div class="card-body">
                <div class="container">
                    <form action="{{ route('user.setting.post', $authUser->id) }}" method="post">
                        <!-- errors -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                @include('shared.flash-message', ['error' => $error])
                            @endforeach
                        @endif
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="name" class="p-auth-box__field form-control"
                               placeholder="@lang('user.pages.auth.messages.name')" value="{{ $authUser->name }}">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="p-auth-box__field form-control"
                               placeholder="@lang('user.pages.auth.messages.email')" value="{{ $authUser->email }}">
                        </div>

                        <button type="submit" class="btn btn-primary">編集する</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop
