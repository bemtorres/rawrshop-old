<ul class="nav nav-pills mb-2">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['categorias']) }}" href="{{ route('categorias.index') }}">
      <i class="fa fa-store-alt me-2"></i>
      Categorías
    </a>
  </li>
  <li class="nav-item">
    <span type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#newModal">
      <i class="fa fa-plus me-2"></i>
      Nueva categoría
    </span>
  </li>
</ul>