@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendors/summernote/summernote-lite.min.css') }}">
<style>
  select{
  padding:8px 5px;
  border-radius:5px;
  color:#333;
  width:250px;
}
.font-awesome .fa{
  font-family: "Font Awesome 5 Free", Open Sans;
  font-weight:501;
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
<div class="page-heading">
  <section id="basic-horizontal-layouts">
    <div class="row match-height">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <form class="form form-horizontal form-submit" method="post" action="{{ route('productos.assets.update',$p->id) }}"  enctype="multipart/form-data">
              @csrf
              @method("PUT")
              <div class="row">
                {{-- <div class="col-md-4">
                  <label for="input-enabled">Activar imagen</label>
                </div> --}}
                {{-- <div class="col-md-8 mb-2">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="input-enabled" name="enabled">
                    <label class="form-check-label" for="input-enabled">Esta imagen aparecerá</label>
                  </div>
                </div> --}}

                <div class="col-md-4">
                  <label for="input-nombre">Nombre <small class="text-danger">*</small></label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" id="input-nombre" class="form-control" name="nombre" value="" placeholder="" required>
                </div>

                <div class="col-md-4">
                  <label for="input-logo">Imagen</label>
                </div>
                <div class="col-md-8 form-group mb-3">
                  <input type="file" id="input-logo" name="image" accept="image/*" onchange="preview(this,'preview')" required/>
                </div>
                <div class="col-md-12 form-group text-center">
                  <div id="preview"></div>
                </div>
                <div class="col-sm-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <section class="section">
        <div class="card">
          <div class="card-body table-responsive">
            <table class="table table-hover table-sm">
              <thead>
                <tr>
                  <th>Título</th>
                  <th class="text-center">Imagen</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($p->assets_data() as $key => $value)
                {{-- @php
                  // $data = $value['data'];
                @endphp
                @json($value) --}}
                <tr>
                  <td>
                    {{ $value['name'] }}
                  </td>
                  <td class="text-center">
                    <img src="{{ asset($value['original']) }}" class="rounded img-fluid" width="100" alt="{{ $value['name'] ?? '' }}">
                  </td>
                  <td>
                    <form class="form-submit" action="{{ route('productos.assets.delete',$p->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="id" value="{{ $key }}">
                      <input type="hidden" name="action" value="delete">
                      <button type="submit" class="btn btn-danger ms-2">
                        Eliminar
                      </button>
                    </form>
                  </td>
                  {{-- <td class="text-center">
                    <img src="{{ asset($value['data']) }}" class="rounded img-fluid" width="100" alt="{{ $value['title'] }}">
                  </td>
                  <td class="text-center">
                    <img src="{{ asset($value['data_mobile']) }}" class="rounded img-fluid" width="100" alt="{{ $value['title'] }}">
                  </td>
                  <td>
                    {{ $value['title'] }}
                  </td>
                  <td>
                    <form class="form-submit" action="{{ route('tienda.web.update.enabled') }}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="id" value="{{ $value['id'] }}">
                      <input type="hidden" name="action" value="update">
                      <button type="submit" class="btn btn-{{ $value['enabled'] ? 'primary' : 'danger' }}">
                        {{ $value['enabled'] ? 'Ocultar' : 'Mostrar' }}
                      </button>
                    </form>
                  </td>
                  <td>
                    <form class="form-submit" action="{{ route('tienda.web.update.enabled') }}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="id" value="{{ $value['id'] }}">
                      <input type="hidden" name="action" value="delete">
                      <button type="submit" class="btn btn-danger ms-2">
                        Eliminar
                      </button>
                    </form>
                  </td> --}}
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
  </section>
</div>
</div>
@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>
@endpush