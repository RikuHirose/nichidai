<div class="col-md-4 col-sm-6 col-xs-12 " style="height: 500px;">
  <div class="card" >
      <div class="card-body">
        <h5 class="card-title"><a class="" href="{{ route('lessons.show', [$model->id]) }}">{{ $model->lesson_title }}</a></h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $model->present()->sub_title }}</h6>

        <table class="table table-condensed">
          <tbody>
            <tr class="table-header">
              <th>講義開講時期</th>
              <th>曜日･時限</th>
              <th>単位</th>
              <th>担当者名</th>
            </tr>
            <tr>
              <td>{{ $model->lesson_term }}</td>
              <td>{{ $model->lesson_date }}</td>
              <td>{{ $model->lesson_credit }}<br></td>
              <td>{{ $model->lesson_professor }}</td>
            </tr>
          </tbody>
        </table>

        <div class="table-responsive">
          <table class="table table-condensed">
            <tbody>
              <tr>
                <td class="mw60 success text-success">筆記試験</td>
                <td class="mw60">75%</td>
                <td class="hidden-sm hidden-md hidden-lg"></td>
              </tr>
              <tr>
                <td class="mw60 success text-success">平常点</td>
                <td class="mw60">25%</td>
                <td class="hidden-sm hidden-md hidden-lg">中間レポート(25%)</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

  </div>
</div>