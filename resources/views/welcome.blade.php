<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('template/img/logo/logo.png') }}" rel="icon">
  <title>jb - Dashboard</title>
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    <div id="app">
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" id="sidebar" v-show="$route.path === '/' || $route.path === '/registers' || $route.path === '/forget' ? false : true " style="display: none">
              <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                  <img src="{{ asset('template/img/logo/logo2.png') }}">
                </div>
                <div class="sidebar-brand-text mx-3">RuangAdmin</div>
              </a>
              <hr class="sidebar-divider my-0">
              <li class="nav-item active">
                <router-link class="nav-link" to="/homes">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></router-link>
              </li>
              <hr class="sidebar-divider my-0">
              <li class="nav-item active">
                <router-link class="nav-link" to="/pos">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Pos</span>
                </router-link>
              </li>
              <hr class="sidebar-divider">
              <div class="sidebar-heading">
                Features
              </div>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                  aria-expanded="true" aria-controls="collapseBootstrap">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Employee</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link class="collapse-item" to="/store-employee">Add Employee</router-link>
                    <router-link class="collapse-item" to="/employee" >Manage Employee</router-link>
                  </div>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
                  aria-expanded="true" aria-controls="collapseBootstrap">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Suppliers</span>
                </a>
                <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link class="collapse-item" to="/store-supplier" >Add Suppliers</router-link>
                    <router-link class="collapse-item" to="/supplier" >Manage Suppliers</router-link>
                  </div>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
                  aria-expanded="true" aria-controls="collapseBootstrap">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Categories</span>
                </a>
                <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link class="collapse-item" to="/store-category" >Add Categories</router-link>
                    <router-link class="collapse-item" to="/category" >Manage Categories</router-link>
                  </div>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
                  aria-expanded="true" aria-controls="collapseBootstrap">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Products</span>
                </a>
                <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link class="collapse-item" to="/store-product" >Add Product</router-link>
                    <router-link class="collapse-item" to="/product" >Manage Products</router-link>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/stock">
                  <i class="fab fa-fw fa-wpforms"></i>
                  <span>Stock</span>
                </router-link>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap5"
                  aria-expanded="true" aria-controls="collapseBootstrap">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Expenses</span>
                </a>
                <div id="collapseBootstrap5" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link class="collapse-item" to="/store-expense" >Add Expense</router-link>
                    <router-link class="collapse-item" to="/expense" >Manage Expense</router-link>
                  </div>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap6"
                  aria-expanded="true" aria-controls="collapseBootstrap">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Customers</span>
                </a>
                <div id="collapseBootstrap6" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link class="collapse-item" to="/store-customer" >Add Customer</router-link>
                    <router-link class="collapse-item" to="/customer" >Manage Customer</router-link>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap7"
                  aria-expanded="true" aria-controls="collapseBootstrap">
                  <i class="far fa-fw fa-window-maximize"></i>
                  <span>Orders</span>
                </a>
                <div id="collapseBootstrap7" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <router-link class="collapse-item" to="/order" >Today Order</router-link>
                    <router-link class="collapse-item" to="/customer" >Search Order</router-link>
                  </div>
                </div>
              </li>
            </ul>
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
              <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top" id="topbar" v-show="$route.path === '/' || $route.path === '/registers' || $route.path === '/forget' ? false : true " style="display: none">
                  <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                  </button>
                  <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <router-link to="/logout" class="ml-2 d-none d-lg-inline text-white small">Logout</router-link>
                    </li>
                  </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <router-view></router-view>
                </div>
                <!---Container Fluid-->
              </div>
            </div>
          </div>
    </div>


  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
    <script>
        let token = localStorage.getItem(token);
        if (token) {
            $("#sidebar").css("display","");
            $("#topbar").css("display","");
        }
    </script>
  <script src="{{ asset('js/app.js')}}"></script>
  <script src="{{ asset('template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('template/js/ruang-admin.min.js')}}"></script>
  <script src="{{ asset('template/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('template/js/demo/chart-area-demo.js')}}"></script>
</body>

</html>
