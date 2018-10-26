<div class="">
  <div class="card" >
    <div class="card-body">
      <h5 class="card-title">
        <a class="" href="{{ route('lessons.show', [$model->id]) }}">
          {{ $model->lesson_title }}<small>( {{ $model->year }} )</small>
        </a>
      </h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ $model->present()->sub_title }}</h6>
      <p class="card-text"></p>
      <div>
        <table class="table table-condensed">
          <tbody>
            <tr class="table-header">
              <th>開講</th>
              <th>曜日･時限</th>
              <th>単位</th>
              <th>担当</th>
            </tr>
            <tr>
              <td>{{ $model->lesson_term }}</td>
              <td>{{ $model->lesson_date }}{{ $model->lesson_hour }}</td>
              <td>{{ $model->lesson_credit }}<br></td>
              <td>
                <a href="{{ route('index',['q' => $model->lesson_professor]) }}">
                  {{ $model->lesson_professor }}
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>