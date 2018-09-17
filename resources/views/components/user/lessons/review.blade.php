  <div class="card" >
      <div class="card-body">
        <h5 class="card-title">
          @if(!$review->present()->user_name($review->user_id) == null)
            <a href="">{{ $review->present()->user_name($review->user_id) }}</a>
          @else
            <a href="">{{ '匿名' }}</a>
          @endif
        </h5>
        <p class="card-text">{{ $review->review_content }}</p>
      </div>

  </div>
