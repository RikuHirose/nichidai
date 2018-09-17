<div class="logo">
  <a href="{{ route('admin.index') }}" class="simple-text logo-normal">
    GAOGAO Admin
  </a>
</div>
<div class="sidebar-wrapper">
  <ul class="nav">
    <li @if(\Request::is('admin'))class="active"@endif>
      <a href="{{ route('admin.index') }}">
        <i class="now-ui-icons design_app"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li @if(\Request::is('admin'))class="active"@endif>
      <a href="{{ route('admin.index') }}">
        <i class="now-ui-icons design_app"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li @if(\Request::is('admin'))class="active"@endif>
      <a href="{{ route('admin.index') }}">
        <i class="now-ui-icons design_app"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li @if(\Request::is('admin'))class="active"@endif>
      <a href="{{ route('admin.index') }}">
        <i class="now-ui-icons design_app"></i>
        <p>Dashboard</p>
      </a>
    </li>
  </ul>
</div>