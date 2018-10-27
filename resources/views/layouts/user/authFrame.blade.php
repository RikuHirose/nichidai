<div id="app" class="wrapper">
    @if(\App\Helpers\Production\IsMobileHelper::isMobile() == false)
      @include('shared.user.header')
    @else
      @include('shared.user.mobile.header')
    @endif
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="row">
              <div class="container">
                  @yield('content')
              </div>
          </div>
        </div>

      </div>
    </div>

    @include('shared.user.footer')
</div>

