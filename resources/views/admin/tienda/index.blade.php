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
  @include('admin.tienda._tabs')
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                <i class="fa fa-store-alt me-2"></i>
                Mi página
              </h4>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.update',$t->id) }}"  enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="input-nombre">Nombre<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" id="input-nombre" class="form-control" name="nombre" value="{{ $t->nombre }}" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                      <label for="input-rubro">Rubro<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" id="input-rubro" class="form-control" name="rubro" value="{{ $t->rubro }}" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                      <label for="input-descripcion">Descripción</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" id="input-descripcion" class="form-control" name="descripcion" value="{{ $t->descripcion }}" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                      <label for="select_tipo">Tipo de página</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select id="select_tipo" class="form-control" name="tipo" required>
                        @foreach ($tipos as $key => $value)
                          <option {{ $t->tipo == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="input-email">Correo contacto</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="email" id="input-email" class="form-control" name="correo" value="{{ $t->correo }}" placeholder="">
                    </div>
                    <div class="col-md-4">
                      <label for="input-direccion">Dirección</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" id="input-direccion" class="form-control" name="direccion" value="{{ $t->direccion }}" placeholder="">
                    </div>
                    <div class="col-md-4">
                      <label for="input-color">Color empresa<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="color" id="input-color" class="form-control" name="color" value="{{ $t->getConfigColor() }}" placeholder="">
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