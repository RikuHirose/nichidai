@extends('layouts.admin.application',['menu' => 'dashboard'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
  {{ config('site.name') }} | Admin | Dashboard
@stop

@section('header')
  Dashboard
@stop

@section('content')
  <div class="col-xs-12">
    <h3>オススメ授業設定</h3>
  </div>

  <div class="col-xs-12">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Rank</th>
          <th scope="col">ID</th>
          <th scope="col">{{ config('site.name', '') }}へ</th>
          <th scope="col">削除</th>
        </tr>
      </thead>
      <tbody>
        @foreach($recommended_lessons as $key => $v)
            <tr>
                <th scope="row">{{ $v['recommend_rank'] }}</th>
                <td><input type="text" class="form-control" value="{{ $v['id'] }}" style="width: 50%;" readonly=""></td>
                <td><a href="{{ route('lessons.show', [$v['id']]) }}">{{ config('site.name', '') }}へ</a></td>
                <td>
                  <form action="{{ route('admin.sidebar.recommend.delete', $v['id']) }}" method="post">
                    {{ csrf_field() }}
                    <!-- {{ method_field('DELETE') }} -->
                    <input type="hidden" name="id" value="{{ $v['id'] }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </td>
            </tr>
          </form>

        @endforeach
      </tbody>
    </table>

    <div class="col-xs-12">
      <h3>オススメ授業作成</h3>
      <p>IDを半角数字で入力</p>
    </div>

    <div class="row">
      <form class="{{ route('admin.sidebar.recommend.post') }}" method="post" style="width: 100%;">
        {{ csrf_field() }}

        <div class="form-group">
          <input type="text" name="recommend_rank" class="form-control" value="" style="width: 50%;" placeholder="rank">
          <input type="text" name="id" class="form-control" value="" style="width: 50%;" placeholder="ID">
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
      </form>
    </div>
  </div>
  
@stop
