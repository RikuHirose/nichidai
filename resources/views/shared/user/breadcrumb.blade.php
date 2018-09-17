
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    @foreach($model as $b)
      @if(!isset($review))
        @if ($loop->first)
          <li class="breadcrumb-item"><a href="/">{{ $b }}</a></li>
        @elseif (!$loop->last)
          <li class="breadcrumb-item"><a href="{{ route('index',['q' => $b]) }}">{{ $b }}</a></li>
        @else
          <li class="breadcrumb-item active" aria-current="page">{{ $b }}</li>
        @endif

      @else
        @if ($loop->first)
          <li class="breadcrumb-item"><a href="/">{{ $b }}</a></li>
        @elseif (!$loop->last)

          @if($loop->remaining === 1)
            <li class="breadcrumb-item"><a href="{{ action('User\LessonController@show', $lesson_id) }}">{{ $b }}</a></li>
          @else
            <li class="breadcrumb-item"><a href="{{ route('index',['q' => $b]) }}">{{ $b }}</a></li>
          @endif

        @else
          <li class="breadcrumb-item active" aria-current="page">{{ $b }}</li>
        @endif
      @endif
    @endforeach
  </ol>
</nav>