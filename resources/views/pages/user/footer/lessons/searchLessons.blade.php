@extends('layouts.user.application')

@section('metadata')
@stop

@section('scripts')
@stop

@section('styles')
@stop

@section('title')
@stop

@section('content')



<div class="col-xs-12">
  @foreach($lessons as $lesson)
    <ul>
      <li>
        <a href="{{ route('lessons.show', $lesson->id) }}">
          {{ $lesson->lesson_professor }}＜＞
          {{ $lesson->lesson_title }}
          {{ $lesson->lesson_term }}
          {{ $lesson->lesson_date }}曜日
          {{ $lesson->lesson_hour }}時限
        </a>
      </li>
    </ul>
  @endforeach
</div>


@stop
