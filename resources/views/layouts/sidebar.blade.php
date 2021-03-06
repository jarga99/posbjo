<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-medium">{{config ('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route ('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            <li class="nav-header">CATALOG</li>
          </li>
          <li class="nav-item">
            <a href="{{ route ('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route ('product.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Member
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-shipping-fast"></i>
              <p>
                Suplier
              </p>
            </a>
          </li>
          <li class="nav-header">TRANSACTION</li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Expense Record
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Purchase
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Sale
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Order
                <span class="badge badge-success right">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Order 
                <span class="badge badge-primary right">Record</span>
              </p>
            </a>
          </li>
          <li class="nav-header">RECORD</li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-list-ol"></i>
              <p>
                Report
              </p>
            </a>
          </li>
          <li class="nav-header">CONFIGURATIONS</li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{asset('pages/widgets.html')}}" class="nav-link">
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
