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
      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
   </head>
   <body>
      <div class="container-xxl position-relative  d-flex p-0 fondo-login">
      <!-- Spinner Start -->
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
         </div>
      </div>
      <!-- Spinner End -->
      <!-- Sign In Start -->
      <div class="container-fluid">
         <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
               <div class="rounded p-4 p-sm-5 my-4 mx-3 color-panel">
                  <div class="d-flex align-items-center justify-content-center mb-3">
                     <a href="" class="text-center">
                     <img src="{{ asset('img\logos\scalabn.png')}}" alt="" width="150px" height="50px">
                     </a>
                     <!--<h3>Sign Up</h3>-->
                  </div>
                  @if (session('success'))
                  <div class="alert alert-success">
                     {{ session('success') }}
                  </div>
                  @endif
                  <form class="row g-3" method="POST" action="{{ route('login.register') }}">
                     @csrf
                     <div class="form-floating mb-3">
                        <input type="text" name="name" value="{{ old('name')}}" class="form-control" id="floatingText" placeholder="jhondoe">
                        <label for="floatingText">Nombre</label>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-floating mb-3">
                        <input type="text" name="email" value="{{ old('email')}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Correo electrónico</label>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Contraseña</label>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-floating mb-4">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirm" placeholder="Confirmar Contraseña">
                        <label for="floatingPasswordConfirm">Confirmar Contraseña</label>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <!--<div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <a href="">Forgot Password</a>
                        </div>--->
                     <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Registrarse</button>
                     <p class="text-center text-white mb-0">Ya tienes una cuenta? <a href="{{ route('auth.signin') }}">Iniciar Sesión</a></p>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- Sign In End -->
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="{{asset('js/main.js')}}"></script>
      <!-- Template Javascript -->
      <script src="{{asset('js/functions.js')}}"></script>
   </body>
</html>