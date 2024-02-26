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
                                id="floatingTextarea">{{old('nom_proyecto')}}</textarea>
                            <label for="floatingTextarea">Contrato</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="no_contrato" type="text" class="form-control" id="floatingPassword"
                                placeholder="" value="{{old('no_contrato')}}">
                            <label for="floatingPassword">No. de contrato</label>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-around">
                        @error('nom_proyecto')
                        <div class="col-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                        @error('no_contrato')
                        <div class="col-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <!----------------------ROW 2-------------------------->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="empresa_cont" type="text" class="form-control" id="floatingPassword"
                                placeholder="" value="{{old('empresa_cont')}}">
                            <label for="floatingPassword">Empresa contratada</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="consorcio" type="text" class="form-control" id="floatingPassword"
                                placeholder="" value="{{old('consorcio')}}">
                            <label for="floatingPassword">Participación en consorcio</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="c_costo" type="text" class="form-control" id="floatingPassword"
                                placeholder="" value="{{old('c_costo')}}">
                            <label for="floatingPassword">Centro de Costos</label>
                        </div>
                    </div>
                    <!----------------------ROW 3-------------------------->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="emp_contratante" type="text" class="form-control" id="floatingPassword"
                                placeholder="" value="{{old('emp_contratante')}}">
                            <label for="floatingPassword">Empresa contratante</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="imp_contrato" type="text" class="form-control" id="floatingPassword"
                                placeholder="" value="{{old('imp_contrato')}}">
                            <label for="floatingPassword">Importe de contrato</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="coordinacion" id="floatingSelect" aria-label="Floating label select example"> 
                                @if(old('coordinacion'))
                                    <option selected value="{{ old('coordinacion') }}">{{ old('coordinacion') }}</option>
                                @else
                                    <option selected disabled>Selecciona una opción...</option>
                                @endif
                                <option value="Proyectos" @if(old('coordinacion') == 'Proyectos') disabled @endif>Proyectos</option>
                                <option value="Ambiental" @if(old('coordinacion') == 'Ambiental') disabled @endif>Ambiental</option>
                                <option value="Supervision" @if(old('coordinacion') == 'Supervision') disabled @endif>Supervisión</option>
                                <option value="Construccion" @if(old('coordinacion') == 'Construccion') disabled @endif>Construcción</option>
                            </select>
                            <label for="floatingSelect">Coordinación</label>
                        </div>
                    </div>
                    @error('imp_contrato')
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                      </div>
                    @enderror
                    <!----------------------ROW 4-------------------------->
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="descripcion" placeholder="Agrega comentarios aquí..."
                                id="floatingTextarea" style="height: 150px;">{{old('descripcion')}}</textarea>
                            <label for="floatingTextarea">Descripción</label>
                        </div>
                    </div>
                    <!----------------------ROW 5-------------------------->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="fecha_inicio" type="date" class="form-control" id="floatingPassword"
                            value="{{old('fecha_inicio')}}">
                            <label for="floatingPassword">Fecha Inicio</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="fecha_fin" type="date" class="form-control" id="floatingPassword"
                            value="{{old('fecha_fin')}}">
                            <label for="floatingPassword">Fecha Fin</label>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                    @error('fecha_inicio')
                        <div class="col-md-6">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    @error('fecha_fin')
                        <div class="col-md-6">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    </div>
                    <!----------------------ROW 6-------------------------->
                    <!---<div class="d-flex justify-content-between">
                        <h3>CONVENIOS</h3>
                        <div class="">
                            <button type="button" class="btn btn-success" onclick="agregarFila()">Agregar Convenio</button>
                        </div>
                    </div>
                    <div id="filas-container">
                    </div>--->
                    <!-------------------------------------------------------------------------->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-6 text-end">
                        <a href="#" onclick="history.back();"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
