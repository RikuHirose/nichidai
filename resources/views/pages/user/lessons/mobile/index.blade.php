@extends('layouts.user.application', ['top' => true])

@section('metadata')
@stop

@section('scripts')
@stop

@section('styles')
@stop

@section('title')
@stop

@section('content')
<div id="lesson-index">
  <!-- search breadcrumb -->
  @if($searchQuery  == true)
  <div class="col-xs-12">
    @include('shared.user.searchBreadcrumb', ['num' => $totalCount])
  </div>
  @endif
  <!-- search -->
  <div class="col-xs-12">
    @include('components.user.lessons.search-form', ['q' => $q])
  </div>
  <!-- lessons -->
  <div class="col-xs-12">
    @if(isset($title))
      <h3>{{ $title }} @if($models->currentPage() !== 1) {{ $models->currentPage() }}ページ目 @endif</h3>
    @endif
    <div class="row">
      @each('components.mobile.lessons.card', $models, 'model')
    </div>

  <!-- paginate -->
    <div class="row paginate-wrap">
      <div id="paginate">
        @if($searchQuery == true)
          {{ $models->appends($q)->links() }}
        @else
          {{ $models->links() }}
        @endif
      </div>
    </div>
  </div>
</div>
@stop
