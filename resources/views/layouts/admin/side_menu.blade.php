<div class="logo">
  <a href="{{ route('admin.index') }}" class="simple-text logo-normal">
    top
  </a>
</div>
<div class="sidebar-wrapper">
  <ul class="nav">
    <li @if(\Request::is('admin'))class="active"@endif>
      <a href="{{ route('admin.user.index') }}">
        <i class="now-ui-icons design_app"></i>
        <p>User</p>
      </a>
    </li>
    <li @if(\Request::is('admin'))class="active"@endif>
      <a href="{{ route('admin.sidebar.index') }}">
        <i class="now-ui-icons design_app"></i>
        <p>Sidebar</p>
      </a>
    </li>
    <li @if(\Request::is('admin'))class="active"@endif>
      <a href="{{ route('admin.reviews.index') }}">
        <i class="now-ui-icons design_app"></i>
        <p>Reviews</p>
      </a>
    </li>
    <li @if(\Request::is('admin'))class="active"@endif>
      <a href="{{ route('admin.reviews.reviewedLessons') }}">
        <i class="now-ui-icons design_app"></i>
        <p>Reviewed Lessons</p>
      </a>
    </li>
  </ul>
</div>