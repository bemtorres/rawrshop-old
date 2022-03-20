<div class="card bg-white">
  <div class="card-body">
    {{-- <h4 class="card-title">Title</h4> --}}
    {{-- <p class="card-text">Text</p> --}}
    <ul class="nav nav-pills nav-justified">
      <li class="nav-item">
        <a class="nav-link {{ activeTab(["productos/$p->id"]) }}" href="{{ route('productos.show',$p->id) }}">
          <i class="fa fa-bookmark me-2"></i>
          Producto {{ $p->codigo }}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ activeTab(["productos/$p->id/edit"]) }}" href="{{ route('productos.edit',$p->id) }}">
          <i class="fa fa-edit me-2"></i>
          Editar
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ activeTab(["productos/$p->id/assets"]) }}" href="{{ route('productos.assets',$p->id) }}">
          <i class="fa fa-images me-2"></i>
          Imagenes
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ activeTab(["productos/$p->id/variedades"]) }}" href="{{ route('productos.variedades',$p->id) }}">
          <i class="fa fa-sitemap me-2"></i>
          Variedades
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ activeTab(["productos/$p->id/seo"]) }}" href="{{ route('productos.seo',$p->id) }}">
          <i class="fa fa-search me-2"></i>
          SEO
        </a>
      </li>
    </ul>
  </div>
</div>