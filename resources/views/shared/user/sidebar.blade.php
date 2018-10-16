<div class="col-md-3 col-xs-12">
  @isset($sidebar_content['recommend_lessons'])
  <h3>オススメ授業</h3>
    <div class="col-md-12 col-xs-12">
        @include('shared.user.sidebarContent', ['models' => $sidebar_content['recommend_lessons']])
    </div>
  @endisset

  @isset($sidebar_content['popular_lessons'])
  <h3>人気授業</h3>
    <div class="col-md-12 col-xs-12">
        @include('shared.user.sidebarContent', ['models' => $sidebar_content['popular_lessons']])
    </div>
  @endisset

  @isset($sidebar_content['other_articles'])
  <h3>オススメ記事</h3>
    <div class="col-md-12 col-xs-12">
        @include('components.user.sidebar.otherArticle', ['models' => $sidebar_content['other_articles']])
    </div>
  @endisset

  @isset($authUser)
    @isset($sidebar_content['history_lessons'])
    <h3>あなたが閲覧した授業</h3>
      <div class="col-md-12 col-xs-12">
          @include('shared.user.sidebarContent', ['models' => $sidebar_content['history_lessons']])
      </div>
    @endisset
  @endisset
</div>