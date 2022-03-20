@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendors/summernote/summernote-lite.min.css') }}">
<style>
  select{
  padding:8px 5px;
  border-radius:5px;
  color:#333;
  width:250px;
}
.font-awesome .fa{
  font-family: "Font Awesome 5 Free", Open Sans;
  font-weight:501;
}
</style>
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('productos.index'))
  {{-- @slot('color', 'dark') --}}
  @slot('body', "Producto $p->nombre")
@endcomponent
@include('admin.producto._tab')
<div class="page-heading">
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6">
          <div class="card">
            <div class="card-content">
              <form class="form form-horizontal form-submit" action="{{ route('productos.update',$p->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="input-nombre">Nombre<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="input-nombre" class="form-control" name="nombre" value="{{ $p->nombre }}" placeholder="" required>
                        </div>
                        <div class="col-md-4">
                          <label for="input-codigo">Código<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="input-codigo" class="form-control" name="codigo" value="{{ $p->codigo }}" placeholder="" required>
                        </div>
                        <div class="col-md-4">
                          <label for="input-descripcion">Descripción</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <textarea class="form-control" id="input-descripcion" name="descripcion" rows="3">{{ $p->descripcion }}</textarea>
                        </div>

                        <div class="col-md-4">
                          <label for="select_category">Categoría</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="select_category" name="categoria">
                            <option value="">--- sin categoría ---</option>
                            @foreach ($categorias as $c)
                            <option {{ $c->id == $p->id_categoria ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->nombre }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="select_sub_category">Subcategoría</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="select_sub_category" name="subcategoria">
                            <option value="">--- sin subcategoría ---</option>
                            @foreach ($subcategorias as $s)
                            @if ($p->id_categoria == $s->id_categoria)
                            <option {{ $s->id == $p->id_subcategoria ? 'selected' :  '' }} value="{{ $s->id }}">{{ $s->nombre }}</option>
                            @endif
                            @endforeach
                          </select>
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
                          <label for="inputStock">Fuera de stock</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="inputStock" name="fuera_stock">
                            <option {{ $p->fuera_stock ? 'selected' : '' }} value="si">No Vender</option>
                            <option {{ !$p->fuera_stock ? 'selected' : '' }} value="no">Vender</option>
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
                        <div class="form-group text-center">
                          {{-- <label for="input-logo">Logo</label> --}}
                          <img src="{{ asset($p->present()->getImagen()) }}" width="300"  height="300" class="rounded img-fluid" alt="...">
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
        <div class="col-md-6">
          <div class="card">
            <div class="card-content">
              <form class="form form-horizontal form-submit" action="{{ route('productos.title.update',$p->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="one">
                <div class="card-body">
                  <div class="row">
                    <div class="text-center">
                      <h5>
                        <span class="badge bg-{{ $badge[0]['color'] }}" id="text_title_uno">
                          <i id="text_icon_uno" class="me-2 {{ $badge[0]['icon'] }}"></i>
                          <span id="text_value_uno">{{ $badge[0]['title'] }}</span>
                        </span>
                      </h5>
                    </div>
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="input-enabled">Habilitar</label>
                        </div>
                        <div class="col-md-8 mb-2">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="input-enabled" name="enabled" {{ $badge[0]['enabled'] ? 'checked' : '' }}>
                            <label class="form-check-label" for="input-enabled"></label>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label for="inputColorUno">Color</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="inputColorUno" name="color">
                            @foreach ($colors as $ckey => $cValue)
                            <option value="{{ $cValue }}" class="text-{{ $cValue }}"
                              {{ $badge[0]['color'] == $cValue ? 'selected' : '' }}>
                              <strong>{{ Str::upper($cValue) }}</strong>
                            </option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="inputIconUno">Icono</label>
                        </div>
                        <div class="col-md-8 form-group font-awesome">
                          <select class="form-select fa" id="inputIconUno" name="icon">
                            <option value="">----------</option>
                            @foreach ($icons as $ikey => $iValue)
                              <option value="{{ $ikey }}" class="fa" data-icon="{{ $iValue[1] }}" {{ $badge[0]['icon'] == $iValue[1] ? 'selected' : '' }}>
                              {!! $iValue[2] !!} {{ $iValue[0] }}
                            </option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="inputTextUno">Titulo<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="inputTextUno" class="form-control" name="titulo" value="{{ $badge[0]['title'] }}" required>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card">
            <div class="card-content">
              <form class="form form-horizontal form-submit" action="{{ route('productos.title.update',$p->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="two">
                <div class="card-body">
                  <div class="row">
                    <div class="text-center">
                      <h5>
                        <span class="badge bg-{{ $badge[1]['color'] }}" id="text_title_dos">
                          <i id="text_icon_dos" class="me-2 {{ $badge[1]['icon'] }}"></i>
                          <span id="text_value_dos">{{ $badge[1]['title'] }}</span>
                        </span>
                      </h5>
                    </div>
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="input-enabled">Habilitar</label>
                        </div>
                        <div class="col-md-8 mb-2">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="input-enabled" name="enabled" {{ $badge[1]['enabled'] ? 'checked' : '' }}>
                            <label class="form-check-label" for="input-enabled"></label>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label for="inputColorDos">Color</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="inputColorDos" name="color">
                            @foreach ($colors as $ckey => $cValue)
                            <option value="{{ $cValue }}" class="text-{{ $cValue }}" {{ $badge[1]['color'] == $cValue ? 'checked' : '' }}>
                              <strong>{{ Str::upper($cValue) }}</strong>
                            </option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="inputIconDos">Icono</label>
                        </div>
                        <div class="col-md-8 form-group font-awesome">
                          <select class="form-select fa" id="inputIconDos" name="icon">
                            <option value="">----------</option>
                            @foreach ($icons as $ikey => $iValue)
                            <option value="{{ $ikey }}" class="fa" data-icon="{{ $iValue[1] }}" {{ $badge[1]['icon'] == $iValue[1] ? 'selected' : '' }}>
                            {!! $iValue[2] !!} {{ $iValue[0] }}
                          </option>
                          @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="inputTextDos">Titulo<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="inputTextDos" class="form-control" name="titulo" value="{{ $badge[1]['title'] }}" required>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                        </div>
                      </div>
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
@endsection
@push('javascript')
<script src="{{ asset('vendors/summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>
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

  let code = document.getElementById('input-codigo');
  code.addEventListener('keyup', (event) => {
    document.getElementById('code_input').innerHTML = event.target.value;
  });

  $("#inputColorUno").change(function () {
    $("#text_title_uno").removeAttr('class');
    $("#text_title_uno").attr('class', 'badge bg-'+ $(this).val());
    // text_uno.innerText =  $(this).text();
  })

  $("#inputIconUno").change(function () {
    let icon =  $(this).find(':selected').data('icon');
    if (icon) {
      $("#text_icon_uno").attr('class',icon);
    }else{
      $("#text_icon_uno").attr('class','');
    }
  });

  $("#inputIconUno").change(function () {
    let icon =  $(this).find(':selected').data('icon');
    if (icon) {
      $("#text_icon_uno").attr('class',icon);
    }else{
      $("#text_icon_uno").attr('class','');
    }
  });

  $("#inputTextUno").keyup(function() {
    let text = document.getElementById('text_value_uno');
    text.innerHTML = $(this).val();
  });

  $("#inputColorDos").change(function () {
    $("#text_title_dos").removeAttr('class');
    $("#text_title_dos").attr('class', 'badge bg-'+ $(this).val());
  })

  $("#inputIconDos").change(function () {
    let icon =  $(this).find(':selected').data('icon');
    if (icon) {
      $("#text_icon_dos").attr('class',icon);
    }else{
      $("#text_icon_dos").attr('class','');
    }
  });

  $("#inputIconDos").change(function () {
    let icon =  $(this).find(':selected').data('icon');
    if (icon) {
      $("#text_icon_dos").attr('class',icon);
    }else{
      $("#text_icon_dos").attr('class','');
    }
  });

  $("#inputTextDos").keyup(function() {
    let text = document.getElementById('text_value_dos');
    text.innerHTML = $(this).val();
  });
</script>
<script>
  $('#input-descripcion').summernote({
    tabsize: 2,
    height: 400,
  })
</script>
@endpush