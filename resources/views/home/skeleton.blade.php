<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  @stack('master')
  @if ($t->getSeoEnabled())
    {!! SEO::generate() !!}
  @else
    <title>{{ $t->getTitleWeb() }}</title>
  @endif
  {!! $t->present()->getFavicon() !!}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.1.0/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="	https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  @if ($t->presentRRSS()->chat('enabled'))
  <link rel="stylesheet" href="{{ asset('vendor/chat/floating-wpp.css') }}">
  @endif
  <link rel="stylesheet" href="{{ asset('vendor/rawrshop/theme.css') }}">
  @if ($t->getConfigTheme())
  <link rel="stylesheet" href="{{ $t->getConfigThemeCSS() }}">
  @endif
  @if ($t->getConfigCss())
  <style>
    {!! $t->getConfigCss() !!}
  </style>
  @endif
  <style>
    body {
      background: {{ $t->presentFooter()->getColorBackground() }};
    }
  </style>
  @stack('stylesheet')
  {!! $t->getConfigMeta() !!}
</head>
<body class="text-sm">
  <header class="bg-{{ $t->presentFooter()->getColorHeader() }}">
    <div class="p-2">
    </div>
  </header>

  <div id="app">
    @yield('app')
  </div>

  @include('home._footer')

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasRightLabel">
        <i class="bi-cart-fill me-2"></i>
        Carrito de pedido
      </h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="cart_body">
        </tbody>
      </table>
    </div>
    <div class="offcanvas-footer mb-3">
      <div class="d-grid gap-2">
        <button class="btn btn-success btn-lg mx-2" disabled type="button" id="button_pay">
          <i class="bi bi-whatsapp"></i>
          Envía el pedido por Whatsapp <strong><span id="cart_price_total_one">0</span></strong>
        </button>
      </div>
    </div>
  </div>

  @if ($t->getPayWhatsappEnabled())
    @if ($isMobile)
    <nav class="navbar fixed-bottom bg-{{ $t->presentFooter()->getColorFooterCart() }} justify-content-center" style="position: fixed; bottom: 0px;left: 0px; height: 62px !important;">
      <span class="navbar-brand ps-2 pe-4" data-trigger="navbar_main" title="Retirar">
        <i class="fas fa-list text-white"></i>
      </span>
      <a class="navbar-brand ps-4 pe-4" href="" title="Retirar">
        <i class="fas fa-home text-white"></i>
      </a>
      <span class="navbar-brand ps-3 pe-2" title="Despacho" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <i class="bi-cart-fill text-white"></i>
        <span class="badge bg-white text-dark ms-1 rounded-pill">
          <span id="cart_price_total_two">0</span>
        </span>
      </span>
      @if ($t->presentRRSS()->chat('enabled'))
      @if ($isMobile)
        <a class="navbar-brand ps-5 pe-3" href="" title="Historial">
          <div id="myChat"></div>
        </a>
      @endif
      @endif
    </nav>
    @endif
  @endif

  @if ($t->presentRRSS()->chat('enabled'))
    @if (!$isMobile)
      <div id="myChat"></div>
    @endif
  @endif

  <div id="dinobox_request" data-product-find="{{ route('api.v1.product.find') }}" data-phone="{{ $t->presentRRSS()->redes('whatsapp') }}"></div>
  @stack('extra')
  <script src="{{ asset('vendor/bootstrap-5.1.0/js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('vendor/dinobox/currency.min.js') }}"></script>
  @if ($t->getConfigJs())
    <script>
      {!! $t->getConfigJs() !!}
    </script>
  @endif
  @if ($t->presentRRSS()->chat('enabled'))
    @include('home._chat')
  @endif
  @stack('javascript')
</body>
</html>