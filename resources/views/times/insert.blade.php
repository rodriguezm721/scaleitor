@extends('layouts.layout')
@section('content')
<div class="container-fluid pt-4 px-4">
   <div class="row g-4">
      <div class="col-sm-12 col-xl-12">
         <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4 text-center">Nuevo Convenio</h3>
            <form class="row g-3" method="POST" action="{{ route('convenios.store') }}">
               @csrf
               <!----------------------ROW 1-------------------------->
               <div class="col-md-6">
                  <div class="form-floating mb-3">
                     <input name="fecha_inicio" type="date" value="{{old('fecha_inicio')}}" class="form-control" id="floatingPassword"
                        placeholder="Fecha Inicio">
                     <label for="floatingPassword">Fecha Inicio</label>
                  </div>
                  @error('fecha_inicio')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-6">
                  <div class="form-floating mb-3">
                     <input name="fecha_fin" type="date" value="{{old('fecha_fin')}}" class="form-control" id="floatingPassword"
                        placeholder="Fecha Fin">
                     <label for="floatingPassword">Fecha Fin</label>
                  </div>
                  @error('fecha_fin')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-6">
                  <div class="form-floating mb-3">
                     <input name="monto" type="text" value="{{old('monto')}}" class="form-control" id="floatingPassword"
                        placeholder="Monto">
                     <label for="floatingPassword">Monto</label>
                  </div>
                  @error('monto')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-6">
                  <div class="form-floating">
                     <textarea class="form-control" name="comentario" placeholder="Agrega comentarios aquí..."
                        id="floatingTextarea">{{old('comentario')}}</textarea>
                     <label for="floatingTextarea">Comentarios</label>
                  </div>
               </div>
               <div class="col-md-6" style="display: none">
                  <div class="form-floating mb-3">
                     <input name="id" value="{{$id}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="">
                  </div>
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