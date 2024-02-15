@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Nuevo Cobro</h3>
                <form class="row g-3" method="POST" action="{{ route('cobros.update', $cobro) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input name="total_contrato" type="text" value="{{ number_format($cobro->total_contrato, 2, '.', ',')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Total Contrato</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input name="periodo" type="text" value="{{ $cobro->periodo}}" class="form-control" id="floatingPassword"
                                    placeholder="Ajuste Costos">
                                <label for="floatingPassword">Periodo</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input name="fecha_ingreso" type="date" value="{{ $cobro->fecha_ingreso}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Fecha Ingreso</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input name="programado" type="text" value="{{ number_format($cobro->programado, 2, '.', ',')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Programado</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input name="acum_promg" type="text" value="{{ number_format($cobro->acum_promg, 2, '.', ',')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Acumulado</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input name="estimado" type="text" value="{{ number_format($cobro->estimado, 2, '.', ',')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Estimado</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input name="acum_esti" type="text" value="{{ number_format($cobro->acum_esti, 2, '.', ',')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Acumulado</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input name="cobrado" type="text" value="{{ number_format($cobro->cobrado, 2, '.', ',')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Cobrado</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input name="acum_cobra" type="text" value="{{ number_format($cobro->acum_cobra, 2, '.', ',')}}" class="form-control" id="floatingPassword"
                                    placeholder="Act Indirectos">
                                <label for="floatingPassword">Acumulado</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="comentario" placeholder="Agrega comentarios aquí..."
                                    id="floatingTextarea" style="height: 150px;">{{ $cobro->comentario}}</textarea>
                                <label for="floatingTextarea">Comentarios</label>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: none">
                        <input name="contrato_id" value="{{$cobro->contractual_id}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="Act Indirectos">
                        <label for="floatingPassword">Acumulado</label>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-6 text-end">

                            <a href="{{route('cobros.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
