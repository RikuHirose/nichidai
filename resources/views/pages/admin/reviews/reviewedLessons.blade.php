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
  <!-- search -->
  <div class="col-xs-12">

  </div>
  <div class="col-xs-12">
    <h3>Hi, Welcome to Our Dash Board!</h3>
  </div>

  <div class="col-xs-12">
    <div class="row">

        <table class="table">

          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">lessonName</th>
              <th scope="col">eco hack</th>
            </tr>
          </thead>
          <tbody>
            @foreach($lessons as $lesson)
            <tr>
                <th scope="row"><a href="{{ route('admin.lessons.edit', [$lesson->id]) }}">{{ $lesson['id'] }}</a></th>
                <td>{{ $lesson['lesson_title'] }}</td>
                <th scope="row"><a href="{{ route('lessons.show', [$lesson->id]) }}">{{ config('site.name', '') }}へ</a></th>

            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
  

  <!-- paginate -->
  @if(isset($lessons))
    @if($searchQuery == true)
      {{ $lessons->appends($q)->links() }}
    @else
      {{ $lessons->links() }}
    @endif
  @endif
@stop