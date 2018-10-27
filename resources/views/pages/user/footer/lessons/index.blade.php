@extends('layouts.user.application')

@section('metadata')
<meta name="description" content="日大経済学部のカテゴリーごとの授業一覧です。気になる授業を探せます。">
@stop

@section('scripts')
@stop

@section('styles')
@stop

@section('title')
授業一覧ページ
@stop

@section('content')
<div class="col-xs-12">
  <div id="footer-lessons">
    <h2>授業一覧ページ</h2>
    <p class="taglist-description">カテゴリーごとの授業一覧です。気になる授業を探せます。</p>
    @foreach($lesson_lists as $subtitle => $lessons_by_subtitle)
      <h3>{{ $subtitle }}</h3>

        @foreach($lessons_by_subtitle as $subsubtitle => $lessons)
          @if(!empty($lessons))
            <ul class="clearfix">
              <h4>{{ $subsubtitle }}</h4>
              @php
                  $title = '';
              @endphp
              @foreach($lessons[0] as $lesson)
                @if($lesson->lesson_title != $title)
                  <!-- <a href="{{ route('search.lessons',['lesson_title' => $lesson->lesson_title]) }}">{{ $lesson->lesson_title 
                  }}</a> -->
                  <li>
                    <a href="/q?lesson_title={{$lesson->lesson_title}}">{{ $lesson->lesson_title }}</a>
                  </li>
                  @php
                    $title =$lesson->lesson_title
                  @endphp
                @endif
              @endforeach
            </ul>
          @endif
        @endforeach
    @endforeach
  </div>
</div>


@stop
