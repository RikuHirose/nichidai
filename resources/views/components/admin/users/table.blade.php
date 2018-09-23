<table class="table">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">password</th>
    </tr>
  </thead>
  <tbody>
    @foreach($models as $model)
    <tr>
        <th scope="row"><a href="{{ route('admin.lessons.edit', [$model->id]) }}">{{ $model['id'] }}</a></th>
        <td>{{ $model['name'] }}</td>
        <td>{{ $model['email'] }}</td>
        <td>{{ $model['password'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>