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

<!-- search -->
<div class="col-xs-12">
  @include('components.user.lessons.search-form')
</div>

<!-- lessons -->
<div class="col-xs-12">
  <h2>{{ $title }}</h2>
  <div class="row">
    @each('components.user.lessons.card', $models, 'model')
  </div>
</div>
@stop
