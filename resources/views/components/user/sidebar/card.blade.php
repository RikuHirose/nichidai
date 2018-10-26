@isset($popular_lesson)
  <div id="component-side-card">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          <a class="" href="{{ route('lessons.show', [$popular_lesson->id]) }}">
            <span class="badge">{{ $key + 1 }}</span>
            {{ $popular_lesson->lesson_title }}
            <small>( {{ $popular_lesson->year }} )</small>
          </a>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $popular_lesson->present()->sub_title }}</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
@endisset

@isset($similar_lesson)
  <div id="component-side-card">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          <a class="" href="{{ route('lessons.show', [$similar_lesson->id]) }}">
            {{ $similar_lesson->lesson_title }}
            <small>( {{ $similar_lesson->year }} )</small>
          </a>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $similar_lesson->present()->sub_title }}</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
@endisset