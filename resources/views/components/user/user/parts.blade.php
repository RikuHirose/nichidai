
    <div class="col-md-4 col-sm-6 col-xs-12 " style="height: 500px;">
      <div class="card" >
          <div class="card-body">
            <h5 class="card-title"><a class="" href="{{ route('lessons.show', [$model->id]) }}">{{ $model->lesson_title }}</a></h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $model->present()->sub_title }}</h6>
          </div>

      </div>
    </div>
  