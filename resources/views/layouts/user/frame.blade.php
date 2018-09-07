<div class="wrapper">
    @include('shared.user.header')
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-xs-12">
          @yield('content')
        </div>

        <!-- sidebar -->
        <div class="col-md-3 col-xs-12">
          @include('shared.user.sidebar')
        </div>

      </div>
    </div>

    @include('shared.user.footer')
</div>

