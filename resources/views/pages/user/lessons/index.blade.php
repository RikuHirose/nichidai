@extends('layouts.user.application', ['top' => true])

@section('metadata')
<meta name="description" content="日大経済学部のシラバスです。詳細なシラバスと授業のレビューを見ることができます。">
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
    @include('shared.user.searchBreadcrumb', ['num' => $models->total()])
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
      @each('components.user.lessons.card', $models, 'model')
    </div>

  <!-- paginate -->
    <div class="row">
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
