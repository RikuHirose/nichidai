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
<div class="container mb-4">
  <div class="p-jobs">
    <div class="row">
      <div class="col col-12 col-md-12">

      </div>
      <div class="col col-12 col-md-12">
        <ul class="row my-4 pl-0 list-unstyled">
          <li class="col-md-4 mb-3">
            @each('components.user.lessons.card', $models, 'model')
          </li>
        </ul>
      </div>
    </div>

    {{-- Pagination --}}
    <div class="row">
      <div class="col col-12">
        
      </div>
    </div>
  </div>
</div>
@stop
