@if (count($categorias) > 0)
<div>
  <h4 class="text-muted">CATEGORÍAS</h4>
</div>
<div class="accordion accordion-flush" id="accordionFlushExample">
  @foreach ($categorias as $ca)
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-heading{{ $ca->id }}">
      <button class="accordion-button {{ activeTabCategoria($ca) == 'active' ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $ca->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $ca->id }}">
        <i class="{{ $ca->getIcon()[1][1] ?? ''}} me-2"></i>
        {{ $ca->nombre }}
      </button>
    </h2>
    <div id="flush-collapse{{ $ca->id }}" class="accordion-collapse collapse {{ activeTabCategoria($ca) != 'active' ? '' : 'show' }}" aria-labelledby="flush-heading{{ $ca->id }}" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <ul class="list-group">
          <a href="{{ route('home.categoria',['c', $ca->codigo]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ activeTab(['categorias/c/'.$ca->codigo]) }}">
            <span>
              <i class="{{ $ca->getIcon()[1][1] ?? '' }} me-2"></i>
              {{ $ca->nombre }}
            </span>
            <span class="badge bg-primary rounded-pill">{{ count($ca->productos) }}<span>
          </a>
          @foreach ($ca->subs as $s)
          @continue(!$s->activo)
          <a href="{{ route('home.categoria', ['s',$s->codigo]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center  {{ activeTab(['categorias/s/'.$s->codigo]) }}">
            <span>
              <i class="{{ $s->getIcon()[1][1] ?? '' }} me-2"></i>
              {{ $s->nombre }}
            </span>
            <span class="badge bg-primary rounded-pill">
              {{ count($s->productos) }}
            </span>
          </a>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endif