<div class="col-md-4 col-sm-6 col-xs-12 ">
  <div class="card">
      <div class="card-body">
        @include('components.user.lessons.favorite', ['model' => $model])
        <h5 class="card-title"><a class="" href="{{ route('lessons.show', [$model->id]) }}">{{ $model->lesson_title }}<span class="small">({{ $model->year }})</span class="small"></a></h5>

        <h6 class="card-subtitle text-muted">{{ $model->present()->sub_title }}</h6>
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
                <td>{{ $model->lesson_professor }}</td>
              </tr>
            </tbody>
          </table>
        </div>


        <div class="table-responsive">
         <!--  <table class="table table-condensed">
            <tbody>
              <tr>
                @foreach($model->present()->card_evaluate as $k => $v)
                  <td class="mw60 success text-success">{{ $k }}</td>
                  <td class="mw60">{{ $v }}</td>
                  <td class="hidden-sm hidden-md hidden-lg"></td>
                @endforeach
              </tr>
            </tbody>
          </table> -->
          <table class="table table-condensed evaluate-table">
            <tbody>
              @foreach($model->present()->card_evaluate as $k => $v)
              <tr>
                  <td class="mw60 success text-success">{{ $k }}</td>
                  <td class="mw60">{{ $v }}%</td>
                  <td class="hidden-sm hidden-md hidden-lg"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

  </div>
</div>