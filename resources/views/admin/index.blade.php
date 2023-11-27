@extends('layouts.layoutadmin')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
      <div class="bg-light rounded h-100 p-4 table-responsive">
        <h6 class="mb-4"><a class="btn btn-primary btn-sm" href="">Nuevo Registro</a></h6>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Folio</th>
              <th scope="col">Corte</th>
              <th scope="col">Baño</th>
              <th scope="col">Estatus</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
