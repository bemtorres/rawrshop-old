<ul class="nav nav-pills mb-2">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda']) }}" href="{{ route('tienda.index') }}">
      <i class="fa fa-store-alt me-2"></i>
      Configuración
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/assets']) }}" href="{{ route('tienda.assets') }}">
      <i class="fa fa-images me-2"></i>
      Assets
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/seo']) }}" href="{{ route('tienda.seo') }}">
      <i class="fa fa-search me-2"></i>
      WEB y SEO
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/pro']) }}" href="{{ route('tienda.pro') }}">
      <i class="fa fa-fighter-jet me-2"></i>
      Google identify
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/codigo']) }}" href="{{ route('tienda.codigo') }}">
      <i class="fas fa-code me-2"></i>
      Modo programador
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/mantenimiento']) }}" href="{{ route('tienda.mantenimiento') }}">
      <i class="fa fa-hammer me-2"></i>
      Mantenimiento
    </a>
  </li>
</ul>