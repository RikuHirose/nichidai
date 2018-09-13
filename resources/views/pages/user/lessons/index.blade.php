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
@if($searchQuery  == true)
<div class="col-xs-12">
  @include('shared.user.searchBreadcrumb', ['num' => $models->total()])
</div>
@endif
<!-- search -->
<div class="col-xs-12">
  @include('components.user.lessons.search-form')
</div>

<!-- lessons -->
<div class="col-xs-12">
  @if(isset($title))
    <h2>{{ $title }} @if($models->currentPage() !== 1) {{ $models->currentPage() }}ページ目 @endif</h2>
  @endif
  <div class="row">
    @each('components.user.lessons.card', $models, 'model')
  </div>

<!-- paginate -->
  @if($searchQuery == true)
    {{ $models->appends($q)->links() }}
  @else
    {{ $models->links() }}
  @endif

</div>
@stop
