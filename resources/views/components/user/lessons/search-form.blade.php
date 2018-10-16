<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">検索項目</h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="fl hidden"><p></p></div>
        </div>
      </div>
      <form action="/q" accept-charset="UTF-8" method="get">
        <!-- <input name="utf8" type="hidden" value="✓"> -->
        <div class="row">
          <div class="form-group col-sm-6 col-xs-12">
            {{ Form::text('lesson_title', isset($q['lesson_title']) ? $q['lesson_title'] : '', ['class' => 'form-control', 'placeholder' => '授業名', ]) }}
          </div>
          <div class="form-group col-sm-6 col-xs-12">
            {{ Form::text('lesson_professor', isset($q['lesson_professor']) ? $q['lesson_professor'] : '', ['class' => 'form-control', 'placeholder' => '教授名', ]) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-3 col-xs-6">
            {{ Form::select('year',
                [
                  '' => '年度',
                  '2018' => '2018年度',
                ], isset($q['year']) ? $q['year'] : '', ['class' => 'form-control'])
            }}
          </div>
          <div class="form-group col-sm-3 col-xs-4">
            {{ Form::select('lesson_term',
                [
                  '' => '学期',
                  '前期' => '前期のみ',
                  '後期' => '後期のみ',
                  '通年' => '通年',
                ], isset($q['lesson_term']) ? $q['lesson_term'] : '', ['class' => 'form-control'])
            }}
          </div>
          <div class="form-group col-sm-3 col-xs-4">
            {{ Form::select('lesson_date',
                [
                  ''   => '曜日',
                  '月'  => '月',
                  '火'  => '火',
                  '水'  => '水',
                  '木'  => '木',
                  '金'  => '金',
                  '土'  => '土',
                ], isset($q['lesson_date']) ? $q['lesson_date'] : '', ['class' => 'form-control'])
            }}
          </div>
          <div class="form-group col-sm-3 col-xs-4">
            {{ Form::select('lesson_hour',
                [
                  ''   => '時限',
                  '1'  => '1',
                  '2'  => '2',
                  '3'  => '3',
                  '4'  => '4',
                  '5'  => '5',
                  '6'  => '6',
                ], isset($q['lesson_hour']) ? $q['lesson_hour'] : '', ['class' => 'form-control'])
            }}
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-3 col-xs-12">
            {{ Form::select('evaluate_exam',
                [
                  ''   => '定期試験の割合',
                  '100'  => '100%',
                  '75'  => '〜75%',
                  '50'  => '〜50%',
                  '0'  => '0%',
                ], isset($q['evaluate_exam']) ? $q['evaluate_exam'] : '', ['class' => 'form-control'])
            }}
          </div>
          <div class="form-group col-sm-3 col-xs-12">
            {{ Form::select('evaluate_report',
                [
                  ''   => 'レポートの割合',
                  '100'  => '100%',
                  '75'  => '〜75%',
                  '50'  => '〜50%',
                  '0'  => '0%',
                ], isset($q['evaluate_report']) ? $q['evaluate_report'] : '', ['class' => 'form-control'])
            }}
          </div>
          <div class="form-group col-sm-6 col-xs-12">
            {{ Form::text('lesson_content', isset($q['lesson_content']) ? $q['lesson_content'] : '', ['class' => 'form-control', 'placeholder' => '授業内容', ]) }}
          </div>
        </div>

        <!-- <div class="pull-left">
          <div class="form-group text-right">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="have_result" id="have_result" value="true">レビューのある授業だけ
              </label>
            </div>
          </div>
        </div> -->
        <div class="pull-right">
          <div class="form-group">
            <input type="submit" value="検索" class="btn btn-success btn-go" data-disable-with="送信中...">
          </div>
        </div>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>