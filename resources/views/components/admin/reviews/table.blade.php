<table class="table">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">lessonID</th>
      <th scope="col">userID</th>
      <th scope="col">content</th>
      <th scope="col">BAN</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reviews as $review)
    <tr>
        <th scope="row"><a href="">{{ $review['id'] }}</a></th>
        <td>{{ $review['lesson_id'] }}</td>
        <td>{{ $review['user_id'] }}</td>
        <td>{{ $review['review_content'] }}</td>
        <th>
          <ban-review
          :review="{{json_encode($review)}}"
          :default-baned="{{ json_encode($review->present()->baned($review)) }}"
          ></ban-review>
        </th>
    </tr>
    @endforeach
  </tbody>
</table>