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
      <form action="/lesson/search" accept-charset="UTF-8" method="get">
        <input name="utf8" type="hidden" value="✓">
        <div class="row">
          <div class="form-group col-sm-6 col-xs-12">
            <input type="text" name="name" id="name" placeholder="授業名/教授名" class="form-control">
          </div>
          <div class="form-group col-sm-6 col-xs-12">
            <input type="text" name="content" id="content" placeholder="授業内容" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-3 col-xs-6">
            <select name="year" id="year" class="form-control">
              <option value="">年度</option>
              <option value="2017">2017年度</option>
              <option selected="selected" value="2018">2018年度</option>
            </select>
          </div>
          <div class="form-group col-sm-3 col-xs-6">
            <select name="campus" id="campus" class="form-control">
              <option value="">キャンパス</option>
              <option value="1">池袋</option>
            </select>
          </div>
          <div class="form-group col-sm-3 col-xs-6">
            <select name="faculty_id" id="faculty_id" class="form-control">
              <option value="">学部</option>
              <option value="1">文学部</option>
            </select>
          </div>
          <div class="form-group col-sm-3 col-xs-6">
            <select name="department_id" id="department_id" class="form-control js-departments_select">
              <option value="">学部を選択してください</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-3 col-xs-4">
            <select name="term" id="term" class="form-control">
              <option value="">学期</option>
              <option value="1">春学期</option>
              <option selected="selected" value="2">秋学期</option>
              <option value="3">通年</option>
            </select>
          </div>
          <div class="form-group col-sm-3 col-xs-4">
            <select name="day" id="day" class="form-control">
              <option value="">曜日</option>
              <option value="a">月</option>
              <option value="b">火</option>
              <option value="c">水</option>
              <option value="d">木</option>
              <option value="e">金</option>
              <option value="f">土</option>
            </select>
          </div>
          <div class="form-group col-sm-3 col-xs-4">
            <select name="hour" id="hour" class="form-control">
              <option value="">時限</option>
              <option value="1">１</option>
              <option value="2">２</option>
              <option value="3">３</option>
              <option value="4">４</option>
              <option value="5">５</option>
              <option value="6">６</option>
            </select>
          </div>
          <div class="form-group col-sm-3 col-xs-12">
            <select name="evaluation" id="evaluation" class="form-control">
              <option value="">筆記の割合</option>
              <option value="100">100%</option>
              <option value="75">〜75%</option>
              <option value="50">〜50%</option>
              <option value="0">0%</option>
            </select>
          </div>
        </div>
        <div class="pull-left">
          <div class="form-group text-right">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="have_result" id="have_result" value="true">レビューのある授業だけ
              </label>
            </div>
          </div>
        </div>
        <div class="pull-right">
          <div class="form-group">
            <input type="submit" name="commit" value="検索" class="btn btn-success btn-go" data-disable-with="送信中..." onclick="gtag('event', 'click', {'event_category': 'lesson', 'event_label': 'search'});">
          </div>
        </div>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>