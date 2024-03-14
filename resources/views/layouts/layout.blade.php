<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Scaleitor App</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">
      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">
      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Libraries Stylesheet -->
      <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
      <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <!----DATA TABLES---->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
   </head>
   <body>
      <div class="container-xxl position-relative bg-white d-flex p-0">
         <!-- Spinner Start -->
         <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
               <span class="sr-only">Loading...</span>
            </div>
         </div>
         <!-- Spinner End -->
         <!-- Sidebar Start -->
         <div class="sidebar pe-4 pb-3 color-nav">
            <nav class="navbar navbar-light">
               <a href="" class="navbar-brand mx-4 mb-3">
               <img src="{{ asset('img\logos\scalabn.png')}}" alt="" width="150px" height="50px">
               </a>
               <div class="d-flex align-items-center ms-4 mb-4">
                  <div class="position-relative">
                     <img class="rounded-circle" src="{{asset('img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                     <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                  </div>
                  <div class="ms-3">
                     <h6 class="mb-0 text-light">{{ Auth::user()->name }}</h6>
                     <span class="text-light">{{ Auth::user()->role }}</span>
                  </div>
               </div>
               <div class="navbar-nav w-100">
                  @can('read contratos')
                  <a href="{{ route('dashboard')}}" class="nav-item nav-link"><i class="fa fa-home me-2"></i>Dashboard</a>
                  @endcan
                  @can('create contratos')
                  <a href="{{ route('contratos.index')}}" class="nav-item nav-link"><i class="fa fa-chart-line me-2"></i>Proyectos</a>
                  <a href="{{ route('contratos.index2')}}" class="nav-item nav-link"><i class="fa fa-tree me-2"></i>Ambiental</a>
                  <a href="{{ route('contratos.index3')}}" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Supervisión</a>
                  <a href="{{ route('contratos.index4')}}" class="nav-item nav-link"><i class="fa fa-hammer me-2"></i>Construcción</a>
                  @endcan
                  <!---<div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Operaciones</a>
                     <div class="dropdown-menu bg-transparent border-0">
                         <a href="" class="dropdown-item">Opcion 1</a>
                         <a href="" class="dropdown-item">Opcion 2</a>
                         <a href="" class="dropdown-item">Opcion 3</a>
                     </div>
                     </div>--->
               </div>
            </nav>
         </div>
         <!-- Sidebar End -->
         <!-- Content Start -->
         <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
               <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                  <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
               </a>
               <a href="#" class="sidebar-toggler flex-shrink-0">
               <i class="fa fa-bars"></i>
               </a>
               <div class="navbar-nav align-items-center ms-auto">
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <img class="rounded-circle me-lg-2" src="{{asset('img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                     <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <!--<a href="#" class="dropdown-item">My Profile</a>
                           <a href="#" class="dropdown-item">Settings</a>-->
                        <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                        </a>
                        <form id="logout-form" method="POST" action="{{ route('session.logout') }}" style="display: none;">
                           @csrf
                           <button type="submit">Salir</button>
                        </form>
                     </div>
                  </div>
               </div>
            </nav>
            <!-- Navbar End -->
            <!-- Recent Sales Start -->
            @yield('content')
            <!-- Widgets End -->
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
               <div class="bg-light rounded-top p-4">
                  <div class="row">
                     <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="{{ route('dashboard')}}">SCALEITOR APP</a>, Todos los derechos reservados.
                     </div>
                     <div class="col-12 col-sm-6 text-center text-sm-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Diseñado por <a href="http://scalapc.com">Administracíon de Conocimiento</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Footer End -->
         </div>
         <!-- Content End -->
         <!-- Back to Top -->
         <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
      </div>
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('lib/chart/chart.min.js')}}"></script>
      <script src="{{asset('lib/easing/easing.min.js')}}"></script>
      <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
      <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
      <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
      <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
      <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
      <script src="{{asset('js/main.js')}}"></script>
      <!-- Template Javascript -->
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/pdfmake.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.9/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
      <script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/dataTables.searchBuilder.min.js"></script>
      <script src="{{asset('js/functions.js')}}"></script>
      <script>
         $(document).ready(function() {
             // Obtén la URL actual
             var currentUrl = window.location.href;
         
             // Encuentra el enlace que coincide con la URL actual y agrega la clase "active"
             $('.navbar-nav .nav-link').each(function() {
                 if ($(this).attr('href') === currentUrl) {
                     $(this).addClass('active');
                 }
             });
         });
      </script>
   </body>
</html>