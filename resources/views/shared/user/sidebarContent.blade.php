
<div class="sidebar">

  @isset($popular_lessons)
    @each('components.user.sidebar.card', $popular_lessons, 'popular_lesson')
  @endisset

  @isset($similar_lessons)
    @if(\App\Helpers\Production\IsMobileHelper::isMobile() == true)
      <div class="col-sm-12 col-xs-12">
        @include('components.user.footer.footerContent', ['models' => $similar_lessons])
      </div>
    @else
      @foreach($similar_lessons as $model)
        @include('components._card', ['model' => $model])
      @endforeach
    @endif

  @endisset

</div>

