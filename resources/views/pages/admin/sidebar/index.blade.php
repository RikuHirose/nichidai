@extends('layouts.admin.application',['menu' => 'dashboard'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
  {{ config('site.name') }} | Admin | Dashboard
@stop

@section('header')
  Dashboard
@stop

@section('content')
  <div class="col-xs-12">
    <h3>Hi, Welcome to Our Dash Board!</h3>
  </div>

  <div class="col-xs-12">
    <div class="row">
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.sidebar.recommend.get') }}">オススメ授業設定</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.sidebar.popular.get') }}">人気授業設定</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.sidebar.otherArticle.get') }}">他記事リンク設定</a>
        </li>
      </ul>
    </div>
  </div>
  
@stop
