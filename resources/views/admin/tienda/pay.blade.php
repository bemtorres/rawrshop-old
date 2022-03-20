@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3><i class="bi bi-cash-stack"></i> Configuración de pagos</h3>
        <p class="text-subtitle text-muted">Gestiona tu tienda de forma rápida y sencilla</p>
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
                <i class="fab fa-whatsapp me-2"></i>
                Envio de pagos a Whatsapp
              </h4>
              <a href="{{ route('tienda.rrss') }}"> Cambia tu número de WHATSAPP en RRSS</a>
              {{ $t->presentRRSS()->redes('whatsapp') }}
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="form form-horizontal form-submit" action="{{ route('tienda.pay.update') }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-md-4">
                      <label for="input-enabled">Habilitar</label>
                    </div>
                    <div class="col-md-8 mb-2">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="input-enabled" name="enabled" {{ $t->getPayWhatsappEnabled() ? 'checked' : '' }}>
                        <label class="form-check-label" for="input-enabled">
                          Activar carrito de pedido whatsapp
                        </label>
                      </div>
                    </div>
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
      </div>
    </section>
  </div>
</div>
@endsection @push('javascript')
@endpush