@isset($authUser)
  <favorite-lesson
    :lesson-id="{{json_encode($model->id)}}"
    :favorited="{{ json_encode($model->present()->favorited($authUser->id)) }}"
  >
  </favorite-lesson>
@else
  <a class="btn btn-primary btn-go">お気入りに追加</a>
@endisset