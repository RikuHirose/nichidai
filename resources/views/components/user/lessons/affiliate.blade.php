
<table id="affiliate-table" class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">タイトル</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($affiliates as $affiliate)
      <tr>
        <td class="mw60 success text-success">
          <a target="_blank" href="{{ $affiliate->amazon_a_href }}" rel="nofollow">
            <img src="{{ $affiliate->amazon_img_src }}" alt="" style="border: none;" />
          </a>
        </td>
        <td class="mw60">
          <a target="_blank" href="{{ $affiliate->amazon_a_href }}" rel="nofollow">
            {{ $affiliate->amazon_title }}
          </a>
        </td>
        <td>
          <div class="affi-btn">
            <a target="_blank" href="{{ $affiliate->amazon_a_href }}" rel="nofollow">
              amazonで購入する
              <br>
              <span>*買え間違えにご注意ください</span>
            </a>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>