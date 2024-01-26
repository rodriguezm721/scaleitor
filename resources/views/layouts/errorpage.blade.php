@extends('layouts.layout')
@section('content')
<!-- 404 Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="col-md-6 text-center p-4">
            <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
            <h1 class="display-1 fw-bold">404</h1>
            <h1 class="mb-4">Pagina No Encontrada</h1>
            <p class="mb-4">Lo sentimos, la página que ha buscado no existe en nuestro sitio web. ¿Tal vez vaya a nuestra página de inicio o intente utilizar una búsqueda?</p>
            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('layouts.dashboard')}}">Ir a Inicio</a>
        </div>
    </div>
</div>
<!-- 404 End -->
@endsection
