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
              <div class="card mb-3">
                <div class="row">
                  <div class="col-md-4">
                    <img src="{{ asset($p->present()->getImagen()) }}" class="img-fluid" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $p->nombre }}</h5>
                      <p class="card-text">
                        $ {{ $p->variedades->first()->getPrice() }}. ({{ $p->codigo }}) -
                        {{ $p->descripcion }}
                      </p>
                      <p class="card-text"><small class="text-muted">
                        <i class="fa fa-link"></i>
                        {{ route('home.producto',$p->codigo) }}
                      </small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
@push('javascript')

@endpush