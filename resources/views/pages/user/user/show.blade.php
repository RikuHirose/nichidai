@extends('layouts.user.application')

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
  <!-- search breadcrumb -->
  @if($searchQuery  == true)
    <div class="col-xs-12">
      @include('shared.user.breadcrumb', ['model' => $user->present()->breadcrumb])
    </div>
  @endif

  <div class="col-xs-12">
    <div id="column_content">
      <div class="center-block">
        <div class="text-center">
          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-circle img-thumbnail" alt="avatar">
        </div>
          <h1 class="text-center">
            <a href="">{{ $user->name }}</a>
          </h1>
          <p class="text-center">
            {{ $user->name }}のページです。
          </p>
      </div>

      <ul class="nav nav-tabs">
      </ul>
      <div class="p-3">
        <!-- タブボタン部分 -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a href="#tab1" class="nav-link active" data-toggle="tab">お気に入りした授業</a>
          </li>
          <li class="nav-item">
            <a href="#tab2" class="nav-link" data-toggle="tab">レビューした授業</a>
          </li>
          <li class="nav-item">
            <a href="#tab3" class="nav-link" data-toggle="tab">閲覧した授業</a>
          </li>
        </ul>

        <!--タブのコンテンツ部分-->
        <div class="tab-content">
          <div id="tab1" class="tab-pane active">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/221808/photo1.jpg" alt="" class="img-fluid">
          </div>
          <div id="tab2" class="tab-pane">
            <div class="col-xs-12">
              <div class="row">
                @each('components.user.user.parts', $reviewed_lessons, 'model')
              </div>
            </div>
          </div>
          <div id="tab3" class="tab-pane">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/221808/photo3.jpg" alt="" class="img-fluid">
          </div>

        </div>
      </div>

    </div>
  </div>


@stop
