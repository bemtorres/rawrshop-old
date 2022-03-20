@foreach ($sub_productos as $sp)
@continue(count($sp->productos_active) == 0)
  <div class="container px-4 pt-3" id="featured-3">
    <h2 class="pb-2 lead">
      <i class="{{ $sp->getIcon()[1][1] ?? '' }} me-2"></i>
      {{ Str::upper($sp->nombre) }}
      {{-- <strong>{{ $sp->nombre }}</strong> --}}
    </h2>
  </div>
  <div class="col-md-12 mb-3">
    <div class="row owl-carousel owl-theme">
      @foreach ($sp->productos_active as $p)
      <div class="offset-md-0 mb-2 d-flex align-items-center item">
        @include('home._card_product_promo')
      </div>
      @endforeach
    </div>
  </div>
@endforeach