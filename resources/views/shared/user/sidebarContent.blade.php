
<div class="sidebar">
  <div class="sidebar_title">
    <h4></h4>
  </div>
  
  @isset($popular_lessons)
    @each('components.user.sidebar.card', $popular_lessons, 'popular_lesson')
  @endisset

  @isset($similar_lessons)
    <!-- @each('components.user.sidebar.card', $similar_lessons, 'similar_lesson') -->
    @foreach($similar_lessons as $model)
      @include('components._card', ['model' => $model])
    @endforeach
  @endisset

</div>