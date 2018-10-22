<div id="component-side-card">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">
        <a class="" href="{{ route('lessons.show', [$model->id]) }}">
          {{ $model->lesson_title }}<small>( {{ $model->year }} )</small>
        </a>
      </h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ $model->present()->sub_title }}</h6>
      <p class="card-text"></p>
    </div>
  </div>
</div>