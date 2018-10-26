
<div class="footer_lessons_scroll_wrap">
  <ol>
    @foreach($models as $model)
      <li class="card-wrap">
        @include('components._card', ['model' => $model])
      </li>
    @endforeach
  </ol>

</div>