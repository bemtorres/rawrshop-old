@extends('layouts.app')
@push('stylesheet')
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/codemirror.min.js" integrity="sha512-hGVnilhYD74EGnPbzyvje74/Urjrg5LSNGx0ARG1Ucqyiaz+lFvtsXk/1jCwT9/giXP0qoXSlVDjxNxjLvmqAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/codemirror.min.css" integrity="sha512-6sALqOPMrNSc+1p5xOhPwGIzs6kIlST+9oGWlI4Wwcbj1saaX9J3uzO3Vub016dmHV7hM+bMi/rfXLiF5DNIZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-md-12 order-md-1 order-last">
        <h3><i class="fa fa-code"></i> Modo programador</h3>
        <p class="text-subtitle text-muted">
          Personifica el página a tu manera. <br> Está herramienta es solo para personas que tienen un conocimiento en CSS y JS.
          <br>
          <strong>Advertencia</strong>: Todo lo escrito y desarrollado por este ventana no es responsabilidad de rawrshop.cl
        </p>
      </div>
    </div>
  </div>
  @include('admin.tienda._tabs')
  <div class="page-heading">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            <i class="fab fa-css3-alt me-2 text-primary"></i>
            Personalización de Stylesheet
          </h4>
          <p>Personaliza de menera profesional tu sitio, agregando contenido de css personalizado</p>
        </div>
        <div class="card-body">
          <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.codigo.css') }}">
            @csrf
            @method("PUT")
            <div class="form-body">
              <div class="row">
                <div class="form-group shadow">
                  <textarea id="editor-css" class="form-control" name="code-css">{{ $t->getConfigCss() }}</textarea>
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
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            <i class="fab fa-js me-2 text-warning"></i>
            Personalizacion de Javascript
          </h4>
          <p>Agrega contenido en javascript</p>
        </div>
        <div class="card-body">
          <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.codigo.js') }}">
            @csrf
            @method("PUT")
            <div class="form-body">
              <div class="row">
                <div class="form-group shadow">
                  <textarea id="editor-js" class="form-control" name="code-js">{{ $t->getConfigJs() }}</textarea>
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
</div>


@endsection @push('javascript')
<script>
  var editor = CodeMirror.fromTextArea(document.getElementById('editor-css'), {
    mode: 'text/css',
    lineNumbers: true,
    indentWithTabs: true,
    smartIndent: true,
    lineNumbers: true,
    matchBrackets : true,
    autofocus: true,
    extraKeys: {"Ctrl-Space": "autocomplete"},
  });

  var editor2 = CodeMirror.fromTextArea(document.getElementById('editor-js'), {
    mode: "javascript",
    lineNumbers: true,
  });
  editor2.save();
  editor.save();

</script>
@endpush