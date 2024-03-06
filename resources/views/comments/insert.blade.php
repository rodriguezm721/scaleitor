@extends('layouts.layout')
@section('content')
<div class="container-fluid pt-4 px-4">
   <div class="row g-4">
      <div class="col-sm-12 col-xl-12">
         <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4 text-center">Nuevo Comentario</h3>
            <form class="row g-3" method="POST" action="{{ route('comentarios.store') }}">
               @csrf
               <!----------------------ROW 1-------------------------->
               <div class="col-md-8">
                  <div class="form-floating">
                     <textarea class="form-control" name="comment" placeholder="Agrega comentarios aquí..."
                        id="floatingTextarea"></textarea>
                     <label for="floatingTextarea">Comentario</label>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-floating mb-3">
                     <select class="form-select" name="tipo" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option disabled selected>Elige una opción...</option>
                        <option value="General">General</option>
                        <option value="Direccion">Dirección</option>
                     </select>
                     <label for="floatingSelect">Tipo de comentario</label>
                  </div>
                  @error('tipo')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-6" style="display: none">
                  <div class="form-floating mb-3">
                     <input name="id" value="{{$id}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="">
                     <label for="floatingPassword">Fecha Fin</label>
                  </div>
               </div>
               <div class="col-md-6" style="display: none">
                  <div class="form-floating mb-3">
                     <input name="service_id" value="{{$service_id}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="">
                     <label for="floatingPassword">Fecha Fin</label>
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