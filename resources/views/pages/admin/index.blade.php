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
  <!-- search -->
  <div class="col-xs-12">
    @include('components.admin.lessons.search-form', ['q' => $q])
  </div>
  <div class="col-xs-12">
    <h3>Hi, Welcome to Our Dash Board!</h3>
  </div>

  <div class="col-xs-12">
    <div class="row">
      @include('components.admin.lessons.table', ['models' => $models])
    </div>
  </div>
  

  <!-- paginate -->
  @if($searchQuery == true)
    {{ $models->appends($q)->links() }}
  @else
    {{ $models->links() }}
  @endif
@stop
