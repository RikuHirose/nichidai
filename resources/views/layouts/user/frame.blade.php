@if(isset($noSidebar) && $noSidebar == true)
  <div id="app" class="wrapper">
    @include('shared.user.header')
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          @yield('content')
        </div>

      </div>
    </div>
    @include('shared.user.footer')
  </div>
@else
  <div id="app" class="wrapper">
    @include('shared.user.header')
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-xs-12">
          @yield('content')
        </div>

        <!-- sidebar -->
          <div class="col-md-3 col-xs-12">
            @isset($sidebar_content['recommend_lessons'])
              <div class="col-md-12 col-xs-12">
                  @include('shared.user.sidebar', ['models' => $sidebar_content['recommend_lessons']])
              </div>
            @endisset

            @isset($sidebar_content['popular_lessons'])
              <div class="col-md-12 col-xs-12">
                  @include('shared.user.sidebar', ['models' => $sidebar_content['popular_lessons']])
              </div>
            @endisset

            @isset($authUser)
              @isset($sidebar_content['history_lessons'])
                <div class="col-md-12 col-xs-12">
                    @include('shared.user.sidebar', ['models' => $sidebar_content['history_lessons']])
                </div>
              @endisset
            @endisset
          </div>

      </div>
    </div>

    @include('shared.user.footer')
  </div>
@endif

