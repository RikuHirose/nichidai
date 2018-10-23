<div id="component-lesson-review">
  <h5 class="card-title">
    <a href="{{ route('user.show', $review->user_id) }}">{{ $review->present()->user_name($review->user_id) }}</a>
    <span>{{ $review->present()->createdAt }}</span>
  </h5>
  <p class="card-text" style="margin: .5rem;">{{ $review->review_content }}</p>
</div>

