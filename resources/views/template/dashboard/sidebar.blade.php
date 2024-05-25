<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" @class(['nav-link', 'active' => request()->routeIs('dashboard')])>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('calon.index') }}" @class(['nav-link', 'active' => request()->routeIs('calon.*')])>
            <i class="fas fa-user-tie nav-icon"></i>
            <p>Calon</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('mahasiswa.index') }}" @class(['nav-link', 'active' => request()->routeIs('mahasiswa.*')])>
            <i class="fas fa-users nav-icon"></i>
            <p>Mahasiswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index') }}" @class(['nav-link', 'active' => request()->routeIs('users.*')])>
            <i class="fas fa-user nav-icon"></i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setting.index') }}" @class(['nav-link', 'active' => request()->routeIs('setting.*')])>
            <i class="fas fa-cog nav-icon"></i>
            <p>Pengaturan</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
