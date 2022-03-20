@extends('layouts.app')
@push('stylesheet')

<link rel="stylesheet" href="{{ asset('vendors/summernote/summernote-lite.min.css') }}">


@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-md-12 order-md-1 order-last">
        <h3>
          <a href="{{ route('pagina.index') }}" class="text-primary me-2"><i class="fas fa-chevron-circle-left"></i></a>
          <i class="fa fa-code"></i> Página web
        </h3>
        <p class="text-subtitle text-muted">
          Crea secciones de página web
        </p>
      </div>
    </div>
  </div>
  {{-- @include('admin.tienda._tabs') --}}
  <div class="page-heading">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form class="form form-horizontal form-submit" method="post" action="{{ route('pagina.store') }}">
            @csrf
              <div class="col-md-4">
                <label for="input-titulo">
                  Titulo
                </label>
              </div>
              <div class="col-md-8 form-group mb-3">
                <input type="text" id="input-titulo" class="form-control keyUp"  data-code="#input-code" name="titulo" value="" placeholder="" required>
              </div>

              <div class="col-md-4">
                <label for="input-code">
                  Código
                </label>
              </div>
              <div class="col-md-8 form-group mb-3">
                <input type="text" id="input-code" readonly class="form-control" name="code" placeholder="" required>
              </div>

              <div class="col-md-12">
                <label for="summernote">
                  Contenido
                </label>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea id="summernote" class="form-control" name="contenido" ></textarea>
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
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>

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