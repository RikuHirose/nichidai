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

  </div>
  <div class="col-xs-12">
    <h3>Hi, Welcome to Our Dash Board!</h3>
  </div>

  <div class="col-xs-12">
    <div class="row">

        @include('components.admin.reviews.table', ['reviews' => $reviews])
    </div>
  </div>
  

  <!-- paginate -->
  @if(isset($reviews))
    @if($searchQuery == true)
      {{ $reviews->appends($q)->links() }}
    @else
      {{ $reviews->links() }}
    @endif
  @endif
@stop