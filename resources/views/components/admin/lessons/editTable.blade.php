<div class="LessonDetail__header">
  <div class="LessonDetail__title">
    <div class="LessonDetail__item pull-left"><h1><input type="text" name="lesson_title" value="{{ $model->lesson_title }}"></h1></div>

    <div class="clearfix"></div>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead class="">
        <tr>
          <th scope="col">年度</th>
          <th scope="col">講義開講時期</th>
          <th scope="col">曜日</th>
          <th scope="col">時限</th>
          <th scope="col">単位</th>
          <th scope="col">担当者名</th>
          <th scope="col">シラバス</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <th scope="row"><input type="text" name="year" value="{{ $model->year }}"></th>
          <td><input type="text" name="lesson_term" value="{{ $model->lesson_term }}"></td>
          <td><input type="text" name="lesson_date" value="{{ $model->lesson_date }}"></td>
          <td><input type="text" name="lesson_hour" value="{{ $model->lesson_hour }}"></td>
          <td><input type="text" name="lesson_credit" value="{{ $model->lesson_credit }}"></td>
          <td><input type="text" name="lesson_professor" value="{{ $model->lesson_professor }}"></td>
          <td><a href="{{ $model->url }}" target="_blank">シラバスを見る</a></td>
        </tr>
        <tr>
          <td>
            人気のlesson
          <input type="checkbox" name="popular_id" value="1"
              @if($model->popular_id == 1) checked @endif>
          </td>
          <td>
            オススメのlesson
          <input type="checkbox" name="recommend_id" value="1"
              @if($model->recommend_id == 1) checked @endif>
          </td>
          <td>
            reviewがあるか
          <input type="checkbox" name="review_flag" value="1"
              @if($model->review_flag == 1) checked @endif>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>




