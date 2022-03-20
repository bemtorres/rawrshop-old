{{-- <div class="container"> --}}
<div class="screen-darken"></div>
{{-- <button data-trigger="navbar_main" class="d-lg-none btn btn-warning" type="button">  Show navbar </button> --}}
{{-- <button data-trigger="card_mobile" class="d-lg-none btn btn-warning" type="button">  Show card </button> --}}
<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-dark bg-{{ $t->presentFooter()->getColorNav() }}">
  <div class="container">
    <div class="offcanvas-header">
      <button class="btn-close float-end"></button>
    </div>
    <a class="navbar-brand" href="{{ route('home.index') }}">{{ $t->nombre }}</a>

    <ul class="navbar-nav">
      @foreach ($categorias as $ca)
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">
          <i class="{{ $ca->getIcon()[1][1] ?? ''}} me-2"></i>
          {{ $ca->nombre }}
        </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('home.categoria',['c', $ca->codigo]) }}" >
                <span>
                  <i class="{{ $ca->getIcon()[1][1] ?? '' }} me-2"></i>
                  {{ $ca->nombre }}
                </span>
                <span class="badge bg-{{ $t->presentFooter()->getColorNav() }} rounded-pill">{{ count($ca->productos) }}<span>
              </a>
            </li>
            @foreach ($ca->subs as $s)
            @continue(!$s->activo)
            <li>
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('home.categoria', ['s',$s->codigo]) }}">
                <span>
                  <i class="{{ $s->getIcon()[1][1] ?? '' }} me-2"></i>
                  {{ $s->nombre }}
                </span>
                <span class="badge bg-{{ $t->presentFooter()->getColorNav() }} rounded-pill">
                  {{ count($s->productos) }}
                </span>
              </a>
            </li>
            @endforeach
          </ul>
      </li>

      @endforeach

      {{-- <li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li> --}}
      {{-- <li class="nav-item"><a class="nav-link" href="#"> About </a></li> --}}
      {{-- <li class="nav-item"><a class="nav-link" href="#"> Services </a></li> --}}
      {{-- <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">Categorías</a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
          <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
          <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
          </ul>
      </li> --}}
    </ul>

    <ul class="navbar-nav">
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Categorías </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
          <li><a class="dropdown-item" href="#"> Dropdown item 2 </a></li>
          <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
          <li class="has-submenu">
            <a class="dropdown-item dropdown-toggle" href="#"> Dropdown item 4 </a>
            <div class="megasubmenu dropdown-menu">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur.
            </div>
          </li>
          <li class="has-submenu">
            <a class="dropdown-item dropdown-toggle" href="#"> Dropdown item 5 </a>
            <div class="megasubmenu dropdown-menu">
              Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.
            </div>
          </li>
          <li><a class="dropdown-item" href="#"> Dropdown item 6 </a></li>
        </ul>
      </li> --}}
    </ul>

    <ul class="navbar-nav">
    </ul>
  </div>
</nav>
{{-- </div> --}}


