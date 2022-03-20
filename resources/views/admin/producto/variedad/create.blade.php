@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('productos.index'))
  @slot('body', "Producto $p->nombre")
@endcomponent
<div class="page-heading">
  @include('admin.producto._tab')
  @include('admin.producto._tab_create')
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12">
          <div class="card">
            <form class="form form-horizontal form-submit" action="{{ route('variedad.store',$p->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="input-nombre-v">Variante</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="text" id="input-nombre-v" class="form-control" name="nombre_variante" value="" placeholder="">
                      </div>

                      <div class="col-md-4">
                        <label for="input-codigo">Código<span class="text-danger">*</span></label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="text" id="input-codigo" class="form-control keyUp" name="codigo_v" data-code="#codigo_variante" required>
                      </div>

                      <div class="col-md-4">
                        <label for="input-codigo-2">URL</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="code_input">{{ $p->codigo }}</span>
                          <span class="input-group-text">-</span>
                          <input type="text" id="codigo_variante" readonly class="form-control" name="codigo_variante" placeholder="" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="input-descripcion-2">Descripción</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <textarea class="form-control" id="input-descripcion-2" name="descripcion_variante" rows="3"></textarea>
                      </div>

                      <div class="col-md-4">
                        <label for="inputVisible">Visibilidad</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <select class="form-select" id="inputVisible" name="activo">
                          <option {{ $p->activo ? 'selected' : '' }} value="si">Mostrar</option>
                          <option {{ !$p->activo ? 'selected' : '' }} value="no">No mostrar</option>
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
                          <input type="number" id="input-precio" min="0" name="precio" class="form-control" placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="input-precio-descuento">Precio descuento</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                          <input type="number" id="input-precio-descuento" min="0" name="precio_descuento" class="form-control" placeholder="0">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="input-stock">Stock</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fa fa-sort-amount-down-alt"></i></span>
                          <input type="number" id="input-stock" min="0" name="stock" class="form-control" placeholder="0">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label for="input-stock-critico">Stock critico</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fa fa-shield-alt"></i></span>
                          <input type="number" id="input-stock-critico" min="0" name="stock_critico" class="form-control" placeholder="0">
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

  $(".keyUp").keyup(function() {
    var text = makeSlug(this.value).toLowerCase();
    $($(this).data("code")).val(text);

    // console.log($(this).data("codes"));
    if($(this).data("codes").length > 0) {
      $($(this).data("codes")).html(text);
    }

    if($(this).data("variante") == 'true') {
      var t = $("#input-url").val() + "-" + text;
      $($(this).data("code")).val(t);
    }
  });

  function makeSlug(text) {
    var a = 'àáäâèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;';
    var b = 'aaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------';
    var p = new RegExp(a.split('').join('|'), 'g');

    return text.toString().toLowerCase().replace(/\s+/g, '-')
        .replace(p, function (c) {
            return b.charAt(a.indexOf(c));
        })
        .replace(/&/g, '-y-')
        .replace(/[^\w\-]+/g, '')
        .replace(/\-\-+/g, '-')
        .replace(/^-+/, '')
        .replace(/-+$/, '');
  }

</script>
@endpush