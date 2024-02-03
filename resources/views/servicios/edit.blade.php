@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Nueva Operación</h3>
                <form class="row g-3" method="POST" action="{{ route('servicios.update', $operacion)}}">
                    @csrf
                    @method('put')
                    <!----------------------ROW 1-------------------------->
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="nom_corto" placeholder="Descripción del trabajo..."
                                id="floatingTextarea">{{ $operacion->nom_corto}}</textarea>
                            <label for="floatingTextarea">Descripción del Trabajo</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="alcance" placeholder="Descripción del trabajo..."
                                id="floatingTextarea">{{ $operacion->alcance}}</textarea>
                            <label for="floatingTextarea">Alcance del trabajo</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input name="lider" value="{{ $operacion->lider}}" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Lider de Proyecto</label>
                        </div>
                    </div>
                    <div class="col-md-12" style="display: none">
                        <div class="form-floating mb-3">
                            <input name="contractual_id" value="{{ $operacion->contractual_id}}" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Lider de Proyecto</label>
                        </div>
                    </div>
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
