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
<div id="lesson-review">
  <!-- breadcrumb -->
  <div class="col-xs-12">
    @include('shared.user.breadcrumb', ['model' => $model->present()->breadcrumbReview, 'review' => true, 'lesson_id' => $model->id])
  </div>

  <div class="col-xs-12">

    <div id="lesson_title" class="LessonDetail__header">
      <div class="LessonDetail__title">
        <div class="LessonDetail__item  LessonDetail__nav pull-left">
          <h1>{{ $model->lesson_title }} ({{ $model->lesson_professor }})<small>({{ $model->year }})</small></h1>
        </div>
      </div>
    </div>
    <p class="card-text">{{ $model->lesson_title }} ( {{ $model->lesson_professor }} )についてレビューを書きましょう。</p>
    <ul class="nav nav-tabs">
    </ul>
  </div>

  <div class="col-xs-12">

    <form action="{!! route('lesson.review.post', ['lesson' => $model->id]) !!}" method="post">
      {!! csrf_field() !!}

      <!-- errors -->
      @if ($errors->any())
          @foreach ($errors->all() as $error)
              @include('shared.flash-message', ['error' => $error])
          @endforeach
      @endif
      @if(isset($success))
          @include('shared.flash-message', ['success' => $success])
      @endif


      <div class="form-group">

        {{Form::textarea('review_content', isset($model->review_content) ? $model->review_content : '', ['class' => 'form-control', 'for' => 'review', 'placeholder' => 'レビューを書く', 'rows'=> 5 ])}}
      </div>
       <div class="form-group">
      <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck" name="privacy_check">
          <label class="form-check-label" for="gridCheck">
            <p class="card-text">*<a href="">プライバシーポリシー</a>に同意します。</p>
          </label>
        </div>
      </div>

      <input type="hidden" name="lesson_id" value="{{ $model->id }}">
      <button type="submit" class="btn btn-primary">送信する</button>
      <div class="form-group">
        <p class="card-text">*入力必須</p>
      </div>
    </form>
  </div>

  <!-- reviews -->
  <h5 class="card-title-success">レビュー</h5>
  <div class="card">
      <!-- <div class="card-body">
        @each('components.user.lessons.review', $reviews, 'review')
      </div> -->
      @if($reviews->isEmpty())
        <div class="alert alert-warning" style="font-size: 80%;">
          この授業のレビューはまだありません。
        </div>
        <div class="card-body" style="min-height: 200px;">
        </div>
      @else
        <div class="card-body" style="min-height: 200px;">
          @each('components.user.lessons.review', $reviews, 'review')
        </div>
      @endif

  </div>
</div>


@stop
