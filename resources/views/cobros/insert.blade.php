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
                        <input name="num_factura" type="text" value="{{ old('num_factura') }}" class="form-control" id="numFacturaInput" placeholder="Act Indirectos">
                        <label for="numFacturaInput">Número de Estimación</label>
                     </div>
                     @error('num_factura')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
                  <div class="col-md-4">
                     <div class="form-floating mb-3">
                        <input name="periodo" type="text" value="{{ old('periodo') }}" class="form-control" id="periodoInput" placeholder="Ajuste Costos">
                        <label for="periodoInput">Periodo</label>
                     </div>
                     @error('periodo')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
                  <div class="col-md-4">
                     <div class="form-floating mb-3">
                        <input name="fecha_ingreso" value="{{ old('fecha_ingreso') }}" type="date" class="form-control" id="fechaIngresoInput" placeholder="Act Indirectos">
                        <label for="fechaIngresoInput">Fecha Ingreso</label>
                     </div>
                     @error('fecha_ingreso')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-floating mb-3">
                        <input name="programado" type="text" value="{{ old('programado') }}" class="form-control" id="programadoInput" placeholder="Act Indirectos">
                        <label for="programadoInput">Programado</label>
                     </div>
                     @error('programado')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
                  <div class="col-md-4">
                     <div class="form-floating mb-3">
                        <input name="estimado" type="text" value="{{ old('estimado') }}" class="form-control" id="estimadoInput" placeholder="Act Indirectos">
                        <label for="estimadoInput">Estimado</label>
                     </div>
                     @error('estimado')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
                  <div class="col-md-4">
                     <div class="form-floating mb-3">
                        <input name="cobrado" type="text" value="{{ old('cobrado') }}" class="form-control" id="cobradoInput" placeholder="Act Indirectos">
                        <label for="cobradoInput">Cobrado</label>
                     </div>
                     @error('cobrado')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
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