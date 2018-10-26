@isset($authUser)
  <favorite-lesson
    :lesson-id="{{json_encode($model->id)}}"
    :default-favorited="{{ json_encode($model->present()->favorited($authUser->id)) }}"
  >
  </favorite-lesson>
@else
  <a class="btn btn-go add_fav" href="/signin">
    <span class="fas fa-star fav-btn-star"></span>
    お気入りに追加
  </a>
@endisset