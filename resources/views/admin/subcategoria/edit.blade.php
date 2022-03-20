@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('categorias.show',$s->id_categoria))
  {{-- @slot('color', 'dark') --}}
  @slot('body', "subcategoría $s->nombre")
@endcomponent
<div class="page-heading">
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6">
          <div class="card">
            <div class="card-content">
              <form class="form form-horizontal form-submit" action="{{ route('subcategorias.update',$s->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="input-nombre_categoria">Nombre<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" id="input-nombre_categoria" class="form-control keyUp" data-code="#input-codigo" name="nombre" value="{{ $s->nombre }}" placeholder="" required>
                    </div>

                    <div class="col-md-4">
                      <label for="input-codigo">URL</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" id="input-codigo" readonly class="form-control" name="code" value="{{ $s->codigo }}"placeholder="" required>
                    </div>

                    <div class="col-md-4">
                      <label for="inputVisible">Visibilidad</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select class="form-select" id="inputVisible" name="activo">
                        <option {{ $s->activo == true ? 'selected' : '' }} value="si">Mostrar</option>
                        <option {{ $s->activo == false ? 'selected' : '' }} value="no">No mostrar</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Guardar</button>
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
@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>
@endpush