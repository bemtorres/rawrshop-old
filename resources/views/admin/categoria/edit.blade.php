@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('categorias.index'))
  {{-- @slot('color', 'dark') --}}
  @slot('body', "Categoría $c->nombre")
@endcomponent
<div class="page-heading">
  <div class="row">
    <div class="col-md-12">
      @include('admin.categoria._tab')
      <div class="page-heading">
        <section id="basic-horizontal-layouts">
          <div class="row match-height">
            <div class="col-md-6">
              <div class="card">
                <div class="card-content">
                  <form class="form form-horizontal form-submit" action="{{ route('categorias.update',$c->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="input-nombre_categoria">Nombre<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="input-nombre_categoria" class="form-control keyUp" data-code="#input-codigo" name="nombre" value="{{ $c->nombre }}" placeholder="" required>
                        </div>

                        <div class="col-md-4">
                          <label for="input-codigo">URL</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="input-codigo" readonly class="form-control" name="code" value="{{ $c->codigo }}"placeholder="" required>
                        </div>

                        <div class="col-md-4">
                          <label for="inputIconUno">Icono</label>
                        </div>
                        <div class="col-md-8 form-group font-awesome">
                          <select class="form-select fa" id="inputIconUno" name="icon">
                            <option value="">----------</option>
                            @foreach ($icons as $ikey => $iValue)
                            <option value="{{ $ikey }}" class="fa" data-icon="{{ $iValue[1] }}" {{ $c->getIcon()[0] == $ikey ? 'selected' : '' }}>
                            {!! $iValue[2] !!} {{ $iValue[0] }}
                          </option>
                          @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="inputVisible">Visibilidad</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="inputVisible" name="activo">
                            <option {{ $c->activo == true ? 'selected' : '' }} value="si">Mostrar</option>
                            <option {{ $c->activo == false ? 'selected' : '' }} value="no">No mostrar</option>
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
  </div>
</div>

@endsection
@push('javascript')
<script>
  $(".keyUp").keyup(function() {
    $($(this).data("code")).val(makeSlug(this.value));
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