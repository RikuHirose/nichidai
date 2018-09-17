
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('layouts.admin.metadata')
  @include('layouts.admin.styles')
  <meta name="csrf-token" content="{!! csrf_token() !!}">
</head>
<body class="{!! isset($bodyClasses) ? $bodyClasses : '' !!}">
<div id="app">
  @if( isset($noFrame) && $noFrame == true )
    @yield('content')
  @else
    @include('layouts.admin.frame')
  @endif
</div>
@include('layouts.admin.scripts')
</body>
</html>
