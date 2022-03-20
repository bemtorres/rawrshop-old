<ul class="nav nav-pills mb-2">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/pagina/'.$p->id]) }}" href="{{ route('pagina.show',$p->id) }}">
      <i class="fa fa-play me-2"></i>
      Visualización
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['tienda/pagina/'.$p->id.'/edit']) }}" href="{{ route('pagina.edit',$p->id) }}">
      <i class="fa fa-edit me-2"></i>
      Editar
    </a>
  </li>
</ul>