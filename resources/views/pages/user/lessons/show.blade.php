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
  @include('shared.user.breadcrumb', ['model' => $model->present()->breadcrumb])
</div>

<div class="col-xs-12">
  @include('components.user.lessons.table', ['model' => $model])
</div>

<div>
  <div class="row">
    <div class="col-sm-6 col-xs-12">
      <div class="card">
          <div class="card-body">
            <h5 class="card-title">授業の目標</h5>
            <p class="card-text">{{ $model->lesson_objectives }}</p>
          </div>

          <div class="card-body">
            <h5 class="card-title">授業概要</h5>
            <p class="card-text">{{ $model->lesson_content }}</p>
          </div>
      </div>
    </div>
    <!-- lesson_schedule -->
    <div class="col-sm-6 col-xs-12">
      <div class="card">
          <div class="card-body">
            <h5 class="card-title">評価方法</h5>

            @if(empty($model))
              ー
            @else
<!--             evaluate_exam
            evaluate_report
            evaluate_mintest
            evaluate_apply
            evaluate_others
            evaluate_total -->
              <!-- @include('components.user.lessons.evaluate', ['model' => $model->present()->evaluate_rate]) -->
            @endif
          </div>
          <div class="card-body">
            <h5 class="card-title">評価の特記事項</h5>
            {{ $model->lesson_evaluation }}
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
            <p class="card-text">{{ $model->lesson_textbook }}</p>
          </div>

          <div class="card-body">
            <h5 class="card-title">参考文献</h5>
            <p class="card-text">{{ $model->lesson_read }}</p>
          </div>
      </div>
    </div>

    <!-- text style-->
    <div class="col-sm-12 col-xs-12">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>授業形式</td>
            <td>{{ $model->lesson_style }}</td>
          </tr>
          <tr>
            <td>オフィスアワー(授業相談)</td>
            <td>{{ $model->lesson_officehour }}</td>
          </tr>
          <tr>
            <td>事前学習の内容など，学生へのメッセージ</td>
            <td>{{ $model->lesson_info }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
