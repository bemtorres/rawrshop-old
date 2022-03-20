@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="vendor/datatables-bs4/css/dataTables.bootstrap4.css">
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

  @include('admin.producto._tabs')

  <section class="section">
    <div class="card">
      {{-- <div class="card-header"></div> --}}
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
                <i class="fa fa-star {{ $p->favorito_check ? 'text-warning' : '' }}" data-bs-toggle="modal" data-bs-target="#starModal"
                data-bs-id="{{ $p->id }}"
                data-bs-favorito="{{ $p->favorito_check ? 'true' : 'false' }}"
                >
              </i>
                <img src="{{ asset($p->present()->getImagen()) }}" class="rounded img-fluid" width="80">
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
              {{-- <td>$ {{ $p->variedades->first()->getPrice() }}</td> --}}
            </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <br>
        <br>
      </div>
    </div>

  </section>
  {{-- <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
    @foreach ($productos as $p)
    <div class="col">
      <div class="card">
        <img src="{{ $p->present()->getImagen() }}" class="card-img-top" alt="...">
        <div class="">
          <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">>{{ $p->codigo }}</span></div>
        </div>
        <div class="card-body">
          <h6 class="card-title cursor-pointer">{{ $p->nombre }}</h6>
          <div class="clearfix">
            <p class="mb-0 float-start"><strong>134</strong> Sales</p>
            <p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">
              @foreach ($p->variedades as $v)
          $ {{ $v->getPrice() }}
             @endforeach
            </span><span>$240</span></p>
          </div>
          <div class="d-flex align-items-center mt-3 fs-6">
            <div class="cursor-pointer">
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-secondary"></i>
            </div>
            <p class="mb-0 ms-auto">4.2(182)</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div> --}}
</div>
@include('admin.producto._modal_favorite')
@endsection
@push('javascript')
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="vendor/dinobox/datatables-es.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });

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
</script>
@endpush