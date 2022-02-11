  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item nav-item-color">
        <a class="nav-link nav-item-color" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link nav-item-color">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link nav-item-color">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar search-form" type="search" placeholder="Search..." aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search search-icon"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- USER CONFIG EXIT Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-item-color" data-toggle="dropdown" href="#">
          <i class="fas fa-users"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-center nav-menu-color">
          <a class="dropdown-item nav-ddown-item" href="#"><img src="{{asset('assets/images/userIcon.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle"></a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item nav-ddown-item">
            <i class="fas fa-circle"></i> Online
          </a>          
          <div class="dropdown-divider"></div>
          <a href="/admin/user/{{ Auth::user()->id }}/edit" class="dropdown-item nav-ddown-item">
            <i class="fas fa-cogs"></i> Configuración
          </a>
          <div class="dropdown-divider"></div>
          <a href="/admin/user/1" class="dropdown-item nav-ddown-item">
            <i class="fas fa-users mr-2"></i> Administración
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ url('/logout') }}" class="dropdown-item dropdown-footer nav-ddown-item">Salir</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link nav-item-color" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->