@if(empty($authUser))
  @include('layouts.admin._header')
  @yield('content')
@else
  @include('layouts.admin._header_signed_in')
@endif
<!-- End Navbar -->
<div class="panel-header panel-header-sm" style="height: 80px;">
</div>
<div class="wrapper">
    <div class="row">
      <div class="col-sm-2">
        <div class="sidebar" data-color="orange">
          @include('layouts.admin.side_menu')
        </div>
      </div>
      <div class="col-sm-10">
        <div class="main-panel">

          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    @yield('content')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@section('outer')
  @include('layouts.admin.footer')
@stop
