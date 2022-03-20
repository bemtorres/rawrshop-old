<div class="card shadow align-self-stretch" onclick="window.location='{{ route('home.producto',$p->codigo) }}';">
  <div class="text-center border-bottom">
    <img class="card-img-top text-center img-fluid" src="{{ asset($p->present()->getImagen()) }}">
  </div>
  <div class="card-img-overlay py-0 px-1">
    <div class="card-title justify-content-between">
      @if (!$p->fuera_stock)
        @php
          $badge = $p->present()->getBadge();
        @endphp
        @if ($badge[0]['enabled'])
        <span class="badge bg-{{ $badge[0]['color'] }}" id="text_title_dos">
          <i id="text_icon_dos" class="{{ $badge[0]['icon'] }}"></i>
          <span id="text_value_dos">{{ $badge[0]['title'] }}</span>
        </span>
        @endif
        @if ($badge[1]['enabled'])
        <span class="badge bg-{{ $badge[1]['color'] }}" id="text_title_dos">
          <i id="text_icon_dos" class="{{ $badge[1]['icon'] }}"></i>
          <span id="text_value_dos">{{ $badge[1]['title'] }}</span>
        </span>
        @endif
      @else
        <div class="text-center py-5 my-5">
          <h4><span class="badge bg-dark">AGOTADO</span></h4>
        </div>
      @endif
    </div>
  </div>
  <div class="card-body">
    <small>{{ $p->nombre }}</small>
    <br>
    @if ($p->variedades->first()->precio_descuento > 0)
    <small>
      <del>$ {{ $p->variedades->first()->getPriceDescuento() }}</del>
    </small>
    @endif
    <div class="d-flex align-items-center justify-content-between">
      <h5 class="font-weight-bold me-2 text-danger">$ {{ $p->variedades->first()->getPrice() }}</h5>
    </div>
    {{-- <div class="d-flex align-items-center product">
      <span class="fas fa-star text-warning"></span>
      <span class="fas fa-star text-warning"></span>
      <span class="fas fa-star text-warning"></span>
      <span class="fas fa-star text-warning"></span>
      <span class="far fa-star text-warning"></span>
    </div> --}}
    {{-- <h6 class="lead">{{ $p->nombre }}</h6> --}}
    {{-- <div class="d-grid gap-2">
      <button class="btn btn-primary" type="button">Button</button>
    </div> --}}
  </div>
</div>