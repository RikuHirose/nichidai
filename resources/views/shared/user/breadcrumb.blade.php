
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">

    @foreach($model as $b)
    @if (!$loop->last)
      <li class="breadcrumb-item"><a href="/">{{ $b }}</a></li>
    @else
      <li class="breadcrumb-item active" aria-current="page">{{ $b }}</li>
    @endif
    @endforeach
  </ol>
</nav>