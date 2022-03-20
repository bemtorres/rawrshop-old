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
        <h3><i class="fa fa-search"></i> Pro <i class="fa fa-fighter-jet"></i></h3>
        <p class="text-subtitle text-muted">
          Buscamos mejorar tus oportunidades en el mundo virtual, para eso te enseñamos a seguir avanzando con tu tienda, página o proyecto
        </p>
      </div>
    </div>
  </div>
  @include('admin.tienda._tabs')
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                Contenido
              </h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li class="mb-3">Search Console tools and reports help you measure your site's Search traffic and performance, fix issues, and make your site shine in Google Search results Start now Optimize your content with Search Analytics</li>
                <li><a href="https://search.google.com/">Ir a la página</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                PRO
              </h4>
              <p>Agrega lo que quieras en la parte superior del proyecto JS</p>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.pro.update') }}">
                @csrf
                @method("PUT")
                <div class="form-body">
                  <div class="row">
                    <div class="form-group mb-3">
                      <label for="">Inserta componentes sobre el HEAD</label>
                      <textarea id="editor-css" class="form-control" name="meta">{{ $t->getConfigMeta() }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                      <label for="file">Sube site.xml</label>
                      <input type="file" class="form-control-file" id="file">
                    </div>
                    <div class="mb-3">

                    </div>
                    <div class="col-sm-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
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
  editor.save();
</script>
@endpush