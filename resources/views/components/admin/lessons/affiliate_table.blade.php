<table class="table">
  <h2>created affiliates</h2>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">lesson_id</th>
      <th scope="col">lesson_textbook</th>
      <th scope="col">lesson_read</th>
      <th scope="col">amazon_a_href</th>
      <th scope="col">amazon_img_src</th>
      <th scope="col">amazon_title</th>
      <th scope="col">moshimo_img_src</th>
    </tr>

  </thead>

  <tbody>
    @foreach($affiliates as $affiliate)
    <form action="{{ route('admin.affiliate.update', $affiliate) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <tr>
          <th scope="row">{{ $affiliate['id'] }}</th>
          <td>
            <input type="hidden" name="lesson_id"              value="{{ $affiliate->lesson_id }}">
            {{ $affiliate->lesson_id }}
          </td>
          <td><input type="checkbox" name="lesson_textbook_id" value="1"
              @if($affiliate->lesson_textbook_id == 1) checked @endif>
          </td>
          <td><input type="checkbox" name="lesson_read_id"     value="1"
              @if($affiliate->lesson_read_id == 1) checked @endif>
            </td>
          <td><input type="text"     name="amazon_a_href"   value="{{ $affiliate->amazon_a_href }}"></td>
          <td><input type="text"     name="amazon_img_src"  value="{{ $affiliate->amazon_img_src }}"></td>
          <td><input type="text"     name="amazon_title"    value="{{ $affiliate->amazon_title }}"></td>
          <td><input type="text"     name="moshimo_img_src" value="{{ $affiliate->moshimo_img_src }}"></td>
      </tr>
      <tr>
        <td>
          <a target="_blank" href="{{ $affiliate->amazon_a_href }}" rel="nofollow">
            <img src="{{ $affiliate->amazon_img_src }}" alt="" style="border: none;" />
            <br />
            {{ $affiliate->amazon_title }}
          </a>
          <img src="{{ $affiliate->moshimo_img_src }}" alt="" width="1" height="1" style="border: 0px;" />
        </td>
        <td><input type="submit" value="edit" class="btn btn-success btn-go" data-disable-with="送信中..."></td>
      </tr>
    </form>
    @endforeach
  </tbody>
</table>