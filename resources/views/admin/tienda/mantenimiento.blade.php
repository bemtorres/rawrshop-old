@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-md-12 order-md-1 order-last">
        <h3><i class="fa fa-hammer"></i> Mantenimiento</h3>
        <p class="text-subtitle text-muted">
          Si estas configurando tu página web, activa el mantenimiento para quedar fuera de linea
        </p>
      </div>
    </div>
  </div>
  @include('admin.tienda._tabs')
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                <i class="fa fa-hammer me-2"></i>
                Mantenimiento
              </h4>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.mantenimiento.update') }}"  enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="input-enabled">Habilitar mantenimiento</label>
                    </div>
                    <div class="col-md-8 mb-2">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="input-enabled" name="mantenimiento_enabled" {{ $t->getMantenimientoEnabled() ? 'checked' : '' }}>
                        <label class="form-check-label" for="input-enabled">
                          Al activar el mantenimiento la tienda se redireccionara en a mantenimiento
                        </label>
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