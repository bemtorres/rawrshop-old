@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/chat/floating-wpp.css') }}">

@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Configuración chat de whatsapp</h3>
        {{-- <p class="text-subtitle text-muted">Gestiona tu página de forma rápida y sencilla</p> --}}
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
                <i class="bi bi-chat-dots text-success"></i>
                Chat de Whatsapp
              </h4>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.chat') }}">
                @csrf
                @method("PUT")
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-12 mb-2">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="input-enabled" name="enabled" {{ $t->presentRRSS()->chat('enabled') ? 'checked' : '' }}>
                        <label class="form-check-label" for="input-enabled">Mostrar chat</label>
                      </div>
                    </div>

                    <div class="col-md-12 mb-2">
                      <label for="input-">
                        <i class="fab fa-whatsapp text-success me-2" ></i>
                        Whatsapp <strong>569xxxxxxx</strong>
                      </label>
                    </div>
                    <div class="col-md-12 form-group mb-3">
                      <input type="text" id="input-" class="form-control" name="whatsapp" value="{{ $t->presentRRSS()->redes('whatsapp') }}" placeholder="" required>
                    </div>

                    <div class="col-md-12 mb-2">
                      <label for="input-popupMessage">
                        Mensaje bienvenida
                      </label>
                    </div>
                    <div class="col-md-12 form-group mb-3">
                      <input type="text" id="input-popupMessage" class="form-control" name="popupMessage" value="{{ $t->presentRRSS()->chat('popup_message') }}" placeholder="Hola! ¿Qué tal?" required>
                    </div>

                    <div class="col-md-12 mb-2">
                      <label for="input-message">
                        Mensaje
                      </label>
                    </div>
                    <div class="col-md-12 form-group mb-3">
                      <input type="text" id="input-message" class="form-control" name="message" value="{{ $t->presentRRSS()->chat('message') }}" placeholder="Me gustaría">
                    </div>

                    <div class="col-md-12 mb-2">
                      <label for="input-headerTitle">
                        Cabecera
                      </label>
                    </div>
                    <div class="col-md-12 form-group mb-3">
                      <input type="text" id="input-headerTitle" class="form-control" name="headerTitle" value="{{ $t->presentRRSS()->chat('header_title') }}" placeholder="Me gustaría">
                    </div>

                    <div class="col-md-12 mb-2">
                      <label for="input-size">
                        Size <small>65</small>
                      </label>
                    </div>
                    <div class="col-md-12 form-group mb-3">
                      <input type="number" id="input-size" class="form-control" name="size"  value="{{ $t->presentRRSS()->chat('size') }}" required>
                    </div>

                    <div class="col-sm-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
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

<div id="myChat"></div>

@endsection
@push('javascript')
@include('home._chat')
@endpush