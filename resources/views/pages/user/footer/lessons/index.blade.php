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
  @foreach($lesson_lists as $subtitle => $lessons_by_subtitle)
    <h2>{{ $subtitle }}</h2>

      @foreach($lessons_by_subtitle as $subsubtitle => $lessons)
        @if(!empty($lessons))
          <h3>{{ $subsubtitle }}</h3>
          @php
              $title = '';
          @endphp
          @foreach($lessons[0] as $lesson)
            @if($lesson->lesson_title != $title)
              <!-- <a href="{{ route('search.lessons',['lesson_title' => $lesson->lesson_title]) }}">{{ $lesson->lesson_title 
              }}</a> -->
              <a href="/lessons/search/q?lesson_title={{$lesson->lesson_title}}">{{ $lesson->lesson_title }}</a>
              @php
                $title =$lesson->lesson_title
              @endphp
            @endif
          @endforeach

        @endif
      @endforeach
  @endforeach
</div>


@stop
