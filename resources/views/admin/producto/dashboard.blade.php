@extends('layouts.app')
@push('stylesheet')
{{-- <link rel="stylesheet" href="vendor/datatables-bs4/css/dataTables.bootstrap4.css"> --}}
<link rel="stylesheet" href="{{ asset('vendor/rawrshop/index.css') }}">

<style>
  .card .card-img-overlay {
    background-color:rgba(0,0,0,.001);
  }

  /* .cardd-hover:hover {
    transform: scale(1.04);
    transition: all 0.5s ease-in-out;
    cursor: pointer;
    border-width: 3px;
    border-style: solid;
    border-color: rgb(70, 18, 255);
  } */
</style>
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Productos</h3>
        {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
      </div>
      {{-- <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
          </ol>
        </nav>
      </div> --}}
    </div>
  </div>

  {{-- @include('admin.producto._tabs') --}}

  {{-- <section class="section">
    <div class="card">
      <div class="card-body table-responsive">
        <table id="tableSelect" class="table table-hover table-sm">
          <thead>
            <tr>
              <th class="text-center">Imagen</th>
              <th></th>
              <th>Código</th>
              <th>Nombre</th>
              <th>Categoría</th>
              <th><span class="text-warning">$</span> Precio</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $p)
            <tr>
              <td class="text-center">
                <img src="{{ asset($p->present()->getImagen()) }}" class="rounded img-fluid" width="100" alt="Ejemplo">
              </td>
              <td>
                <div class="fa fa-eye"></div>
                {{ $p->count_views }}
              </td>
              <td>
                <a href="{{ route('productos.show',$p->id) }}">
                  {{ $p->codigo }}
                </a>
              </td>
              <td>
                <a href="{{ route('productos.show',$p->id) }}">
                {{ $p->nombre }}
                </a>
              </td>
              <td>
                <span class="badge bg-success">{{ $p->categoria->nombre ?? '' }}</span>
                <span class="badge bg-warning">{{ $p->subcategoria->nombre ?? '' }}</span>
              </td>
              <td>
                @foreach ($p->variedades as $v)
                  $ {{ $v->getPrice() }}
                @endforeach
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <br>
        <br>
      </div>
    </div>

  </section> --}}

  <div class="container py-2">
      <div class="col-md-12 mb-3">
        <div class="row">
          <div class="container px-4 pt-3" id="featured-3">
            <h2 class="pb-2 lead">Nuestros <strong>productos</strong></h2>
          </div>
          <div class="d-flex justify-content-center mt-2">
            {!! $productos->links() !!}
          </div>
          @foreach ($productos as $p)
          <div class="col-md-2 col-lg-2 col-md-3 col-6 offset-md-0 mb-2 d-flex align-items-center">
            @include('admin.producto._card_product')
          </div>
          @endforeach
          <div class="d-flex justify-content-center mt-2">
            {!! $productos->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('admin.producto._modal_favorite')
@include('admin.producto._modal_price')
@endsection
@push('javascript')
{{-- <script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="vendor/dinobox/datatables-es.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });
</script> --}}
<!-- Button trigger modal -->
<script>
    var createModal = document.getElementById('starModal')
    createModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var id = button.getAttribute('data-bs-id');
      var favorito = button.getAttribute('data-bs-favorito');
      var inputId = document.getElementById('modal_id');
      if (favorito == "true") {
        console.log("favorito");
        document.getElementById('modal_title').innerHTML = "Quitar favorito";
      } else {
        console.log("no favorito");
        document.getElementById('modal_title').innerHTML = "Seleccionar favorito";
      }
      inputId.value = id;
    });

    var precioModal = document.getElementById('precioModal')
    precioModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var id = button.getAttribute('data-bs-id');
      var precio = button.getAttribute('data-bs-precio');
      var descuento = button.getAttribute('data-bs-descuento');

      document.getElementById('modal_input_precio_descuento').value = descuento;
      document.getElementById('modal_input_precio').value = precio;
      document.getElementById('modal_input_id').value = id;
    });
</script>
@endpush