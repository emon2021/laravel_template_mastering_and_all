  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item toggle_class @if(Request::url() == route('categories.index') || Request::url() == route('categories.create')) menu-is-openning menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Categories
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item nav_collapse" style="margin-left: 40px">
                <a href="{{route('categories.index')}}" class="nav-link ms-5"> All Category</a>
              </li>
              <li class="nav-item nav_collapse" style="margin-left: 40px">
                <a href="{{route('categories.create')}}" class="nav-link ms-5"> Add Category</a>
              </li>
            </ul>
          </li>
          <li class="nav-item toggle_class active @if(Request::url() == route('subCategories.index') || Request::url() == route('subCategories.create')) menu-is-openning menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Sub Categories
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item nav_collapse" style="margin-left: 40px">
                <a href="{{route('subCategories.index')}}" class="nav-link ms-5"> All Sub Category</a>
              </li>
              <li class="nav-item nav_collapse toggle_class" style="margin-left: 40px">
                <a href="{{route('subCategories.create')}}" class="nav-link ms-5"> Add Sub Category</a>
              </li>
            </ul>
          </li>
          <li class="nav-item toggle_class @if(Request::url() == route('post.create') || Request::url() == route('post.index')) menu-is-openning menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item nav_collapse" style="margin-left: 40px">
                <a href="{{route('post.index')}}" class="nav-link ms-5"> All Post</a>
              </li>
              <li class="nav-item nav_collapse toggle_class" style="margin-left: 40px">
                <a href="{{route('post.create')}}" class="nav-link ms-5"> Add Post</a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">LABELS</li>
          
          <li class="nav-item">
            <a href="{{route('change.password',Auth::id())}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              Change Password
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>