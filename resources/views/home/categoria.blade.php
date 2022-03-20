@extends('home.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/rawrshop/index.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/rawrshop/favorite.css') }}">
@endpush
@section('content')
@include('home._header')
@include('home._banner')

@if ($isMobile)
<div class="container my-3">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div>
        <h4 class="text-muted">CATEGORÍA - {{ $categoria->nombre }}</h4>
      </div>
      <div class="row">
        @forelse ($productos as $p)
        <div class="col-md-4 col-lg-3 col-sm-12 col-md-6 col-6 offset-md-0 mb-2 d-flex align-items-center">
          @include('home._card_product')
        </div>
        @empty
        <div class="text-center align-items-center mt-5">
          <h6>No se han encontrado productos disponibles</h6>
        </div>
        @endforelse
        <div class="d-flex justify-content-center mt-2">
          {!! $productos->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@else
<div class="container my-3">
  <div class="row">
    <div class="col-md-3 mb-3">
      @include('home._categorias_acordeon')
    </div>
    <div class="col-md-9 mb-3">
      <div>
        <h4 class="text-muted">CATEGORÍA - {{ $categoria->nombre }}</h4>
      </div>
      <div class="row">
        @forelse ($productos as $p)
        <div class="col-md-4 col-lg-3 col-sm-12 col-md-6 col-6 offset-md-0 mb-2 d-flex align-items-center">
          @include('home._card_product')
        </div>
        @empty
        <div class="text-center align-items-center mt-5">
          <h6>No se han encontrado productos disponibles</h6>
        </div>
        @endforelse
        <div class="d-flex justify-content-center mt-2">
          {!! $productos->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endif


@include('home._redes_vertical')
@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/cart.js') }}"></script>
<script src="{{ asset('vendor/rawrshop/menu.js') }}"></script>
@endpush
