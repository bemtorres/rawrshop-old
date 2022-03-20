<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <a href="{{ route('dashboard.index') }}">
          <h5>{{ current_shop()->nombre }}</h5>
        {{-- <div class="logo"> --}}
          {{-- <img src="{{ current_shop()->present()->getLogo() }}" width="100" height="100" alt="Logo" srcset=""> --}}
        {{-- </div> --}}
        </a>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-item {{ activeTab(['dashboard']) }}">
          <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item has-sub {{ activeTab(['productos*','producto*','categorias*']) }}">
          <a href="#" class='sidebar-link'>
            <i class="fa fa-list"></i>
            <span>Servicios</span>
          </a>
          <ul class="submenu {{ activeTab(['productos*','categorias*','producto/dashboard']) }}">
            <li class="submenu-item {{ activeTab(['productos*'],['producto/dashboard']) }}">
              <a href="{{ route('productos.index') }}">
                @if (activeTab(['productos*']))
                  <i class="fas fa-square"></i>
                @endif
                Productos
              </a>
            </li>
            <li class="submenu-item {{ activeTab(['producto/dashboard']) }}">
              <a href="{{ route('productos.dashboard') }}">
                @if (activeTab(['producto/dashboard']))
                  <i class="fas fa-border-all"></i>
                @endif
                Productos dashboard
              </a>
            </li>

            <li class="submenu-item {{ activeTab(['categorias*']) }}">
              <a href="{{ route('categorias.index') }}">
                @if (activeTab(['categorias*']))
                <i class="fas fa-square"></i>
                @endif
                Categorías
              </a>
            </li>
          </ul>
        </li>
{{--
        <li class="sidebar-item has-sub {{ activeTab(['usuarios*','clientes*']) }}">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-people-fill"></i>
            <span>Usuarios</span>
          </a>
          <ul class="submenu {{ activeTab(['usuarios*','usuario*']) }}">
            <li class="submenu-item {{ activeTab(['usuarios*','usuario*']) }}">
              <a href="{{ route('usuarios.index') }}">
                <i class="bi bi-person-circle"></i>
                Usuarios
              </a>
            </li>
            <li class="submenu-item">
              <a href="{{ route('clientes.index') }}">
                <i class="bi bi-person-bounding-box"></i>
                Clientes
              </a>
            </li>
          </ul>
        </li> --}}

        <li class="sidebar-item has-sub {{ activeTab(['tienda*'],['tienda/pagina*']) }}">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-kanban-fill text-primary"></i>
            <span>Cofiguracion</span>
          </a>
          <ul class="submenu {{ activeTab(['tienda*'],['tienda/pagina*']) }}">
            <li class="submenu-item {{ activeTab(['tienda']) }}">
              <a href="{{ route('tienda.index') }}">
                {{-- <i class="bi bi-rss-fill me-2"></i> --}}
                <i class="fa fa-cog me-3"></i>
                Básica
              </a>
            </li>

            <li class="submenu-item {{ activeTab(['tienda/rrss']) }}">
              <a href="{{ route('tienda.rrss') }}">
                {{-- <i class="bi bi-rss-fill me-2"></i> --}}
                <i class="bi bi-ui-checks-grid"></i>
                Redes sociales
              </a>
            </li>

            <li class="submenu-item {{ activeTab(['tienda/web']) }}">
              <a href="{{ route('tienda.web') }}">
                <i class="bi bi-house-door-fill me-2"></i>
                Web Principal
              </a>
            </li>

            <li class="submenu-item {{ activeTab(['tienda/chat']) }}">
              <a href="{{ route('tienda.chat') }}">
                <i class="bi bi-whatsapp me-2"></i>
                Chat
              </a>
            </li>

            <li class="submenu-item {{ activeTab(['tienda/pay']) }}">
              <a href="{{ route('tienda.pay') }}">
                <i class="bi bi-cash-stack me-2"></i>
                Pagos
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item {{ activeTab(['tienda/pagina*']) }}">
          <a href="{{ route('pagina.index') }}" class='sidebar-link'>
            <i class="bi bi-rss-fill me-2"></i>
            <span>Creador de páginas</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="{{ route('home.index.edicion') }}" class='sidebar-link'>
            <i class="fab fa-chromecast me-3"></i>
            <strong>IR A LA PÁGINA</strong>
          </a>
        </li>

      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>