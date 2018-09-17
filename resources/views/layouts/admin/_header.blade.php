@if( empty($noHeader) || $noHeader == false )
  <nav id="header">
    <div class="top-bar topbar-responsive">
      <div class="top-bar-title">
        <span data-responsive-toggle="topbar-responsive" data-hide-for="medium" style="display: none;">
            <i class="fa fa-lg fa-bars" aria-hidden="true" data-toggle></i>
        </span>
        <a href="{{ route('admin.index') }}" class="topbar-responsive-logo">
          <img alt="GAOGAO" src="{{ asset('assets/images/logo-admin.svg') }}" style="height: 28px;">
        </a>
      </div>
      <div id="topbar-responsive" class="topbar-responsive-links">
        <div class="top-bar-right">
          <ul class="menu vertical medium-horizontal">
            <li class="menu-text menu-top">
              <a href="{{ route('admin.signIn.get') }}" style="padding: .8rem;">
                SIGN IN
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
@endif
