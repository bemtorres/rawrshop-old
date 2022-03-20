<ul class="nav nav-pills mb-2">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['productos']) }}" href="{{ route('productos.index') }}">
      <i class="fa fa-store-alt me-2"></i>
      Productos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['producto/favoritos']) }}" href="{{ route('productos.favoritos') }}">
      <i class="fa fa-star text-warning me-2"></i>
      Productos favoritos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['producto/agotados']) }}" href="{{ route('productos.agotados') }}">
      <i class="fa fa-store-alt me-2"></i>
      Productos agotados
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['producto/eliminados']) }}" href="{{ route('productos.eliminados') }}">
      <i class="fa fa-minus-circle me-2 text-danger"></i>
      Productos eliminados
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['productos/create']) }}" href="{{ route('productos.create') }}">
      <i class="fa fa-plus me-2 text-plus"></i>
      <strong>NUEVO</strong>
    </a>
  </li>
</ul>