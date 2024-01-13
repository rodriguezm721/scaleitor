@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Nuevo Contrato</h3>
                <form class="row g-3" method="POST" action="{{ route('contratos.store') }}">
                    @csrf
                    <!----------------------ROW 1-------------------------->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="nom_proyecto" type="text" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Nombre del proyecto</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="no_contrato" type="text" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">No. de contrato</label>
                        </div>
                    </div>
                    <!----------------------ROW 2-------------------------->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="empresa_cont" type="text" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Empresa contratada</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="consorcio" type="text" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Participación en consorcio</label>
                        </div>
                    </div>
                    <!----------------------ROW 3-------------------------->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="emp_contratante" type="text" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Empresa contratante</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input name="imp_contrato" type="number" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Importe de contrato</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input name="periodo_eject" type="date" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Periodo de ejecución</label>
                        </div>
                    </div>
                    <!----------------------ROW 4-------------------------->
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="descripcion" placeholder="Agrega comentarios aquí..."
                                id="floatingTextarea" style="height: 150px;"></textarea>
                            <label for="floatingTextarea">Descripción</label>
                        </div>
                    </div>
                    <!----------------------ROW 5-------------------------->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{route('contratos.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
