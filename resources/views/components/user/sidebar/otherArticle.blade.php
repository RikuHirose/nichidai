
@foreach($models as $v)
  <div class="card" style="width: 100px;">
    <img class="card-img-top" src="{{ $v->imgURL }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">
        <a class="" href="{{ $v->link }}">{{ $v->title }}</a>
      </h5>
    </div>
  </div>
@endforeach