@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-center mb-5">
            <h6 class="mb-0">
                <h3>
                    INFORMACIÓN CONTRACTUAL
                </h3>
            </h6>
        </div>
        @foreach($resultados1 as $contrato)
        <div class="row">
            <div class="col-md-6">
                <h6>Nombre de Contrato</h6>
                <p>
                    {{ $contrato->nom_proyecto}}
                </p>
            </div>
            <div class="col-md-6">
                <h6>Nombre de Contrato</h6>
                <p>
                    {{ $contrato->no_contrato}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6>Empresa contratada</h6>
                <p>
                    {{ $contrato->empresa_cont}}
                </p>
            </div>
            <div class="col-md-6">
                <h6>Consorcio</h6>
                <p>
                    {{ $contrato->consorcio}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6>Empresa contratante</h6>
                <p>
                    {{ $contrato->emp_contratante}}
                </p>
            </div>
            <div class="col-md-6">
                <h6>Coordinación</h6>
                <p>
                    {{ $contrato->coordinacion}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6>Importe de contrato</h6>
                <p>
                    {{ $contrato->imp_contrato}}
                </p>
            </div>
            <div class="col-md-6">
                <h6>Total de dias</h6>
                <p>
                    {{ $contrato->total_dias}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6>Fecha de inicio</h6>
                <p>
                    {{ $contrato->fecha_inicio}}
                </p>
            </div>
            <div class="col-md-6">
                <h6>Fecha de fin</h6>
                <p>
                    {{ $contrato->fecha_fin}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6>Descripción</h6>
                <p>
                    {{ $contrato->descripcion}}
                </p>
            </div>
        </div>

        @endforeach
        @if (!empty($resultados2))
        <div class="d-flex align-items-center justify-content-center mb-4">
            <h6 class="mb-0">
                <h3>
                    CONVENIOS
                </h3>
            </h6>
        </div>
            @if (!empty($resultados2))
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">ID</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Fin</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Dias</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resultados2 as $convenio)
                        <tr>
                            <td>{{$convenio->id}}</td>
                            <td>
                                @if(isset($convenio->fecha_inicio))
                                    {{$convenio->fecha_inicio}}
                                @else
                                <h6>Sin extensión de tiempo</h6>
                                @endif
                            </td>
                            <td>
                                @if(isset($convenio->fecha_fin))
                                    {{$convenio->fecha_fin}}
                                @else
                                <h6>Sin extensión de tiempo</h6>
                                @endif
                            </td>
                            <td>
                                @if(isset($convenio->monto))
                                    {{$convenio->monto}}
                                @else
                                <h6>Sin extensión de monto</h6>
                                @endif
                            </td>
                            <td>{{$convenio->dias}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <h6>Aun no hay convenios por mostrar</h6>
            @endif
        @endif
        <p>
            @foreach($resultados3 as $contrato)
            {{ $contrato->nom_proyecto}}
            @endforeach
        </p>
    </div>
    
</div>
@endsection
