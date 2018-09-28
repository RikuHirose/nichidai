@isset($authUser)
  <favorite-lesson
    :lesson-id="{{json_encode($model->id)}}"
    :default-favorited="{{ json_encode($model->present()->favorited($authUser->id)) }}"
  >
  </favorite-lesson>
@else
  <a class="btn btn-primary btn-go" href="/signin">お気入りに追加</a>
@endisset