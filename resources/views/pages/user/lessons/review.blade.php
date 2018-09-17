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
<!-- breadcrumb -->
<div class="col-xs-12">
  @include('shared.user.breadcrumb', ['model' => $model->present()->breadcrumbReview, 'review' => true, 'lesson_id' => $model->id])
</div>

<div class="col-xs-12">

  <h2>{{ $model->lesson_title }} ( {{ $model->lesson_professor }} )</h2>
  <p>{{ $model->lesson_title }} ( {{ $model->lesson_professor }} )についてレビューを書きましょう。</p>
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
      <label id="review">*レビューを書く</label>

      {{Form::textarea('review_content', isset($model->review_content) ? $model->review_content : '', ['class' => 'form-control', 'for' => 'review', 'placeholder' => 'レビューを書く', 'rows'=> 5 ])}}
    </div>
     <div class="form-group">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck" name="privacy_check">
        <label class="form-check-label" for="gridCheck">
          *<a href="">プライバシーポリシー</a>に同意します。
        </label>
      </div>
    </div>

    <input type="hidden" name="lesson_id" value="{{ $model->id }}">
    <button type="submit" class="btn btn-primary">送信する</button>
    <div class="form-group">
      <p>*入力必須</p>
    </div>
  </form>
</div>


@stop
