
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('manager/dashboard') }}" class="brand-link">
      <img src="{{asset('storage/plantesaddict-logo-small.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Manager</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="@if (Auth::user()->profile && Auth::user()->profile->avatar_status == 1) {{ Auth::user()->profile->avatar }} @else {{ Gravatar::get(Auth::user()->email) }} @endif" alt="{{ Auth::user()->name }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('home') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-flat nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('manager/dashboard') }}" class="nav-link {{ Request::is("manager/dashboard") ? 'active' : null }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ url("elfinder") }}" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Explorer
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
         
         
       
          <li class="nav-item has-treeview">
            <a href="{{ url("manager/posts") }}" class="nav-link {{ Request::is("manager/posts*") ? 'active' : null }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Blog
               
              </p>
            </a>
           
          </li>
           <li class="nav-item has-treeview">
            <a href="{{ url("manager/fiches") }}" class="nav-link {{ Request::is("manager/fiches*") ? 'active' : null }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Fiches d'entretien
                
              </p>
            </a>
           
          </li>
           <li class="nav-item has-treeview">
            <a href="{{ url("manager/pages") }}" class="nav-link {{ Request::is("manager/pages*") ? 'active' : null }}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Pages
                
              </p>
            </a>
           
          </li>
        
          <li class="nav-header">eCOMMERCE</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Request::is("manager/products*") ? 'active' : null }}">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Produits
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ url("manager/products") }}" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Tous les produits</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("manager/products/create") }}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter un produit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("manager/products/categories") }}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Catégories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("manager/products/labels") }}" class="nav-link">
                  <i class="fa fa-tags nav-icon"></i>
                  <p>Labels</p>
                </a>
              </li>
            </ul>
          </li>

  <li class="nav-item has-treeview">
            <a href="{{ url("manager/box") }}" class="nav-link {{ Request::is("manager/box*") ? 'active' : null }}">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Boxs
             
              </p>
            </a>
            
          </li>
  <li class="nav-item has-treeview">
            <a href="{{ url("manager/ventes") }}" class="nav-link {{ Request::is("manager/ventes*") ? 'active' : null }}">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Ventes
             
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ url('manager/orders') }}" class="nav-link {{ Request::is("manager/orders*") ? 'active' : null }}">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Commandes
                <span class="badge badge-info right">{{ count(\App\Models\Order::where('payment_status', true)->get()) }}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('manager/payments') }}" class="nav-link {{ Request::is("manager/payments*") ? 'active' : null }}">
              <i class="nav-icon fa fa-cash-register"></i>
              <p>
                Paiements
              </p>
            </a>
          </li>
<li class="nav-item">
            <a href="{{ url('manager/deliveries') }}" class="nav-link {{ Request::is("manager/deliveries*") ? 'active' : null }}">
              <i class="nav-icon fa fa-rocket"></i>
              <p>
                Livraisons
              </p>
            </a>
          </li>
      
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Request::is("manager/users*") ? 'active' : null }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Utilisateurs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url("manager/users") }}" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Tous les utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("manager/users/create") }}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Ajouter un compte</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url("manager/roles")}}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("/blocker") }}" class="nav-link">
                  <i class="fa fa-shield nav-icon"></i>
                  <p>Blocker</p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-header">Activités</li>
    
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url("activity") }}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Activités</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("manager/logs") }}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Logs</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
