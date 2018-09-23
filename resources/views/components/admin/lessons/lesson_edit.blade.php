<form action="{{ route('admin.lessons.update', [$model->id]) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('PUT') }}

  <div class="col-xs-12">
    @include('components.admin.lessons.editTable', ['model' => $model])
  </div>

  <div>
    <div class="row">
      <div class="col-sm-6 col-xs-12">
        <div class="card">

            <div class="card-body">
              <h5 class="card-title">授業の目標</h5>
              <p class="card-text">
                <textarea type="text" name="lesson_objectives">{{ $model->present()->lesson_objectives }}</textarea>
              </p>
            </div>

            <div class="card-body">
              <h5 class="card-title">授業概要</h5>
              <p class="card-text">
                <textarea type="text" name="lesson_content">{{ $model->present()->lesson_content }}</textarea>
              </p>
            </div>
        </div>
      </div>

      <div class="col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">評価方法</h5>

              @if(!empty($model))
                <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>定期試験</td>
                    <td><input type="text" name="evaluate_exam" value="{{ $model->evaluate_exam }}"></td>
                  </tr>
                  <tr>
                    <td>レポート</td>
                    <td><input type="text" name="evaluate_report" value="{{ $model->evaluate_report }}"></td>
                  </tr>
                  <tr>
                    <td>小テスト</td>
                    <td><input type="text" name="evaluate_mintest" value="{{ $model->evaluate_mintest }}"></td>
                  </tr>
                  <tr>
                    <td>授業への参画度</td>
                    <td><input type="text" name="evaluate_apply" value="{{ $model->evaluate_apply }}"></td>
                  </tr>
                  <tr>
                    <td>その他</td>
                    <td><input type="text" name="evaluate_others" value="{{ $model->evaluate_others }}"></td>
                  </tr>
                  <tr>
                    <td>合計</td>
                    <td><input type="text" name="evaluate_total" value="{{ $model->evaluate_total }}"></td>
                  </tr>
                </tbody>
              </table>
              @endif
            </div>
            <div class="card-body">
              <h5 class="card-title">評価の特記事項</h5>
              @if(!$model->lesson_evaluation == '')
                <textarea type="text" name="lesson_evaluation">{{ $model->lesson_evaluation }}</textarea>
              @else
                ー
              @endif
            </div>
        </div>
      </div>

      <!-- text style-->
      <div class="col-sm-12 col-xs-12">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>授業形式</td>
              <td>
                <textarea type="text" name="lesson_style">{{ $model->present()->lesson_style }}</textarea>
              </td>
            </tr>
            <tr>
              <td>オフィスアワー(授業相談)</td>
              <td>
                <textarea type="text" name="lesson_officehour">{{ $model->present()->lesson_officehour }}</textarea>
              </td>
            </tr>
            <tr>
              <td>事前学習の内容など，学生へのメッセージ</td>
              <td>
                <textarea type="text" name="lesson_info">{{ $model->present()->lesson_info }}</textarea>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <div class="pull-right">
    <div class="form-group">
      <input type="submit" value="edit" class="btn btn-success btn-go" data-disable-with="送信中...">
    </div>
  </div>
  <div class="clearfix"></div>

</form>