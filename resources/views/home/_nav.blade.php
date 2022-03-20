<nav class="navbar navbar-expand-lg navbar-dark bg-{{ $t->presentFooter()->getColorNav() }}">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="{{ route('home.index') }}">{{ $t->nombre }}</a>
    @if (count($paginas) > 0)
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
        {{-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li> --}}
        {{-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> --}}
        @foreach ($paginas as $p)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home.blog',$p->code) }}">{{ $p->titulo }}</a>
          </li>
        @endforeach
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#!">All Products</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
          </ul>
        </li> --}}
      </ul>
      {{-- <form class="d-flex form-submit">
        <button class="btn btn-outline-dark" type="submit">
          <i class="bi-cart-fill me-1"></i>
          Cart
          <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
        </button>
      </form> --}}
    </div>
    @endif
  </div>
</nav>