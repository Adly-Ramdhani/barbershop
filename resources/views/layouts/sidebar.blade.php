<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="index.html" class="logo">
          <img
            src="{{ asset('img/logo.png') }}"
            alt="navbar brand"
            class="navbar-brand"
            height="130" />
        </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
          <a href="#">
            <i class="fas fa-desktop"></i>
            <p>Dashboard</p>
          </a>
           
          </a>
          <div class="collapse" id="dashboard">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('home') }}">
                  <span class="sub-item">Dashboard 1</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Components</h4>
        </li>
        <li class="nav-item {{ request()->is('products*') ? 'active' : '' }}">
          <a href="{{ route('products.index') }}">
            <i class="fas fa-box-open"></i>
            <p>Products</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index') }}">
            <i class="fas fa-table"></i>
            <p>User </p>
          </a>
        </li> 
        <li class="nav-item">
          <a href="{{ route('admin-reservations.index') }}">
            <i class="fas fa-file"></i>
            <p>Reservasi</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('services.index') }}">
            <i class="fas fa-layer-group"></i>
            <p>Services</p>
          </a>
        </li>        
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->