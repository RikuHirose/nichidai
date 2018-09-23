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
    @if(isset($models))
      @include('components.admin.lessons.search-form', ['q' => $q])
    @else
      @include('components.admin.users.search-form', ['q' => $q])
    @endif
  </div>
  <div class="col-xs-12">
    <h3>Hi, Welcome to Our Dash Board!</h3>
  </div>

  <div class="col-xs-12">
    <div class="row">
      @if(isset($models))
        @include('components.admin.lessons.table', ['models' => $models])
      @elseif(isset($users))
        @include('components.admin.users.table', ['models' => $users])
      @endif
    </div>
  </div>
  

  <!-- paginate -->
  @if(isset($models))
    @if($searchQuery == true)
      {{ $models->appends($q)->links() }}
    @else
      {{ $models->links() }}
    @endif
  @else
    {{ $users->links() }}
  @endif
@stop
