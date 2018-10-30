@extends('layouts.user.application')

@section('metadata')
<meta name="description" content="『{{ $model->lesson_title }}』のシラバスです。詳細なシラバスと授業のレビューを見ることができます。/日本大学経済学部/{{ $model->sub_title }}/{{ $model->subsub_title }}/{{ $model->lesson_professor }}/{{ $model->lesson_title }}">
@stop

@section('scripts')
@stop

@section('styles')
@stop

@section('title')
{{ $model->lesson_title }}のシラバス
@stop


@section('content')
<div id="lesson-show">
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

  <div id="sns-btn-wrap" class="col-xs-12">
    <button type="button" class="btn btn-primary twitter-btn">
      <a href="http://twitter.com/share?url={{ config('site.url') }}/lesson/{{ $model->id }}&text=『{{ $model->lesson_title }}』のシラバス%0D%0A{{ $model->lesson_professor }}%0D%0A{{ $model->sub_title }}/{{ $model->subsub_title }}%0D%0A">Twitter</a>
    </button>

    <button type="button" class="btn btn-success line-btn">
      <a href="http://line.me/R/msg/text/?『{{ $model->lesson_title }}』のシラバスです。詳細なシラバスと授業のレビューを見ることができます。%0A{{ $model->sub_title }}/{{ $model->subsub_title }}%0A{{ $model->lesson_professor }}%0A{{ $model->lesson_content }}%0A{{ config('site.url') }}/lesson/{{ $model->id }}">LINE</a>
    </button>
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
              <p class="card-text">{{ $model->present()->lesson_objectives }}</p>
            </div>

            <div class="card-body">
              <h5 class="card-title">授業概要</h5>
              <p class="card-text">{{ $model->present()->lesson_content }}</p>
            </div>

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">授業計画</h5>
                @if(empty($lesson_schedule[0]['id']))
                  <p style="margin: .5rem;">ー</p>
                @else
                  @include('components.user.lessons.schedule', ['lesson_schedule' => $lesson_schedule])
                @endif
              </div>
          </div>
        </div>
      </div>
      <!-- lesson_evaluate -->
      <div class="col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">評価方法</h5>
              @if($model->present()->evaluate_rate_total != 0)
                <evaluate-chart :chart-data="{{json_encode($model->present()->evaluate_rate)}}"></evaluate-chart>

                <table id="evaluate-table" class="table">
                  <thead>
                    <tr>
                      <th scope="col">種類</th>
                      <th scope="col">割合</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($model->present()->card_evaluate as $k => $v)
                      <tr>
                        <td class="mw60 success text-success">{{ $k }}</td>
                        <td class="mw60">{{ $v }}%</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @else
                <p style="margin: .5rem;">ー</p>
              @endif

            </div>
            <div class="card-body">
              <h5 class="card-title">評価の特記事項</h5>
              @if(!$model->lesson_evaluation == '')
                <p class="card-text">
                  {{ $model->lesson_evaluation }}
                </p>
              @else
                <p style="margin: .5rem;">ー</p>
              @endif
            </div>
        </div>
      </div>

      <!-- lesson read -->
      <div class="col-sm-12 col-xs-12" id="lesson_read_text_table">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">テキスト</h5>
                  @empty($affiliates['getTexts'])
                    @if($model->lesson_textbook != '')
                      <p class="card-text">{{ $model->lesson_textbook }}</p>
                    @else
                      <p style="margin: .5rem;">ー</p>
                    @endif
                  @endempty

                  @if(!empty($affiliates['getTexts']))
                    @include('components.user.lessons.affiliate', ['affiliates' => $affiliates['getTexts']])
                  @endif

                <h5 class="card-title">参考文献</h5>
                @empty($affiliates['getReads'])
                  @if($model->lesson_read != '')
                    <p class="card-text">{{ $model->lesson_read }}</p>
                  @else
                    <p style="margin: .5rem;">ー</p>
                  @endif
                @endempty

                @if(!empty($affiliates['getReads']))
                  @include('components.user.lessons.affiliate', ['affiliates' => $affiliates['getReads']])
                @endif
            </div>
        </div>
      </div>

      <!-- text style-->
      <div class="col-sm-12 col-xs-12">
        <table id="text-table" class="table table-bordered">
          <tbody>
            <tr>
              <td class="label">授業形式</td>
              <td>{{ $model->present()->lesson_style }}</td>
            </tr>
            <tr>
              <td class="label">オフィスアワー(授業相談)</td>
              <td>{{ $model->present()->lesson_officehour }}</td>
            </tr>
            <tr>
              <td class="label">事前学習の内容など，学生へのメッセージ</td>
              <td>{{ $model->present()->lesson_info }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- reviews -->
      <div class="col-sm-12 col-xs-12">
        <h5 class="card-title-success">レビュー</h5>
        <div class="card">
          @if(!isset($authUser))
          <div class="alert alert-warning" style="font-size: 80%;">
            レビューを書く・見るためには会員登録が必要です。
          </div>
            <img src="{{ asset('/static/user/images/review.png') }}" class="reviews-img">
          @else

            @if($reviews->isEmpty())
              <div class="alert alert-warning" style="font-size: 80%;">
                この授業のレビューはまだありません
              </div>
              <div class="card-body" style="min-height: 200px;">
                @each('components.user.lessons.review', $reviews, 'review')
              </div>
            @else
              <div class="card-body" style="min-height: 200px;">
                @each('components.user.lessons.review', $reviews, 'review')
              </div>
            @endif
          @endif
          <p class="text-center">
            <a href="{{ route('lesson.review.get', $model->id) }}" class="btn btn-primary btn-go">レビューを書く・もっと見る</a>
          </p>
        </div>
      </div>

      <!-- footer content -->
      <div id="footer-lessons-wrap" class="col-sm-12 col-xs-12">
        @isset($footer_content['recommend_lessons'])
          <h5 class="card-title-success">あなたにオススメの授業</h5>
          @include('components.user.footer.footerContent', ['models' => $footer_content['recommend_lessons']])
        @endisset

        @isset($footer_content['history_lessons'])
          <h5 class="card-title-success">あなたが閲覧した授業</h5>
          @include('components.user.footer.footerContent', ['models' => $footer_content['history_lessons']])
        @endisset

      </div>
    </div>
  </div>
</div>
@stop
