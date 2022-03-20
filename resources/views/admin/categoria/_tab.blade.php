<ul class="nav nav-pills mb-2">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['categorias/'.$c->id]) }}" href="{{ route('categorias.show',$c->id) }}">
      <i class="fa fa-store-alt me-2"></i>
      Categorías
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['categorias/'.$c->id.'/edit']) }}" href="{{ route('categorias.edit',$c->id) }}">
      <i class="fa fa-store-alt me-2"></i>
      Editar
    </a>
  </li>

  @if (activeTab(['categorias/'.$c->id]))
  <li class="nav-item">
    <span type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#newModalSub" data-bs-id="{{ $c->id }}">
      Agregar subcategoría
    </span>
  </li>
  @endif
</ul>