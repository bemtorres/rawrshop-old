@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-md-12 order-md-1 order-last">
        <h3><i class="fa fa-images"></i> Assets</h3>
        <p class="text-subtitle text-muted">
          Mejora tu apariencia, cambiando el logo de página y el icono en el navegador
        </p>
      </div>
    </div>
  </div>
  @include('admin.tienda._tabs')
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                <i class="fa fa-store-alt me-2"></i>
                WEB
              </h4>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.title.update') }}">
                @csrf
                @method("PUT")
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="input-nombre">Título  de la página</label>
                    </div>
                    <div class="col-md-12 form-group">
                      <input type="text" id="input-nombre" class="form-control" name="title" value="{{ $t->getTitleWeb() }}" placeholder="" required>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                      {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                <i class="fa fa-image me-2"></i>
                Mi imagenes
              </h4>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.assets') }}"  enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-12">
                        {{-- <div class="col-md-4">
                          <label for="input-enabled">Habilitar mantenimiento</label>
                        </div> --}}
                        <div class="col-md-8 mb-2">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="input-enabled" name="logo_enabled" {{ $t->getLogoEnabled() ? 'checked' : '' }}>
                            <label class="form-check-label" for="input-enabled">
                              Habilitar logo
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label for="input-logo">Logo</label>
                      </div>
                      <div class="col-md-12 form-group">
                        <input type="file" id="input-logo" name="image" accept="image/*" onchange="preview(this,'preview')" />
                        <div class="mb-2">
                          <div id="preview"></div>
                        </div>
                      </div>
                      <div class="form-group text-center">
                        {{-- <label for="input-logo">Logo</label> --}}
                        <img src="{{ asset($t->present()->getLogo() ) }}" width="300"  height="300" class="rounded img-fluid" alt="...">
                      </div>
                    </div>
                    <div class="col-md-6">

                      <div class="col-md-12">
                        <label for="input-logo">Icono (svg o png, 30x30 - 50x50)</label>
                      </div>
                      <div class="col-md-12 form-group">
                        <input type="file" id="input-logo" name="image2" accept="image/*" onchange="preview(this,'preview2')" />
                        <div class="mb-2">
                          <div id="preview2"></div>
                        </div>
                      </div>
                      <div class="form-group text-center">
                        {{-- <label for="input-logo">Logo</label> --}}
                        <img src="{{ asset($t->present()->getIcono() ) }}" width="300"  height="300" class="rounded img-fluid" alt="...">
                      </div>

                    </div>


                    <div class="col-sm-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                      {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection @push('javascript')
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>
@endpush