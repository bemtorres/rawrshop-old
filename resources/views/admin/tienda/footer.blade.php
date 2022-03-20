@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendors/summernote/summernote-lite.min.css') }}">
@endpush
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Footer página principal</h3>
        <p class="text-subtitle text-muted">Gestiona el pie de página</p>
      </div>
    </div>
  </div>
  @include('admin.tienda._tabs_web_principal')
  <div class="page-heading">
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form class="form form-horizontal form-submit" method="post" action="{{ route('tienda.footer.update') }}">
                @csrf
                @method("PUT")
                <div class="row">
                  <div class="col-md-4">
                    <label for="input-enabled">Habilitar Newsletter</label>
                  </div>
                  <div class="col-md-8 mb-2">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="input-enabled" name="enabled" {{ $t->presentFooter()->getEnabled() ? 'checked' : '' }}>
                      <label class="form-check-label" for="input-enabled">
                        <span class="badge bg-warning">En desarrollo</span>
                      </label>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="input-content">Descripción</label>
                  </div>
                  <div class="col-md-12 form-group">
                    <label for="" class="form-label"></label>
                    <textarea class="form-control" name="content" id="input-content" rows="3">{{ $t->presentFooter()->getContent() }}</textarea>
                  </div>

                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          @include('home._footer')
        </div>
      </div>
    </section>
  </div>
</div>


@endsection @push('javascript')
<script src="{{ asset('vendors/summernote/summernote-lite.min.js') }}"></script>
<script>
  $('#input-content').summernote({
    tabsize: 2,
    height: 400,
  })
</script>
@endpush