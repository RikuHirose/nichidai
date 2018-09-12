<div id="app" class="wrapper">
    @include('shared.user.header')
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="row">
              <div class="col-xs-12">
                  <div class="container">
                      @yield('content')
                  </div>
              </div>
          </div>
        </div>

      </div>
    </div>

    @include('shared.user.footer')
</div>

