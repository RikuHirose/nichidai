<ul class="list-group list-group-flush">
  @foreach($lesson_schedule as $v)
      <li class="list-group-item">
        <input type="text" name="lesson_round" value="{{ $v->lesson_round }}">
        <input type="text" name="lesson_round_title" value="{{ $v->lesson_round_title }}">
      </li>
  @endforeach

</ul>

