
@foreach($models as $v)
<div class="component-side-other-article">
  <a class="" href="{{ $v->link }}" target="_blank">
    <div class="card">
      <div class="card-body side-card-body">
        <img class="card-img-top" src="{{ $v->imgURL }}" alt="Card image cap">
        <h5 class="card-title">
          <a class="" href="{{ $v->link }}" target="_blank">{{ $v->title }}</a>
        </h5>
      </div>
    </div>
  </a>
</div>
@endforeach