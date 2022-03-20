<footer class="bg-{{ $t->presentFooter()->getColorFooter() }} text-center">
  <div class="container p-4">
    <section class="mb-4">
      @foreach ($redes as $keyRedes => $valueRedes)
      @if ($t->presentRRSS()->footer_enabled($keyRedes))
        <a class="btn btn-outline-light btn-floating m-1" href="{{ $valueRedes[2] . $t->presentRRSS()->redes($keyRedes) }}" title="Ir a {{ $keyRedes }}">
          <i class="{{ $valueRedes[4] }}"></i>
        </a>
      @endif
      @endforeach
    </section>

    @if ($t->presentFooter()->getEnabled())
    <section class="">
      <form action="{{ route('home.newsletter') }}" method="POST">
        @csrf
        <div class="row d-flex justify-content-center">
          <div class="col-auto">
            <p class="pt-2">
              <strong>Suscríbete a nuestro Newsletter</strong>
            </p>
          </div>
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example2" class="form-control" name="email" value="" placeholder="Su dirección de correo electrónico" />
              {{-- <label class="form-label" for="form5Example2">Email address</label> --}}
            </div>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-outline-light mb-4">
              SUSCRÍBETE
            </button>
          </div>
        </div>
      </form>
    </section>
    @endif
    <section class="mb-4" style="width: 100%;">
      {!! $t->presentFooter()->getContent() !!}
    </section>
    {{-- <section class="">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
      </div>
    </section> --}}
  </div>
  <div class="text-center p-3" style="background: rgba(0, 0, 0, 0.2);">
    © {{ date('Y') }} -
    <a class="text-white" href="{{ route('home.index') }}">{{ $t->nombre }}</a>
  </div>
</footer>