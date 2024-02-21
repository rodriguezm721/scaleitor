@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Nuevo Avance</h3>
                <form class="row g-3" method="POST" action="{{ route('avances.store')}}">
                    @csrf
                    <!----------------------ROW 1-------------------------->
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="tipo" id="floatingSelect"
                                aria-label="Floating label select example"> 
                                @if(old('tipo'))                             
                                <option selected value="{{old('tipo')}}">{{old('tipo')}}</option>
                                @if(old('tipo') == 'General')
                                <option value="Supervision">Supervisión</option>
                                <option value="Constructora">Constructora</option>
                                @endif
                                @if(old('tipo') == 'Supervision')
                                <option value="General">General</option>
                                <option value="Constructora">Constructora</option>
                                @endif
                                @if(old('tipo') == 'Constructora')
                                <option value="General">General</option>
                                <option value="Supervision">Supervisión</option>
                                @endif
                                @else
                                <option selected>Selecciona una opción...</option>
                                <option value="General">General</option>
                                <option value="Supervision">Supervisión</option>
                                <option value="Constructora">Constructora</option>
                                @endif
                            </select>
                            <label for="floatingSelect">Tipo de Avance</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input name="pro_fisico" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Programado Físico</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input name="real_fisico" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Real Físico</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <textarea class="form-control" name="fisico_obs" placeholder="Agrega observaciones aquí..."
                                id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Observaciones</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        @error('pro_fisico')
                        <div class="col-md-3">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    @error('real_fisico')
                        <div class="col-md-3">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    </div>
                    <!----------------------------------ROW 2------------------------------------------------>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input name="pro_fina" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Programado Financiero</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input name="real_fina" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                            <label for="floatingPassword">Real Financiero</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <textarea class="form-control" name="financiero_obs" placeholder="Agrega observaciones aquí..."
                                id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Observaciones</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        @error('pro_fina')
                        <div class="col-md-3">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    @error('real_fina')
                        <div class="col-md-3">
                            <div class="alert alert-danger small-alert" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                    </div>
                    <div class="col-md-3" style="display: none">
                        <div class="form-floating mb-3">
                            <input name="contrato_id" value="{{$id}}" type="text" class="form-control" id="floatingPassword"
                                placeholder="">
                        </div>
                    </div>
                    <!-------------------------------------ROW 3------------------------------->
                    <!----------------------ROW 6-------------------------->
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
