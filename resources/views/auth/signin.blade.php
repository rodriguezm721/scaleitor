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
    <div class="container-xxl position-relative bg-white d-flex p-0">
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
                            <a href="" class="">
                                <img src="{{ asset('img\logos\scalabn.png')}}" alt="" width="150px" height="50px">
                            </a>
                            <!---<h3>Iniciar Sesión</h3>--->
                        </div>
                        
                        <form class="row g-3" method="POST" action="{{ route('login.authenticate') }}">
                            @csrf
                            @if ($errors->has('error'))
                                <span class="text-light">{{ $errors->first('error') }}</span>
                                @endif
                            <div class="form-floating mb-3">
                                <input type="text" name="email" class="form-control" value="{{old('email')}}" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Correo electrónico</label>
                                @error('email')
                                <span class="text-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Contraseña</label>
                                @error('password')
                                <span class="text-light">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--<div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="">Olvidaste tu contraseña?</a>
                            </div>--->
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Iniciar Sesión</button>
                            <p class="text-center text-white mb-0">No tienes una cuenta? <a href="{{ route('auth.register') }}">Registrate</a></p>
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

