  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link s-main-nav">
      <img src="{{asset('assets/images/DuckyBankLogo.png')}}"
           alt="DuckyBankLogoLogo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">DuckyBank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar scrollbar-roll">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/images/me-180x180.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p href="#" class="d-block info-stl"> {{ Auth::user()->name }} {{ Auth::user()->lastname }} </p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <div class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column s-background-on" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active s-item-menu">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard<i class="right fas fa-angle-left"></i></p>
            </a>   
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin') }}" class="nav-link s-item-submenu text-transform-x icon-item-submenu">
                  <i class="fas fa-user-friends"></i>
                  <p>Dashboard</p>
                </a>
              </li>             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active s-item-menu">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Procedures<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/procedures/1') }}" class="nav-link s-item-submenu text-transform-x">
                  <i class="fas fa-user-friends"></i>
                  <p>Procedure</p>
                </a>
              </li>             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active s-item-menu">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Configurations<i class="right fas fa-angle-left"></i></p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/configurations/users') }}" class="nav-link s-item-submenu text-transform-x">
                  <i class="fas fa-user-friends"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/roles') }}" class="nav-link s-item-submenu text-transform-x">
                  <i class="fas fa-network-wired"></i>
                  <p>Roles</p>
                </a>
              </li>             
            </ul>
          </li>

          <!-- SOMETHING TO HELP FILE-->
        </ul>       
      </div>      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>