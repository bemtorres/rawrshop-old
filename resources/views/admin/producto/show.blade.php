@extends('layouts.app')
@push('stylesheet')
<style>
    .card-body {
      padding: 0.5rem;
    }

    .card-body .description {
      font-size: 0.78rem;
      padding-bottom: 8px;
    }

    .card-img-top{
      width:100%;
      height:auto;
    }

    .img-product {
      width: 100%;
      height: 240px;
      object-fit: contain
    }

    .card-img-overlay {
      background-color: rgb(0, 0, 0,0) !important;
    }
</style>
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('productos.index'))
  {{-- @slot('color', 'dark') --}}
  @slot('body', "Producto $p->nombre")
@endcomponent
@include('admin.producto._tab')
<div class="row">

  <div class="col-md-4">
    <div class="card">
      <div class="text-center align-items-center">
        <img class="card-img-top img-product my-1 text-center img-fluid" src="{{ asset($p->present()->getImagen()) }}">
      </div>
      <div class="card-img-overlay py-0 px-1">
        <div class="card-title justify-content-between">

          @if (!$p->fuera_stock)
            @php
              $badge = $p->present()->getBadge();
            @endphp
            @if ($badge[0]['enabled'])
            <span class="badge bg-{{ $badge[0]['color'] }}" id="text_title_dos">
              <i id="text_icon_dos" class="me-2 {{ $badge[0]['icon'] }}"></i>
              <span id="text_value_dos">{{ $badge[0]['title'] }}</span>
            </span>
            @endif
            @if ($badge[1]['enabled'])
            <span class="badge bg-{{ $badge[1]['color'] }}" id="text_title_dos">
              <i id="text_icon_dos" class="me-2 {{ $badge[1]['icon'] }}"></i>
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
        {{-- <div class="text-muted">
          Space for small product description
        </div> --}}
        <small>
          @if ($p->variedades->first()->precio_descuento > 0)
          <del>$ {{ $p->variedades->first()->getPriceDescuento() }}</del>
          @else
            <br>
          @endif
        </small>
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="font-weight-bold me-2">$ {{ $p->variedades->first()->getPrice() }}</h5>
        </div>
      {{--
        <div class="d-flex align-items-center product">
          <span class="fas fa-star text-warning"></span>
          <span class="fas fa-star text-warning"></span>
          <span class="fas fa-star text-warning"></span>
          <span class="fas fa-star text-warning"></span>
          <span class="far fa-star text-warning"></span>
        </div> --}}
        <h6 class="lead">{{ $p->nombre }}</h6>
        {{-- <div class="d-grid gap-2">
          <button class="btn btn-primary" type="button">Button</button>
        </div> --}}
        {!! $p->descripcion !!}
      </div>
      <div class="card-footer">
        <h6>
          Categoría:
          <span class="badge bg-success">{{ $p->categoria->nombre ?? '' }}</span>
        </h6>
        <h6>
          Subcategoría:
          <span class="badge bg-warning">{{ $p->subcategoria->nombre ?? '' }}</span>
        </h6>
        <h6>
          Visibilidad:
          <span>{!! $p->present()->getVisible() !!}</span>
        </h6>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="justify-content-center row">
      @foreach ($p->variedades as $v)
      <div class="row p-2 bg-white border rounded mb-3">
        <div class="col-md-3 mt-1">
          <img class="img-fluid img-responsive rounded img-product" src="{{ asset($v->present()->getImagen()) }}" height="200">
        </div>
        <div class="col-md-6 mt-1">
          <h5>{{ $v->nombre }}</h5>
          <div class="d-flex flex-row">
            {{-- <div class="ratings mr-2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <span>310</span> --}}
          </div>
          {{-- <div class="mt-1 mb-1 spec-1">
            <span>100% cotton</span>
            <span class="dot"></span>
            <span>Light weight</span>
            <span class="dot"></span>
            <span>Best finish<br></span>
          </div> --}}
          {{-- <div class="mt-1 mb-1 spec-1">
            <span>Unique design</span>
            <span class="dot"></span>
            <span>For men</span>
            <span class="dot"></span>
            <span>Casual<br></span>
          </div> --}}
          <p class="text-justify text-truncate para mb-0">
            {!! $v->descripcion !!}
          </p>
        </div>
        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
          <div class="d-flex flex-row align-items-center">
            <h4 class="mr-1">$ {{ $v->getPrice() }}</h4>
            {{-- <span class="strike-text">$20.99</span> --}}
          </div>
          <h6 class="text-success">Cantidad: {{ $v->stock ?? 'sin stock' }}</h6>
          <div class="d-flex flex-column mt-4">
            {{-- <button class="btn btn-primary btn-sm" type="button">Details</button> --}}
            <a class="btn btn-primary btn-sm mt-2" href="{{ route('variedad.edit',$v->id) }}">
              VER
            </a>
            {{-- <button class="btn btn-outline-primary btn-sm mt-2" type="button">Ocultar</button> --}}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>


@endsection
@push('javascript')
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="vendor/dinobox/datatables-es.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });
</script>
@endpush