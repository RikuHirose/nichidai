<ul class="list-group list-group-flush">
  @foreach($lesson_schedule as $v)
    @if($loop->iteration < 4)
      <li class="list-group-item">{{ $v->lesson_round }}  {{ $v->lesson_round_title }}</li>
    @else
      <div class="collapse" id="collapseExample">
          <li class="list-group-item list-group-item-display">{{ $v->lesson_round }}  {{ $v->lesson_round_title }}</li>
      </div>

    @endif
  @endforeach
  <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    授業計画を全部見る
  </a>
</ul>

