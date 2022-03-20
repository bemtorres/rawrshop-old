@extends('home.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/rawrshop/index.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/OwlCarousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/OwlCarousel/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/rawrshop/favorite.css') }}">
<style>
  .cardd-hover:hover {
    transform: scale(1.04);
    transition: all 0.5s ease-in-out;
    cursor: pointer;
    border-width: 3px;
    border-style: solid;
    border-color: {{ $t->getConfigColor() }};
  }
</style>

@endpush
@section('content')

@include('home._header')
{{-- @include('home._nav') --}}
@include('home._banner')
{{-- @include('home._slider_banner') --}}
@if ($isMobile)
<div class="container py-2">
  <img src="assets/banner/banner01app.jpg" class="img-fluid item" alt="">
</div>
@else
<div class="container py-2">
  <img src="assets/banner/banner01web.jpg" class="img-fluid item" alt="">
</div>
@endif

{{-- <div class="col-md-12">
  <div class="col-md-2 col-lg-2 col-md-3 col-6 offset-md-0 mb-2 d-flex align-items-center">

    <div class="card shadow align-self-stretch" onclick="window.location='';">
      <div class="text-center border-bottom">
        <img class="card-img-top text-center img-fluid heaven" src="http://rawrshop.test/storage/products/71/esqueleto-chica-rosada1634276660.jpg" style=" ">
        <img class="img-fluid" src="/assets/rawrshop/template-promo.png">
      </div>
      <div class="card-body">
        <small>Perro</small>
        <br>
        <small>
          <del>$ 1000</del>
        </small>
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="font-weight-bold me-2 text-danger">$ 20000</h5>
        </div>
        <div class="d-flex align-items-center product">
          <span class="fas fa-star text-warning"></span>
          <span class="fas fa-star text-warning"></span>
          <span class="fas fa-star text-warning"></span>
          <span class="fas fa-star text-warning"></span>
          <span class="far fa-star text-warning"></span>
        </div>
        <h6 class="lead">aaa</h6>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="button">Button</button>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<div class="container py-2">
  <div class="row">
    @if (count($productos_favoritos) > 0)
    <div class="container px-4 pt-3" id="featured-3">
      <h2 class="pb-2 lead">
        Ofertas <strong>de la semana</strong>
      </h2>
    </div>
    <div class="col-md-12 mb-3">
      <div class="row owl-carousel owl-theme">
        @foreach ($productos_favoritos as $p)
        <div class="offset-md-0 mb-2 d-flex align-items-center item">
          @include('home._card_product_promo')
        </div>
        @endforeach
      </div>
    </div>
    @endif
    <div class="col-md-12 mb-3">
      <div class="row">
        <div class="container px-4 pt-3" id="featured-3">
          <h2 class="pb-2 lead">Nuestros <strong>productos</strong></h2>
        </div>
        @foreach ($productos as $p)
        <div class="col-md-2 col-lg-2 col-md-3 col-6 offset-md-0 mb-2 d-flex align-items-center">
          @include('home._card_product')
        </div>
        @endforeach
        <div class="d-flex justify-content-center mt-2">
          {!! $productos->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@include('home._redes_vertical')
@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/cart.js') }}"></script>
<script src="{{ asset('vendor/rawrshop/menu.js') }}"></script>
<script src="{{ asset('vendor/OwlCarousel/owl.carousel.min.js')}}"></script>
<script>
  $('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:10,
    responsiveClass:true,
    dots: false,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:7,
        }
    }
  });
</script>

@endpush