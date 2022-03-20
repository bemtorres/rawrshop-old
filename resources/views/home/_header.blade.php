
<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
    <div class="d-flex align-items-center col-md-3 mb-3 mb-md-0 text-dark text-decoration-none">
      @if ($t->getLogoEnabled())
      <img src="{{ asset($t->present()->getLogo()) }}" height="100" alt="image">
      @endif
    </div>

    <ul class="nav nav-buscador my-2 align-items-center justify-content-center" {{ activeTab(['blog*']) == 'active' ? 'hidden' : '' }}>
      <form action="{{ route('home.find') }}" class="form-submit" method="POST">
        @csrf
        <li class="px-4">
          <div class="input-group input-group" style="width: 350px">
            <input type="text" class="form-control px-4" name="name" placeholder="Buscar producto en {{ $t->nombre }}" aria-label="Buscar producto en  la tienda" aria-describedby="basic-addon2" required>
            <div class="input-group-append">
              <button type="submit" class="btn btn-outline-secondary btn-lg">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </li>
      </form>

      <li class="px-2 mt-sm-2 mt-md-0">
        <div class="d-none d-lg-block">
          @if ($t->getPayWhatsappEnabled())
          <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="bi-cart-fill me-1"></i>
            <span class="badge bg-dark text-white ms-1 rounded-pill">
              <span id="cart_price_total_original">0</span>
            </span>
          </button>
          @endif
        </div>
      </li>
    </ul>

    <div class="col-md-3 text-center mb-3">
      @include('home._redes_horizontal')
    </div>
  </header>
</div>