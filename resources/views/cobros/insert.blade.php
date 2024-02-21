@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Nuevo Cobro</h3>
                <form class="row g-3" method="POST" action="{{ route('cobros.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input name="num_factura" type="text" value="{{old('num_factura')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Número de Factura</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input name="periodo" type="text" value="{{old('periodo')}}" class="form-control" id="floatingPassword"
                                    placeholder="Ajuste Costos">
                                <label for="floatingPassword">Periodo</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input name="fecha_ingreso" value="{{old('fecha_ingreso')}}" type="date" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Fecha Ingreso</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        @error('num_factura')
                        <div class="col-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    @error('periodo')
                        <div class="col-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    @error('fecha_ingreso')
                        <div class="col-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input name="programado" type="text" value="{{old('programado')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Programado</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input name="estimado" type="text" value="{{old('estimado')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Estimado</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input name="cobrado" type="text" value="{{old('cobrado')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Cobrado</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        @error('programado')
                        <div class="col-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    @error('estimado')
                        <div class="col-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    @error('cobrado')
                        <div class="col-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="comentario" placeholder="Agrega comentarios aquí..."
                                    id="floatingTextarea" style="height: 150px;">{{old('comentario')}}</textarea>
                                <label for="floatingTextarea">Comentarios</label>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: none">
                        <input name="contrato_id" value="{{$id}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="Act Indirectos">
                        <label for="floatingPassword">Acumulado</label>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-6 text-end">
                            <a href="{{ route('contratos.show', $id)}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
