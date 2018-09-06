<div class="c-jobs-card">
  <a class="c-jobs-card__main" href="{{ route('lessons.show', [$model->id]) }}">

    <div class="c-jobs-card__wrap">
      <div class="c-jobs-card__section">
        <div class="ellipsis">
          <span>
            <span class="c-jobs-card__label">{{ $model->lesson_title }}</span>
          </span>
        </div>
        <div class="ellipsis">
          <span>

            <span class="c-jobs-card__label">
              {{ $model->present()->sub_title }}
            </span>
          </span>

          <span class="c-jobs-card__tags">
            
          </span>
        </div>
      </div>
    </div>
  </a>
  <div class="c-jobs-card__profile">
    
  </div>
</div>