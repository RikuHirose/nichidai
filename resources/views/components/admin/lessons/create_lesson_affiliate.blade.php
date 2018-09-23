<form action="{{ route('admin.affiliate.store') }}">
    <ul class="list-group list-group-flush">

        <input type="hidden" name="lesson_id" value="{{ $model->id }}">
        <li class="list-group-item">
            <label>lesson_textbook</label>
            <input type="checkbox" name="lesson_textbook_id" value="1">
        </li>
        <li class="list-group-item">
            <label>lesson_read</label>
            <input type="checkbox" name="lesson_read_id" value="1">
        </li>
        <li class="list-group-item">
            <label>amazon_a_href</label>
            <input type="text" name="amazon_a_href" value="">
        </li>
        <li class="list-group-item">
            <label>amazon_img_src</label>
            <input type="text" name="amazon_img_src" value="">
        </li>
        <li class="list-group-item">
            <label>amazon_title</label>
            <input type="text" name="amazon_title" value="">
        </li>
        <li class="list-group-item">
            <label>moshimo_img_src</label>
            <input type="text" name="moshimo_img_src" value="">
        </li>
    </ul>
    <div class="">
      <div class="form-group">
        <input type="submit" value="create affi" class="btn btn-success btn-go" data-disable-with="送信中...">
      </div>
    </div>
    <div class="clearfix"></div>
</form>

