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
    <h3>外部記事設定</h3>
  </div>

  <div class="col-xs-12">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">title</th>
          <th scope="col">link</th>
          <th scope="col">imgURL</th>
          <th scope="col">削除</th>
        </tr>
      </thead>
      <tbody>
        @foreach($other_articles as $key => $v)
            <tr>
                <th scope="row">{{ $v['title'] }}</th>
                <td>{{ $v['link'] }}</td>
                <td>{{ $v['imgURL'] }}</td>
                <td>
                  <form action="{{ route('admin.sidebar.otherArticle.delete', $v['id']) }}" method="post">
                    {{ csrf_field() }}
                    <!-- {{ method_field('DELETE') }} -->
                    <input type="hidden" name="id" value="{{ $v['id'] }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
            </tr>

        @endforeach
      </tbody>
    </table>

    <div class="col-xs-12">
      <h3>外部記事設定</h3>
    </div>

    <div class="row">
      <form class="{{ route('admin.sidebar.otherArticle.post') }}" method="post" style="width: 100%;">
        {{ csrf_field() }}

        <div class="form-group">
          <input type="text" name="title"  class="form-control" value="" style="width: 50%;" placeholder="title">
          <input type="text" name="link"    class="form-control" value="" style="width: 50%;" placeholder="link">
          <input type="text" name="imgURL" class="form-control" value="" style="width: 50%;" placeholder="imgURL">
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
      </form>
    </div>
  </div>
  
@stop
