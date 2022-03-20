@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-md-12 order-md-1 order-last">
        <h3><i class="fa fa-search"></i> Configuración de SEO</h3>
        <p class="text-subtitle text-muted">
          SEO, <strong>acrónimo de Search Engine Optimization</strong> en castellano optimización de motores de búsqueda, son el conjunto de acciones y técnicas que se emplean para mejorar el posicionamiento (la visibilidad) en buscadores de un sitio web en Internet, dentro de los resultados orgánicos en los motores de búsqueda como, por ejemplo, Google, Bing o Yahoo.
        </p>
      </div>
    </div>
  </div>
  @include('admin.tienda._tabs')
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                <i class="fa fa-search me-2"></i>
                SEO
              </h4>
            </div>
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.seo.update') }}"  enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="input-enabled">Habilitar SEO</label>
                    </div>
                    <div class="col-md-8 mb-2">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="input-enabled" name="seo_enabled" {{ $t->getSeoEnabled() ? 'checked' : '' }}>
                        <label class="form-check-label" for="input-enabled">Para que los buscadores te encuentren</label>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label for="input-website">Website</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select id="input-website" class="form-control" name="website">
                        @foreach ($seoTypes as $sKey => $sValue)
                          <option {{ $t->getSeoType() == $sValue ? 'selected' : '' }} value="{{ $sValue }}">{{ $sValue }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-4">
                      <label for="input-titulo">Titulo</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" id="input-titulo" class="form-control" name="titulo" value="{{ $t->getSeoWebTitle() }}" placeholder="">
                    </div>

                    <div class="col-md-4">
                      <label for="input-descripcion">Descripción</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <label for="" class="form-label"></label>
                      <textarea class="form-control" name="descripcion" id="input-descripcion" rows="3">{{ $t->getSeoDescription() }}</textarea>
                    </div>

                    <div class="col-md-4">
                      <label for="input-keywords">Keywords <br><small>Separa las palabras por <strong>, (comas)</strong></small></label>
                    </div>
                    <div class="col-md-8 form-group">
                      <label for="" class="form-label"></label>
                      <textarea class="form-control" name="keywords" id="input-keywords" rows="3">{{ $t->getSeoKeyword() }}</textarea>
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
                    <div class="col-md-12">
                      <div class="form-group text-center">
                        <img src="{{ asset($t->present()->getLogoSeo()) }}" width="300"  height="300" class="rounded img-fluid" alt="...">
                      </div>
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
    </section>
  </div>
</div>


@endsection @push('javascript')
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>
@endpush