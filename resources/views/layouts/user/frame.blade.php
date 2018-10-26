@if(isset($noSidebar) && $noSidebar == true)
  <div id="app" class="wrapper">
    @if(\App\Helpers\Production\IsMobileHelper::isMobile() == false)
      @include('shared.user.header')
    @else
      @include('shared.user.mobile.header')
    @endif
    <div class="container" id="wrapper">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          @yield('content')
        </div>

      </div>
    </div>
    @include('shared.user.footer')
  </div>
@else
  <div id="app">
    @if(\App\Helpers\Production\IsMobileHelper::isMobile() == false)
      @include('shared.user.header')
    @else
      @include('shared.user.mobile.header')
    @endif
    <div class="container" id="wrapper">
      <div class="row">
        <div class="col-md-9 col-xs-12">
          @yield('content')
        </div>

        <!-- sidebar -->
        @isset($sidebar_content)
          @include('shared.user.sidebar', ['models' => $sidebar_content])
        @endisset

      </div>
    </div>
    @include('shared.user.footer')
  </div>
@endif

