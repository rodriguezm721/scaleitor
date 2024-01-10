@extends('layouts.layout')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Actualizar Cobro</h3>
                <form class="row g-3" method="POST" action="{{route('cobros.update', $cobro)}}">
                    @method('put')
                    @csrf
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="ajuste_costos" type="text" value="{{$cobro->ajuste_costos}}" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Ajuste Costos</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="act_indirectos" type="text" value="{{$cobro->act_indirectos}}" class="form-control" id="floatingPassword"
                                placeholder="Act Indirectos">
                            <label for="floatingPassword">Act Indirectos</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="estatus_est" id="floatingSelect"
                                aria-label="Floating label select example">
                                @if($cobro->estatus_est == '1')
                                <option value="1" selected>One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                @endif
                                @if($cobro->estatus_est == '2')
                                <option value="1">One</option>
                                <option value="2" selected>Two</option>
                                <option value="3">Three</option>
                                @endif
                                @if($cobro->estatus_est == '3')
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3" selected>Three</option>
                                @endif
                            </select>
                            <label for="floatingSelect">Estatus</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-6 text-end">

                            <a href=""><button type="button" class="btn btn-danger">Cancelar</button></a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
