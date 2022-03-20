<ul class="nav nav-pills mb-2">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["productos/$p->id/variedades"]) }}" href="{{ route('productos.variedades',$p->id) }}">
      <i class="fa fa-sitemap me-2"></i>
      Variedades
    </a>
  </li>
  {{-- <li class="nav-item">
    <a class="nav-link {{ activeTab(["productos/$p->id/variedad/create"]) }}" href="{{ route('variedad.create',$p->id) }}">
      <i class="fa fa-plus me-2"></i>
      Nuevo
    </a>
  </li> --}}
</ul>