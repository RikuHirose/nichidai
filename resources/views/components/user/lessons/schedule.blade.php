<ul class="list-group list-group-flush">
  @foreach($lesson_schedule as $v)
    @if($loop->iteration < 4)
      <li class="list-group-item">{{ $v->lesson_round }}  {{ $v->lesson_round_title }}</li>
    @else
      <li class="list-group-item list-group-item-display">{{ $v->lesson_round }}  {{ $v->lesson_round_title }}sssssss</li>
    @endif
  @endforeach
  <p id="" >授業計画を全部見る</p>
</ul>