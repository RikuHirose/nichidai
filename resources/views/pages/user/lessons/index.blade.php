@extends('layouts.user.application')

@section('metadata')
@stop

@section('scripts')
@stop

@section('styles')
@stop

@section('title')
@stop

@section('content')

<!-- search breadcrumb -->
@if(isset($breadcrumb))
<div class="col-xs-12">
  @include('shared.user.searchBreadcrumb', ['model' => $breadcrumb, 'num' => count($models)])
</div>
@endif
<!-- search -->
<div class="col-xs-12">
  @include('components.user.lessons.search-form')
</div>

<!-- lessons -->
<div class="col-xs-12">
  @if(!isset($breadcrumb))
    <h2>{{ $title }}</h2>
  @endif
  <div class="row">
    @each('components.user.lessons.card', $models, 'model')
  </div>
</div>
@stop
