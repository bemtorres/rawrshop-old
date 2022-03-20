@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Banners de mi página</h3>
        <p class="text-subtitle text-muted">Gestiona tu página de forma rápida y sencilla</p>
      </div>
    </div>
  </div>
  @include('admin.tienda._tabs_web_principal')

  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.web') }}"  enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                  <div class="col-md-4">
                    <label for="input-number">Productos por página <small class="text-danger">*</small> (default 3 | r 48)</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="number" id="input-number" class="form-control" name="number_pag" min="3" value="{{ $t->getConfigPaginator() }}" placeholder="" required>
                  </div>
                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.web') }}"  enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                  <div class="col-md-4">
                    <label for="input-enabled">Activar imagen</label>
                  </div>
                  <div class="col-md-8 mb-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="input-enabled" name="enabled">
                      <label class="form-check-label" for="input-enabled">Esta imagen aparecerá</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label for="input-titulo">Título <small class="text-danger">*</small></label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" id="input-titulo" class="form-control" name="titulo" value="" placeholder="" required>
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

                  <div class="col-md-4">
                    <label for="input-logo">Imagen mobile</label>
                  </div>
                  <div class="col-md-8 form-group mb-3">
                    <input type="file" id="input-logo" name="image2" accept="image/*" onchange="preview(this,'preview2')" required/>
                  </div>
                  <div class="col-md-12 form-group text-center">
                    <div id="preview2"></div>
                  </div>
                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div> --}}
        {{-- @if (!empty($t->present()->getBanner()))
        <section class="section">
          <div class="card">
            <div class="card-body table-responsive">
              <table id="tableSelect" class="table table-hover table-sm">
                <thead>
                  <tr>
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Imagen mobile</th>
                    <th>Título</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($t->present()->getBanner() as $key => $value)
                  <tr>
                    <td class="text-center">
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
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </section>
        @endif --}}
      </div>
    </section>
  </div>
</div>
@endsection
@push('javascript')
{{-- <script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script> --}}

@endpush
