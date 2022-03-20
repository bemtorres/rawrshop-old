@php
  $title = $t->nombre . ' - ' . $p->raw_info()['title'];
  $url = $p->raw_info()['route'];
@endphp
@extends('home.app')
@push('master')
{!! SEO::generate() !!}
@endpush
@push('stylesheet')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<link rel="stylesheet" href="{{ asset('vendor/OwlCarousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/OwlCarousel/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/rawrshop/favorite.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/rawrshop/product.css') }}">
@endpush
@section('content')
@include('home._banner')
<div class="container mt-3 mb-5">
  <div class="row no-gutters">
    <div class="card p-0">
      <div class="card-header">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb pt-2">
            <li class="breadcrumb-item">
              <a href="{{ route('home.index') }}">{{ $t->nombre }}</a>
            </li>
            @if ($p->id_categoria)
            <li class="breadcrumb-item" aria-current="page">
              <a href="{{ route('home.categoria',['c', $p->categoria->codigo]) }}">{{ $p->categoria->nombre ?? '' }}</a>
            </li>
            @endif
            @if ($p->id_subcategoria)
            <li class="breadcrumb-item" aria-current="page">
              <a href="{{ route('home.categoria',['s', $p->subcategoria->codigo]) }}">{{ $p->subcategoria->nombre ?? '' }}</a>
            </li>
            @endif
          </ol>
        </nav>
      </div>
    </div>
    <div class="card">
      <h4 class="card-title">
        <a href="{{ route('home.index') }}" class="text-dark"><i class="fas fa-chevron-circle-left"></i></a>
        {{ $p->nombre }}
      </h4>
      <div class="card-body row px-4">
        <div class="col-md-5 pe-2 col-sm-7">
          <div class="card">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="{{ asset($p->present()->getImagen()) }}" />
                </div>

                @foreach ($p->assets_data() as $keyA => $valueA)
                  <div class="swiper-slide">
                    <img src="{{ asset($valueA['original']) }}" />
                  </div>
                @endforeach

                @foreach ($p->variedades as $v)
                @if (!empty($v->present()->getImagenPublic()))
                  <div class="swiper-slide">
                    <img src="{{ asset($v->present()->getImagenPublic()) }}" />
                  </div>
                @endif
                @endforeach
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper mySwiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="{{ asset($p->present()->getThumbnails()) }}" />
                </div>

                @foreach ($p->assets_data() as $keyA => $valueA)
                <div class="swiper-slide">
                  <img src="{{ asset($valueA['thumbnails']) }}" />
                </div>
                @endforeach

                @foreach ($p->variedades as $v)
                @if (!empty($v->present()->getImagenPublic()))
                  <div class="swiper-slide">
                    <img src="{{ asset($v->present()->getThumbnails()) }}" />
                  </div>
                @endif
                @endforeach
              </div>
            </div>
          </div>
          @component('components.button._shared')
            @slot('url', $url)
            @slot('title', $title)
          @endcomponent
        </div>
        <div class="col-md-7 col-sm-5">
          {{-- <div class="card rounded border border-secondary"> --}}
          <div class="card">
            @if (!$p->fuera_stock)
            <div class="py-0 ">
                <div class="card-title justify-content-between">
                  @php
                    $badge = $p->present()->getBadge();
                  @endphp
                  @if ($badge[0]['enabled'])
                  <span class="badge bg-{{ $badge[0]['color'] }}" id="text_title_dos">
                    <i id="text_icon_dos" class="{{ $badge[0]['icon'] }}"></i>
                    <span id="text_value_dos">{{ $badge[0]['title'] }}</span>
                  </span>
                  @endif
                  @if ($badge[1]['enabled'])
                  <span class="badge bg-{{ $badge[1]['color'] }}" id="text_title_dos">
                    <i id="text_icon_dos" class="{{ $badge[1]['icon'] }}"></i>
                    <span id="text_value_dos">{{ $badge[1]['title'] }}</span>
                  </span>
                  @endif
                </div>
              </div>
            @endif
            {{-- <div class="d-flex flex-row align-items-center">
              <div class="p-ratings">
                <span class="fas fa-star text-warning"></span>
                <span class="fas fa-star text-warning"></span>
                <span class="fas fa-star text-warning"></span>
                <span class="fas fa-star text-warning"></span>
                <span class="far fa-star text-warning"></span>
              </div>
              <span class="ms-1">5.0</span>
            </div> --}}
            {{-- <small id="product_code">CODE: {{ $p->variedades->first()->codigo }}</small> --}}
            <div class="">
              <h3>{{ $p->nombre }}</h3>
              <small id="product_name_variante">
                {{ $p->variedades->first()->nombre }}
                {{-- <span class="badge bg-secondary">CODE: {{ $p->variedades->first()->codigo }}</span> --}}
              </small>
              <br>
              <span class="font-weight-bold">
                @if ($p->variedades->first()->precio_descuento > 0)
                <small>
                  <del>$ {{ $p->variedades->first()->getPriceDescuento() }}</del>
                </small>
                @endif
              </span>
              <h3 class="font-weight-bold display-4" id="product_name_variante">
                $ {{ $p->variedades->first()->getPrice() }}
              </h3>
            </div>
            <div class="mt-3">
              @if ($t->getPayWhatsappEnabled())
                @if (!$p->fuera_stock)
                  <button
                    id="btn_cart"
                    class="btn btn-primary btn-long btn_cart btn-lg"
                    data-id="{{ $p->variedades->first()->id }}"
                    data-code="{{ $p->variedades->first()->codigo }}">
                    <i class="fas fa-cart-plus me-2"></i>
                    Agregar al carrito
                  </button>

                  <button
                    id="btn_cart_open"
                    class="btn btn-success btn-long btn-lg"
                    data-id="{{ $p->variedades->first()->id }}"
                    data-code="{{ $p->variedades->first()->codigo }}"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight">
                    <i class="bi-cart-fill text-white"></i>
                    Ver carrito
                  </button>
                @else
                  <button class="btn btn-dark" disabled>No disponible</button>
                @endif
              @else
                <button class="btn btn-dark" disabled>No hay medio de pago disponible</button>
              @endif
              {{-- <button class="btn btn-danger"> <i class="fa fa-heart"></i></button> --}}
            </div>

            <div class="product-description">
              @if (count($p->variedades) > 1)
              <div class="form-group mb-2">
                <label for="my-select" class="mb-2">Selecciona una opción</label>
                <select id="my-select" class="form-control" name="">
                  @foreach ($p->variedades as $v)
                    <option value="{{ $v->codigo }}">{{ $v->nombre }} $ {{ $v->getPrice() }}</option>
                  @endforeach
                </select>
              </div>
              @endif
              <div class="mt-2 mb-4">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  @if ($p->descripcion)
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Descripción</button>
                  </li>
                  @endif
                  {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $p->descripcion ? '' : 'active' }}" id="comentario-tab" data-bs-toggle="tab" data-bs-target="#comentario" type="button" role="tab" aria-controls="comentario" aria-selected="true">Comentario</button>
                  </li> --}}
                </ul>
                <div class="tab-content" id="myTabContent">
                  @if ($p->descripcion)
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="p-2">
                      {!! $p->descripcion !!}
                    </div>
                  </div>
                  @endif
                  {{-- <div class="tab-pane fade show {{ $p->descripcion ? '' : 'active' }}" id="comentario" role="tabpanel" aria-labelledby="comentario-tab">
                    <div class="p-2">

                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if (count($productos_favoritos) > 0)
  <div class="row">
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
  </div>
  @endif
</div>

@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/cart.js') }}"></script>
<script src="{{ asset('vendor/rawrshop/menu.js') }}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 10,
    slidesPerView: 10,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".mySwiper2", {
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
</script>

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
            nav:false
        },
        1000:{
            items:7,
        }
    }
})
</script>

@endpush
