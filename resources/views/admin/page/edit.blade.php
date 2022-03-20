@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendors/summernote/summernote-lite.min.css') }}">
@endpush
@section('content')
<div class="page-heading">

  @include('admin.page._tab')

  <div class="page-heading">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form class="form form-horizontal form-submit" method="post" action="{{ route('pagina.update',$p->id) }}">
            @csrf
            @method('PUT')
              <div class="col-md-4">
                <label for="inputVisible">Visibilidad</label>
              </div>
              <div class="col-md-8 form-group">
                <select class="form-select" id="inputVisible" name="activo">
                  <option {{ $p->estado == 1 ? 'selected' : '' }} value="si">Mostrar</option>
                  <option {{ $p->estado == 2 ? 'selected' : '' }} value="no">No mostrar</option>
                </select>
              </div>

              <div class="col-md-4">
                <label for="input-titulo">
                  Titulo
                </label>
              </div>
              <div class="col-md-8 form-group mb-3">
                <input type="text" id="input-titulo" class="form-control keyUp"  data-code="#input-code" name="titulo" value="{{ $p->titulo }}" placeholder="" required>
              </div>

              <div class="col-md-4">
                <label for="input-code">
                  Código
                </label>
              </div>
              <div class="col-md-8 form-group mb-3">
                <input type="text" id="input-code" readonly class="form-control" name="code" value="{{ $p->code }}" placeholder="" required>
              </div>

              <div class="col-md-12">
                <label for="summernote">
                  Contenido
                </label>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea id="summernote" class="form-control" name="contenido" >{{ $p->getContenidoBody() }}</textarea>
                </div>
              </div>
              <div class="col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                  {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection @push('javascript')
<script src="{{ asset('vendors/summernote/summernote-lite.min.js') }}"></script>
<script>
    $('#summernote').summernote({
      tabsize: 2,
      height: 400,
    })

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