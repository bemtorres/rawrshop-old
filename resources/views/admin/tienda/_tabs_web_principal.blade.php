<ul class="nav nav-pills mb-2">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/web']) }}" href="{{ route('tienda.web') }}">
      <i class="fa fa-images me-2"></i>
      Assets Banners
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/theme']) }}" href="{{ route('tienda.theme') }}">
      <i class="fa fa-hat-wizard me-2"></i>
      Theme
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/footer']) }}" href="{{ route('tienda.footer') }}">
      <i class="fa fa-shoe-prints me-2"></i>
      Footer Pie de página
    </a>
  </li>
</ul>