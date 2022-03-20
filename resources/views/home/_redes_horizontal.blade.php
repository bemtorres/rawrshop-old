
@foreach ($redes as $keyRedes => $valueRedes)
@if ($t->presentRRSS()->enabled($keyRedes))
@if ($t->presentRRSS()->posicion($keyRedes))
  <a class="me-2 py-2 text-dark text-decoration-none" href="{{ $valueRedes[2] . $t->presentRRSS()->redes($keyRedes) }}" title="Ir a {{ $keyRedes }}">
    <i class="{{ $valueRedes[4] }} fa-2x text-{{ $valueRedes[1] }}" id="{{ $valueRedes[1] == 'insta' ? 'insta' : '' }}"></i>
  </a>
@endif
@endif
@endforeach