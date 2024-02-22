@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Actualizar Convenio</h3>
                <form class="row g-3" method="POST" action="{{ route('convenios.update', $convenio) }}">
                    @csrf
                    @method('put')
                    <!----------------------ROW 1-------------------------->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="fecha_inicio" type="date" value="{{ $convenio->fecha_inicio }}" class="form-control" id="floatingPassword"
                                placeholder="Fecha Inicio">
                            <label for="floatingPassword">Fecha Inicio</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="fecha_fin" type="date" value="{{ $convenio->fecha_fin }}" class="form-control" id="floatingPassword"
                                placeholder="Fecha Fin">
                            <label for="floatingPassword">Fecha Fin</label>
                        </div>
                    </div>
                    @error('fecha_inicio')
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    </div>
                    @enderror
                    @error('fecha_fin')
                    <div class="row justify-content-end">
                        <div class="col-md-6">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    </div>
                    @enderror
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input name="monto" type="text" value="{{ $convenio->monto }}" class="form-control" id="floatingPassword"
                                placeholder="Monto">
                            <label for="floatingPassword">Monto</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <textarea class="form-control" name="comentario" placeholder="Agrega comentarios aquí..."
                                id="floatingTextarea">{{ $convenio->comentario }}</textarea>
                            <label for="floatingTextarea">Comentarios</label>
                        </div>
                    </div>
                    @error('monto')
                    <div class="row justify-content-start">
                        <div class="col-md-4">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                      </div>
                    @enderror
                    <div class="col-md-6" style="display: none">
                        <div class="form-floating mb-3">
                            <input name="id" value="{{ $convenio->contractual_id }}" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Fecha Fin</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('contratos.show', $convenio->contractual_id)}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
