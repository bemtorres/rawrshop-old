@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendors/summernote/summernote-lite.min.css') }}">

@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Producto</h3>
        {{-- <p class="text-subtitle text-muted">Gestiona tu tienda de forma rápida y sencilla</p> --}}
      </div>
    </div>
  </div>
  @include('admin.producto._tabs')
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12">
          <div class="card">
            <div class="card-content">
              <form class="form form-horizontal form-submit" action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card-header">
                        <h4 class="card-title">
                          <i class="fa fa-plus me-2"></i>
                          Nuevo items
                        </h4>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <label for="input-nombre">Nombre<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="input-nombre" class="form-control" name="nombre" value="" placeholder="" required>
                        </div>
                        <div class="col-md-4">
                          <label for="input-codigo">Código<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="input-codigo" class="form-control keyUp" name="codigo_v" data-code="#input-url" data-codes="#code_input" required>
                        </div>

                        <div class="col-md-4">
                          <label for="input-url">URL</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="input-url" readonly class="form-control" name="codigo">
                        </div>

                        <div class="col-md-4">
                          <label for="input-descripcion">Descripción</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <textarea class="form-control" id="input-descripcion" name="descripcion" rows="3"></textarea>
                        </div>

                        <div class="col-md-4">
                          <label for="select_category">Categoría</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="select_category" name="categoria">
                            <option value="">--- sin categoría ---</option>
                            @foreach ($categorias as $c)
                            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="select_sub_category">Subcategoría</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="select_sub_category" name="subcategoria">
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="inputVisible">Visibilidad</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="inputVisible" name="activo">
                            <option value="si">Mostrar</option>
                            <option value="no">No mostrar</option>
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="input-logo">Imagen</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="file" id="input-logo" name="image" accept="image/*" onchange="preview(this,'preview')" />
                          <div class="mb-2">
                            <div id="preview"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="card-header">
                          <h4 class="card-title">
                            <i class="fa fa-plus me-2"></i>
                            Detalles
                          </h4>
                          {{-- <small>asdasdasdasd</small> --}}
                        </div>
                        <div class="col-md-4">
                          <label for="input-nombre-v">Variante</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="input-nombre-v" class="form-control" name="nombre_variante" value="" placeholder="">
                        </div>
                        <div class="col-md-4">
                          <label for="input-codigo-2">Código<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="code_input"></span>
                            <span class="input-group-text">-</span>
                            <input type="text" id="input-codigo-2" class="form-control keyUp" data-code="#input-url-2" data-variante="true" name="codigo_variante_v2" placeholder="" required>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label for="input-url-2">URL</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <div class="input-group">
                            <input type="text" id="input-url-2" readonly class="form-control" name="codigo_variante" placeholder="" required>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label for="input-descripcion-2">Descripción</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <textarea class="form-control" id="input-descripcion-2" name="descripcion_variante" rows="3"></textarea>
                        </div>

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
                  </div>
                </div>
                <div class="card-footer">
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
@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>
<script src="{{ asset('vendors/summernote/summernote-lite.min.js') }}"></script>
<script>
  const subs = [
    @foreach ($subcategorias as $sub)
    {'id': {{ $sub->id }}, 'category_id': {{ $sub->id_categoria }}, 'name': '{{ $sub->nombre }}' },
    @endforeach
  ];

  let selectElement = document.getElementById('select_category');
  selectElement.addEventListener('change', (event) => {
    reloadSubcategory(event.target.value)
  });

  function reloadSubcategory(id = null){
    var select = $('#select_sub_category');
    select.find('option').remove();
    select.append("<option value=''>--- sin subcategoría ---</option>");
    if(id) {
      var coms = subs.filter( c => c.category_id==id)
      $.each(coms, function(key,value) {
        select.append('<option value=' + value.id + '>' + value.name + '</option>')
      });
    }
  }

  reloadSubcategory(0);

  // let code = document.getElementById('input-codigo');
  // code.addEventListener('keyup', (event) => {
  //   // reloadSubcategory(event.target.value)
  //   document.getElementById('code_input').innerHTML = event.target.value;
  // });

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
<script>
  $('#input-descripcion').summernote({
    tabsize: 2,
    height: 400,
  })
</script>
@endpush