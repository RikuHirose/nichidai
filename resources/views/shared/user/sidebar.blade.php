<div class="col-md-3 col-xs-12">
  <!-- @isset($sidebar_content['recommend_lessons'])
    <div class="side-wrap">
      <h5 class="card-title-success">オススメ授業</h5>
      @include('shared.user.sidebarContent', ['recommend_lessons' => $sidebar_content['recommend_lessons']])
    </div>
  @endisset -->

  @isset($sidebar_content['popular_lessons'])
    <div class="side-wrap">
      <h5 class="card-title-success">人気授業</h5>
      @include('shared.user.sidebarContent', ['popular_lessons' => $sidebar_content['popular_lessons']])
    </div>
  @endisset

  @isset($sidebar_content['other_articles'])
    <div class="side-wrap">
      <h5 class="card-title-success">オススメ記事</h5>
      @include('components.user.sidebar.otherArticle', ['models' => $sidebar_content['other_articles']])
    </div>
  @endisset


  @isset($sidebar_content['similar_lessons'])
      <div class="side-wrap">
        <h5 class="card-title-success">この授業と近い条件の授業</h5>
        @include('shared.user.sidebarContent', ['similar_lessons' => $sidebar_content['similar_lessons']])
      </div>
  @endisset


  <!-- @isset($authUser)
    @isset($sidebar_content['history_lessons'])
      <div class="side-wrap">
        <h5 class="card-title-success">あなたが閲覧した授業</h5>
        @include('shared.user.sidebarContent', ['models' => $sidebar_content['history_lessons']])
      </div>
    @endisset
  @endisset -->
</div>