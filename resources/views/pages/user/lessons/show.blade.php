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

<!-- local-strage -->
@isset($authUser)
  <store-local-strage
  :lesson-id="{{json_encode($model->id)}}"
  :user-id="{{json_encode($authUser->id)}}"
  ></store-local-strage>
@endisset

<!-- breadcrumb -->
<div class="col-xs-12">
  @include('shared.user.breadcrumb', ['model' => $model->present()->breadcrumb])
</div>

<div class="col-xs-12">
  <button type="button" class="btn btn-primary">{{ config('site.name') }}
    <a href="http://twitter.com/share?url=https://www.rep-rikkyo.com/lesson/{{ $model->id }}&text=『{{ $model->lesson_title }}』のシラバス%0D%0A{{ $model->lesson_professor }}%0D%0A{{ $model->sub_title }}/{{ $model->subsub_title }}%0D%0A">Twitter</a>
  </button>
  <button type="button" class="btn btn-success">
    <a href="http://line.me/R/msg/text/?『{{ $model->lesson_title }}』のシラバスです。詳細なシラバスと授業のレビューを見ることができます。%0A{{ $model->sub_title }}/{{ $model->subsub_title }}%0A{{ $model->lesson_professor }}%0A{{ $model->lesson_content }}%0Ahttps://www.rep-rikkyo.com/lesson/{{ $model->id }}">LINE</a>
  </button>
  @include('components.user.lessons.table', ['model' => $model])
</div>

<div>
  <div class="row">
    <div class="col-sm-6 col-xs-12">
      <div class="card">
          <div class="card-body">
            <h5 class="card-title">授業の目標</h5>
            <p class="card-text">{{ $model->present()->lesson_objectives }}</p>
          </div>

          <div class="card-body">
            <h5 class="card-title">授業概要</h5>
            <p class="card-text">{{ $model->present()->lesson_content }}</p>
          </div>
      </div>
    </div>
    <!-- lesson_schedule -->
    <div class="col-sm-6 col-xs-12">
      <div class="card">
          <div class="card-body">
            <h5 class="card-title">評価方法</h5>

            @if(!empty($model))
            <?php
            $evaluates = $model->present()->evaluate_rate_key;
            ?>
              <evaluate-chart :chart-data="{{json_encode($model->present()->evaluate_rate)}}"></evaluate-chart>
            @endif
          </div>
          <div class="card-body">
            <h5 class="card-title">評価の特記事項</h5>
            @if(!$model->lesson_evaluation === '')
              {{ $model->lesson_evaluation }}
            @else
              ー
            @endif
          </div>
      </div>
       <div class="card">
            <div class="card-body">
              <h5 class="card-title">授業計画</h5>
              @if(empty($lesson_schedule[0]['id']))
                ー
              @else
                @include('components.user.lessons.schedule', ['lesson_schedule' => $lesson_schedule])
              @endif
            </div>

        </div>
    </div>

    <!-- lesson read -->
    <div class="col-sm-12 col-xs-12">
      <div class="card">
          <div class="card-body">

              <h5 class="card-title">テキスト</h5>
                @foreach($affiliates['getTexts'] as $affiliate)
                  @include('components.user.lessons.affiliate', ['affiliate' => $affiliate])
                @endforeach

              <h5 class="card-title">参考文献</h5>
              @foreach($affiliates['getReads'] as $affiliate)
                @include('components.user.lessons.affiliate', ['affiliate' => $affiliate])
              @endforeach
          </div>
      </div>
    </div>

    <!-- text style-->
    <div class="col-sm-12 col-xs-12">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>授業形式</td>
            <td>{{ $model->present()->lesson_style }}</td>
          </tr>
          <tr>
            <td>オフィスアワー(授業相談)</td>
            <td>{{ $model->present()->lesson_officehour }}</td>
          </tr>
          <tr>
            <td>事前学習の内容など，学生へのメッセージ</td>
            <td>{{ $model->present()->lesson_info }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- reviews -->
    <div class="col-sm-12 col-xs-12">
      <div class="card">
          <div class="card-body">
            <h5 class="card-title">レビュー</h5>
            @each('components.user.lessons.review', $reviews, 'review')
          </div>
          <p class="text-center">
            <a href="{{ route('lesson.review.get', $model->id) }}" class="btn btn-primary btn-go">レビューを書く</a>
          </p>
      </div>
    </div>
  </div>
</div>
@stop
