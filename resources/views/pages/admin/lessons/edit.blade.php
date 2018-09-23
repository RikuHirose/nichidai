@extends('layouts.admin.application')



@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.lessons.destroy', $model->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <input type="hidden" name="id" value="{{ $model->id }}">
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>

    @include('components.admin.lessons.lesson_edit', ['model' => $model])
    <!-- reviews -->
      <div class="col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">レビュー</h5>
              @each('components.user.lessons.review', $reviews, 'review')
            </div>
        </div>
      </div>
  </div>
</div>

<div class="col-xs-12">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.lessons.update', [$model->id]) }}" method="post">
        {{ csrf_field() }}

        <h5 class="card-title">授業計画</h5>
        @if(empty($lesson_schedule[0]['id']))
          ー
        @else
          @include('components.admin.lessons.schedule', ['lesson_schedule' => $lesson_schedule])
        @endif
      </form>
    </div>
      <div class="pull-right">
        <div class="form-group">
          <input type="submit" value="edit" class="btn btn-success btn-go" data-disable-with="送信中...">
        </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>

<div class="col-xs-12">
  <div class="card">
    <div class="card-body">
      <!-- affiliate table -->
          <div class="col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">テキスト</h5>
                    <p class="card-text">{{ $model->present()->lesson_textbook }}</p>
                </div>


                <div class="card-body">
                  <h5 class="card-title">参考文献</h5>
                    <p class="card-text">{{ $model->present()->lesson_read }}</p>
                </div>


                <!-- affiliate create -->
                @include('components.admin.lessons.create_lesson_affiliate', ['model' => $model])

                <!-- affiliate edit -->
                @include('components.admin.lessons.affiliate_table', ['affiliates' => $affiliates])

            </div>
          </div>
    </div>
  </div>
</div>
@stop
