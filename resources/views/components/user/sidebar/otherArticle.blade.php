
@foreach($models as $v)
<div class="component-side-other-article">
  <div class="card">
    <img class="card-img-top" src="{{ $v->imgURL }}" alt="Card image cap">
    <div class="card-body side-card-body">
      <h5 class="card-title">
        <a class="" href="{{ $v->link }}">{{ $v->title }}</a>
      </h5>
    </div>
  </div>
</div>
@endforeach