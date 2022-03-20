@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Configuración de mi página</h3>
        <p class="text-subtitle text-muted">Gestiona tu página de forma rápida y sencilla</p>
      </div>
    </div>
  </div>

  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                <i class="fa fa-rss me-2"></i>
                Redes sociales
              </h4>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.rrss') }}">
                @csrf
                @method("PUT")
                <div class="row">
                  @foreach ($redes as $keyR => $valueR)
                  <div class="col-md-4">
                    <label for="input-{{ $keyR }}" for="input-{{ $keyR }}">
                      <i class="{{ $valueR[0] }} text-{{ $valueR[1] }} me-2" id="{{ $valueR[1] == 'insta' ? 'insta' : '' }}"></i>
                      {{ ucwords($keyR) }}
                    </label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" id="input-{{ $keyR }}" class="form-control" name="{{ $keyR }}" value="{{ $t->presentRRSS()->redes($keyR) }}" placeholder="">
                  </div>
                  @endforeach
                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                <i class="bi bi-clipboard-check"></i>
                Redes sociales
              </h4>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.rrss.enabled') }}">
                @csrf
                @method("PUT")
                <div class="row">

                  @foreach ($redes as $keyR => $valueR)
                  <div class="col-md-4">
                    <label>
                      <i class="{{ $valueR[0] }} text-{{ $valueR[1] }} me-2" id="{{ $valueR[1] == 'insta' ? 'insta' : '' }}"></i>
                      {{ ucwords($keyR) }}
                    </label>
                  </div>
                  <div class="col-md-8 form-group">
                    <div class="col-md-12 mb-2">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="input-enabled-{{ $keyR }}" name="{{ $keyR }}_enabled" {{ $t->presentRRSS()->enabled($keyR) ? 'checked' : '' }}>
                        <label class="form-check-label" for="input-enabled-{{ $keyR }}">Mostrar <small>(Se mostrará en ventana)</small></label>
                      </div>
                    </div>
                    <div class="col-md-12 mb-2">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="input-posicion-{{ $keyR }}" name="{{ $keyR }}_posicion" {{ $t->presentRRSS()->posicion($keyR) ? 'checked' : '' }}>
                        <label class="form-check-label" for="input-posicion-{{ $keyR }}">Horizontal <small>(Se mostrará en el menú)</small></label>
                      </div>
                    </div>
                    <div class="col-md-12 mb-2">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="input-enabled-{{ $keyR }}" name="{{ $keyR }}_footer_enabled" {{ $t->presentRRSS()->footer_enabled($keyR) ? 'checked' : '' }}>
                        <label class="form-check-label" for="input-enabled-{{ $keyR }}">Mostrar footer <small>(Se mostrará en el pie de la página)</small></label>
                      </div>
                    </div>
                  </div>
                  @endforeach

                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                    {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
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
@endpush