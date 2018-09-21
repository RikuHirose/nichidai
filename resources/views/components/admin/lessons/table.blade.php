<table class="table">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Lesson_name</th>
      <th scope="col">lesson_term</th>
      <th scope="col">lesson_date</th>
      <th scope="col">lesson_professor</th>
      <th scope="col">url</th>
    </tr>
  </thead>
  <tbody>
    @foreach($models as $model)
    <tr>
        <th scope="row"><a href="{{ route('admin.lessons.edit', [$model->id]) }}">{{ $model['id'] }}</a></th>
        <td>{{ $model->present()->lesson_name_admin }}</td>
        <td>{{ $model['lesson_term'] }}</td>
        <td>{{ $model->present()->lesson_date_admin }}</td>
        <td>{{ $model->lesson_professor }}</td>
        <td><a href="{{ $model->url }}">URL</a></td>
    </tr>
    @endforeach
  </tbody>
</table>