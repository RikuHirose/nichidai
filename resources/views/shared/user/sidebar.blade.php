<div class="col-md-3 col-xs-12">
  @isset($sidebar_content['recommend_lessons'])
    <div class="col-md-12 col-xs-12 side-wrap">
      <h5 class="card-title-success">オススメ授業</h5>
      @include('shared.user.sidebarContent', ['models' => $sidebar_content['recommend_lessons']])
    </div>
  @endisset

  @isset($sidebar_content['popular_lessons'])
    <div class="col-md-12 col-xs-12 side-wrap">
      <h5 class="card-title-success">人気授業</h5>
      @include('shared.user.sidebarContent', ['models' => $sidebar_content['popular_lessons']])
    </div>
  @endisset

  @isset($sidebar_content['other_articles'])
    <div class="col-md-12 col-xs-12 side-wrap">
      <h5 class="card-title-success">オススメ記事</h5>
      @include('components.user.sidebar.otherArticle', ['models' => $sidebar_content['other_articles']])
    </div>
  @endisset

  @isset($authUser)
    @isset($sidebar_content['history_lessons'])
      <div class="col-md-12 col-xs-12 side-wrap">
        <h5 class="card-title-success">あなたが閲覧した授業</h5>
        @include('shared.user.sidebarContent', ['models' => $sidebar_content['history_lessons']])
      </div>
    @endisset
  @endisset
</div>