  <div class="card" >
      <div class="card-body">
        <h5 class="card-title">
          ID : {{ $review->user_id }}
            <a href="{{ route('user.show', $review->user_id) }}">{{ $review->present()->user_name($review->user_id) }}</a>
        </h5>
        <p class="card-text">{{ $review->review_content }}</p>
      </div>

  </div>
