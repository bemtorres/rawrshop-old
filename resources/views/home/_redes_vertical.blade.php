<div class="social-bar">
  @foreach ($redes as $keyRedes => $valueRedes)
  @if ($t->presentRRSS()->enabled($keyRedes))
  @if (!$t->presentRRSS()->posicion($keyRedes))
    <a href="{{ $valueRedes[2] . $t->presentRRSS()->redes($keyRedes) }}" id="social-{{ $keyRedes }}-content" class="icon icon-{{ $keyRedes }} bg-{{ $valueRedes[1] }}" target="_blank" title="Ir a {{ $keyRedes }}">
      <i class="{{ $valueRedes[0] }}" id="social-{{ $keyRedes }}-icon" style="font-size: 27px;"></i>
    </a>
  @endif
  @endif
  @endforeach
</div>
