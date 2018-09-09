<div class="LessonDetail__header">
  <div class="LessonDetail__title">
    <div class="LessonDetail__item pull-left"><h1>{{ $model->lesson_title }}</h1></div>
    <div class="LessonDetail__nav pull-right"><a class="btn btn-primary btn-go" onclick="gtag('event', 'click', {'event_category': 'lesson', 'event_label': 'to_review'});" href="/lesson/17457/result/new">レビューを書く</a></div>
    <div class="clearfix"></div>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead class="">
        <tr>
          <th scope="col">年度</th>
          <th scope="col">講義開講時期</th>
          <th scope="col">曜日･時限</th>
          <th scope="col">単位</th>
          <th scope="col">担当者名</th>
          <th scope="col">シラバス</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">{{ $model->year }}</th>
          <td>{{ $model->lesson_term }}</td>
          <td>{{ $model->lesson_date }}</td>
          <td>{{ $model->lesson_credit }}</td>
          <td><a href="{{ route('index',['q' => $model->lesson_professor]) }}">{{ $model->lesson_professor }}</a></td>
          <td><a href="{{ $model->url }}" target="_blank">シラバスを見る</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

