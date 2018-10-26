@extends('layouts.user.application')

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
    マイページ
@stop

@section('header')
    
@stop

@section('content')
  <!-- search breadcrumb -->
  @if($searchQuery  == true)
    <div class="col-xs-12">
      @include('shared.user.breadcrumb', ['model' => $user->present()->breadcrumb])
    </div>
  @endif

  <div class="col-xs-12" id="user-show">
    <div id="column_content">
      @include('components.user.user.show-top', ['user' => $user])
      <ul class="nav nav-tabs">
      </ul>
      <div class="p-3">
        <!-- タブボタン部分 -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a href="{{ route('user.show', $user->id) }}" class="nav-link">お気に入りした授業</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.show.reviewed', $user->id) }}" class="nav-link">レビューした授業</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.show.history', $user->id) }}" class="nav-link active">閲覧した授業</a>
          </li>
        </ul>

        <!--タブのコンテンツ部分-->
        <div class="tab-content" id="tab">
          <div id="tab1" class="tab-pane active">
            <div class="col-xs-12">
              <div class="row">
                @isset($user_content['history_lessons'])
                  <!-- @each('components.user.user.parts', $user_content['history_lessons'], 'model') -->
                  @foreach($user_content['history_lessons'] as $model)
                     @if(\App\Helpers\Production\IsMobileHelper::isMobile() == false)
                      <div class="col-md-4 col-sm-6 col-xs-12 lesson-show-card-wrap">
                        @include('components._card', ['model' => $model])
                      </div>
                    @else
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        @include('components._card', ['model' => $model])
                      </div>
                    @endif
                  @endforeach
                @endisset
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>


@stop
