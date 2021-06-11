<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  {{-- <a href="{{ route('admin.dashboard') }}" class="brand-link"> --}}
  <a href="" class="brand-link">
    <img src="/dashboard_template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/dashboard_template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user() != null ? 'hi: '. Auth::user()->name  : '' }}</a>
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
        {{-- menu for home page --}}
        <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'menu-open' : '' }}">
          <a href="{{ route('dashboard') }}"
            class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>

        </li>

        



        @php
        $roles = Auth::user()->roles;
        @endphp
        @foreach ($roles as $item)
        @if ($role_name = $item->role_name == "ROLE_ADMIN")
        @php
        $routeRoleUserArr = [
        'admin.user.list_user',
        'admin.user.update_status_user',
        'admin.user.edit_user',
        'admin.user.update_role',
        ];
        @endphp
        <li class="nav-item {{ in_array(Route::currentRouteName(), $routeRoleUserArr) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage User
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.user.list_user')}}"
                class="nav-link {{ Route::currentRouteName() == 'admin.user.list_user' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List User</p>
              </a>
            </li>
          </ul>
          {{-- <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href=""
                class="nav-link {{ Route::currentRouteName() == '' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Account</p>
              </a>
            </li>
          </ul> --}}
        </li>
        @elseif($role_name = $item->role_name == "ROLE_SELLER")
        @php
        $routeRoleUserArr = [
        'seller.order-customer.list_order',
        'seller.order-customer.order_detail',
        'seller.order-customer.update_status_order',
        'seller.order-customer.search_by_status',
        'seller.order-customer.search_by_date',

        'seller.order-guest.list_order',
        'seller.order-guest.order_detail',
        'seller.order-guest.update_status_order',
        'seller.order-guest.search_by_status',
        'seller.order-guest.search_by_date',
        ];
        @endphp
        <li class="nav-item {{ in_array(Route::currentRouteName(), $routeRoleUserArr) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Order
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('seller.order-customer.list_order')}}"
                class="nav-link {{ Route::currentRouteName() == 'seller.order-customer.list_order' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Order Customer</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('seller.order-guest.list_order')}}"
                class="nav-link {{ Route::currentRouteName() == 'seller.order-guest.list_order' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Order Guest</p>
              </a>
            </li>
          </ul>
        </li>
        @elseif($role_name = $item->role_name == "ROLE_USER")
        @php
        $routeRoleUserArr = [
        'my_order',
        'view_account',
        'edit_account',
        'search_by_status',
        'search_by_date',
        'search_by_code',
        'change_password',
        'update_password'
        ];
        @endphp
        <li class="nav-item {{ in_array(Route::currentRouteName(), $routeRoleUserArr) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              My profile
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('my_order', Auth::user()->id) }}"
                class="nav-link {{ Route::currentRouteName() == 'my_order' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>My Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('view_account')}}"
                class="nav-link {{ Route::currentRouteName() == 'view_account' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>My Account</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        @endforeach


      </ul>

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" onclick="return confirm('Are you sure LOGOUT ?')">Logout</button>
      </form>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>