
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <span class="brand-text font-weight-light">{{app(App\Models\GeneralSettings::class)->site_name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{url('/admin/admins/'.Auth::guard('admin')->user()->id)}}" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/admin/dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-home"></i>
              <p>
                @lang('main.dashboard')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/settings')}}" class="nav-link {{ (request()->is('admin/settings')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                @lang('main.setting')
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('main.all roles')
                <i class="fas fa-angle-left left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/roles/create')}}" class="nav-link {{ (request()->is('admin/roles/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/roles')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('main.admins')
                <i class="fas fa-angle-left left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/admins/create')}}" class="nav-link {{ (request()->is('admin/admins/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/admins')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('main.users')
                <i class="fas fa-angle-left left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/users/create')}}" class="nav-link {{ (request()->is('admin/users/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/users')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                @lang('main.sliders')
                <i class="fas fa-angle-left left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/sliders/create')}}" class="nav-link {{ (request()->is('admin/sliders/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/sliders')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                @lang('main.services')
                <i class="fas fa-angle-left left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/services/create')}}" class="nav-link {{ (request()->is('admin/services/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/services')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                @lang('main.portfolios')
                <i class="fas fa-angle-left left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/portfolios/create')}}" class="nav-link {{ (request()->is('admin/portfolios/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/portfolios')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-address-book"></i>
              <p>
                @lang('main.contacts')
                <i class="fas fa-angle-left left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/contacts')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-address-book"></i>
              <p>
                @lang('main.subscribes')
                <i class="fas fa-angle-left left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/subscribes')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
