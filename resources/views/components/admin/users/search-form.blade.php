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
      <form action="/admin/user/q" accept-charset="UTF-8" method="get">
         {{ csrf_field() }}
        <!-- <input name="utf8" type="hidden" value="✓"> -->
        <div class="row">
          <div class="form-group col-sm-3 col-xs-6">
            {{ Form::text('id', isset($q['id']) ? $q['id'] : '', ['class' => 'form-control', 'placeholder' => 'ID', ]) }}
          </div>
        </div>
        <div class="pull-right">
          <div class="form-group">
            <input type="submit" value="検索" class="btn btn-success btn-go" data-disable-with="送信中...">
          </div>
        </div>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>