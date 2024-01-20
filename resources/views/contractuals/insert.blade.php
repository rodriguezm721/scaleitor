@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">NUEVO CONTRATO</h3>
                <form class="row g-3" method="POST" action="{{ route('contratos.store') }}">
                    @csrf
                    <!----------------------ROW 1-------------------------->
                    <div class="col-md-6">
                        <div class="form-floating">
                            <textarea class="form-control" name="nom_proyecto" placeholder="Agrega comentarios aquí..."
                                id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Contrato</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="no_contrato" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">No. de contrato</label>
                        </div>
                    </div>
                    <!----------------------ROW 2-------------------------->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="empresa_cont" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Empresa contratada</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="consorcio" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Participación en consorcio</label>
                        </div>
                    </div>
                    <!----------------------ROW 3-------------------------->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="emp_contratante" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Empresa contratante</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="imp_contrato" type="number" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Importe de contrato</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="coordinacion" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Elige una opción...</option>
                                <option value="Proyectos">Proyectos</option>
                                <option value="Ambiental">Ambiental</option>
                                <option value="Supervision">Supervisión</option>
                                <option value="Construccion">Construcción</option>
                            </select>
                            <label for="floatingSelect">Coodinación</label>
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
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="fecha_inicio" type="date" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Fecha Inicio</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="fecha_fin" type="date" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Fecha Fin</label>
                        </div>
                    </div>
                    <!----------------------ROW 6-------------------------->
                    <div class="d-flex justify-content-between">
                        <h3>CONVENIOS</h3>
                        <div class="">
                            <button type="button" class="btn btn-success" onclick="agregarFila()">Agregar Convenio</button>
                        </div>
                    </div>
                    <div id="filas-container">
                    </div>
                    <!-------------------------------------------------------------------------->
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
