 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">User</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item has-treeview">  
              <li class="nav-item">
                <a href="{{url('/dashboard')}}" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          </li>

          <li class="nav-item has-treeview">  
            <li class="nav-item">
              <a href="{{url('/profile')}}" class="nav-link">
                <i class="far fa-file nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
        </li>
  
          <li class="nav-item has-treeview">
              <li class="nav-item">
                <a href="{{url('/orderList')}}" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
          </li>
  
          <li class="nav-item has-treeview">
              <li class="nav-item">
                <a href="{{url('/invoice')}}" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
          </li>
  
          <li class="nav-item has-treeview">
              <li class="nav-item">
                <a href="pages/tables/orders.html" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
          </li>
  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>