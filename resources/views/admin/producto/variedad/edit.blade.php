@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('productos.variedades', $p->id))
  @slot('body', "Producto $p->nombre")
@endcomponent
<div class="page-heading">
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12">
          <div class="card">
            <form class="form form-horizontal form-submit" action="{{ route('variedad.update',$v->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="input-nombre-v">Nombre variante</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="text" id="input-nombre-v" class="form-control" name="nombre_variante" value="{{ $v->nombre }}" placeholder="">
                      </div>
                      <div class="col-md-4">
                        <label for="input-codigo-2">Código<span class="text-danger">*</span></label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="input-group mb-3">
                          <input type="text" id="input-codigo-2" class="form-control" name="codigo_variante" value="{{ $v->codigo }}">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="input-descripcion-2">Descripción</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <textarea class="form-control" id="input-descripcion-2" name="descripcion_variante" rows="3">{{ $v->descripcion }}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label for="inputVisible">Visibilidad</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <select class="form-select" id="inputVisible" name="activo">
                          <option {{ $v->activo ? 'selected' : '' }} value="si">Mostrar</option>
                          <option {{ !$v->activo ? 'selected' : '' }} value="no">No mostrar</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <label for="input-logo2">Imagen</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="file" id="input-logo2" name="image2" accept="image/*" onchange="preview(this,'preview2')" />
                        <div class="mb-2">
                          <div id="preview2"></div>
                        </div>
                      </div>
                      <div class="form-group text-center">
                        {{-- <label for="input-logo">Logo</label> --}}
                        <img src="{{ asset($v->present()->getImagen()) }}" width="300"  height="300" class="rounded img-fluid" alt="...">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="input-precio">Precio<span class="text-danger">*</span></label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                          <input type="number" id="input-precio" min="0" name="precio" class="form-control" value="{{ $v->precio }}" placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="input-precio-descuento">Precio descuento</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                          <input type="number" id="input-precio-descuento" min="0" name="precio_descuento" value="{{ $v->precio_descuento }}" class="form-control" placeholder="0">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="input-stock">Stock</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fa fa-sort-amount-down-alt"></i></span>
                          <input type="number" id="input-stock" min="0" name="stock" value="{{ $v->stock }}" class="form-control" placeholder="0">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="input-stock-critico">Stock critico</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fa fa-shield-alt"></i></span>
                          <input type="number" id="input-stock-critico" min="0" name="stock_critico" value="{{ $v->stock_critico }}" class="form-control" placeholder="0">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="col-sm-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>
<script>

  let code = document.getElementById('input-codigo');
  code.addEventListener('keyup', (event) => {
    // reloadSubcategory(event.target.value)
    document.getElementById('code_input').innerHTML = event.target.value;
  });

</script>
@endpush