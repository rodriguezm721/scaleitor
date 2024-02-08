@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Nuevo Contacto</h3>
                <form class="row g-3" method="POST" action="{{ route('clientes.store') }}">
                    @csrf
                    <!----------------------ROW 1-------------------------->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="nom_cliente" type="text" class="form-control" id="floatingPassword"
                                placeholder="Fecha Inicio">
                            <label for="floatingPassword">Nombre de Contacto</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="cargo" type="text" class="form-control" id="floatingPassword"
                                placeholder="Fecha Fin">
                            <label for="floatingPassword">Cargo</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="empresa" type="text" class="form-control" id="floatingPassword"
                                placeholder="Monto">
                            <label for="floatingPassword">Empresa</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingPassword"
                                placeholder="Monto">
                            <label for="floatingPassword">Email</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="num_tel" type="number" class="form-control" id="floatingPassword"
                                placeholder="Monto">
                            <label for="floatingPassword">Cel/Tel</label>
                        </div>
                    </div>
                    <div class="col-md-6" style="display: none">
                        <div class="form-floating mb-3">
                            <input name="id" value="{{$id}}" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Fecha Fin</label>
                        </div>
                    </div>
                    <div class="col-md-6" style="display: none">
                        <div class="form-floating mb-3">
                            <input name="service_id" value="{{$service_id}}" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Fecha Fin</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-6 text-end">
                        <form method="GET" action="{{ url()->previous() }}">
                            <button type="submit" class="btn btn-primary">Volver</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
