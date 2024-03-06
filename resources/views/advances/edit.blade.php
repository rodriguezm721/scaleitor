@extends('layouts.layout')
@section('content')
<div class="container-fluid pt-4 px-4">
   <div class="row g-4">
      <div class="col-sm-12 col-xl-12">
         <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4 text-center">Actualizar Avance</h3>
            <form class="row g-3" method="POST" action="{{ route('avances.update', $avance)}}">
               @csrf
               @method('put')
               <div class="col-md-12">
                  <div class="form-floating mb-3">
                     <select class="form-select" name="coordinacion" id="floatingSelect"
                        aria-label="Floating label select example">
                        @if($avance->tipo == 'General')
                        <option value="General" selected>General</option>
                        <option value="Supervision">Supervisión</option>
                        <option value="Constructora">Constructora</option>
                        @elseif($avance->tipo == 'Supervision')
                        <option value="Supervision" selected>Supervisión</option>
                        <option value="General">General</option>
                        <option value="Constructora">Constructora</option>
                        @elseif($avance->tipo == 'Constructora')
                        <option value="Constructora" selected>Constructora</option>
                        <option value="Supervision">Supervisión</option>
                        <option value="General">General</option>
                        @endif
                     </select>
                     <label for="floatingSelect">Tipo de Avance</label>
                  </div>
               </div>
               <!----------------------ROW 1-------------------------->
               <div class="col-md-3">
                  <div class="form-floating mb-3">
                     <input name="pro_fisico" value="{{ $avance->pro_fisico}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="">
                     <label for="floatingPassword">Programado Físico</label>
                  </div>
                  @error('pro_fisico')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-3">
                  <div class="form-floating mb-3">
                     <input name="real_fisico" value="{{ $avance->real_fisico}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="">
                     <label for="floatingPassword">Real Físico</label>
                  </div>
                  @error('real_fisico')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-6">
                  <div class="form-floating">
                     <textarea class="form-control" name="fisico_obs" placeholder="Agrega observaciones aquí..."
                        id="floatingTextarea">{{ $avance->fisico_obs}}</textarea>
                     <label for="floatingTextarea">Observaciones</label>
                  </div>
               </div>
               <!----------------------------------ROW 2------------------------------------------------>
               <div class="col-md-3">
                  <div class="form-floating mb-3">
                     <input name="pro_fina" value="{{ $avance->pro_fina}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="">
                     <label for="floatingPassword">Programado Financiero</label>
                  </div>
                  @error('pro_fina')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-3">
                  <div class="form-floating mb-3">
                     <input name="real_fina" value="{{ $avance->real_fina}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="">
                     <label for="floatingPassword">Real Financiero</label>
                  </div>
                  @error('real_fina')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-6">
                  <div class="form-floating">
                     <textarea class="form-control" name="financiero_obs" placeholder="Agrega observaciones aquí..."
                        id="floatingTextarea">{{ $avance->financiero_obs}}</textarea>
                     <label for="floatingTextarea">Observaciones</label>
                  </div>
               </div>
               <div class="col-md-3" style="display: none">
                  <div class="form-floating mb-3">
                     <input name="contrato_id" value="{{ $avance->contractual_id}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="">
                     <label for="floatingPassword">Desviación Financiero</label>
                  </div>
               </div>
               <div class="col-6">
                  <button type="submit" class="btn btn-primary">Guardar</button>
               </div>
               <div class="col-6 text-end">
                  <a href="{{ route('contratos.show', $avance->contractual_id)}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection