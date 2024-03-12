@extends('layouts.layout')
@section('content')
<style>
   .card{
   box-shadow: #5DADE2 0px 20px 30px -10px;
   }
   .card:hover {
        transform: translateY(-5px);
    }
</style>
<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
   <div class="row g-4">
      <div class="col-sm-6 col-xl-3">
         <div class="rounded d-flex align-items-center justify-content-between p-4 color-card">
            <img src="{{ asset('img\icons\arquitecto.png')}}" alt="">
            <div class="ms-3">
               <p class="mb-2">Proyectos</p>
               <span class="mb-0">{{ $proyectos->count() }}</span>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-xl-3">
         <div class="color-card rounded d-flex align-items-center justify-content-between p-4">
            <img src="{{ asset('img\icons\ambiental.png')}}" alt="">
            <div class="ms-3">
               <p class="mb-2">Ambiental</p>
               <span class="mb-0">{{ $ambiental->count() }}</span>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-xl-3">
         <div class="color-card rounded d-flex align-items-center justify-content-between p-4">
            <img src="{{ asset('img\icons\supervision.png')}}" alt="">
            <div class="ms-3">
               <p class="mb-2">Supervisión</p>
               <span class="mb-0">{{ $supervision->count() }}</span>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-xl-3">
         <div class="color-card rounded d-flex align-items-center justify-content-between p-4">
            <img src="{{ asset('img\icons\trabajador.png')}}" alt="">
            <div class="ms-3">
               <p class="mb-2">Construcción</p>
               <span class="mb-0">{{ $construccion->count() }}</span>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid pt-4 px-4">
   <div class="row g-4">
      <div class="col-sm-12 col-xl-12">
         <div class="bg-light rounded h-100 p-4">
            @if($errors->has('error'))
            <div class="row">
               <div class="col-md-4 offset-md-4 text-center">
                  <div class="alert alert-danger">
                     {{ $errors->first('error') }}
                  </div>
               </div>
            </div>
            @endif
            <div class="row justify-content-evenly">
               <div class="col-md-4">
                  <div class="card" style="width: 18rem;">
                     <img src="{{ asset('img\proyectos.jpg')}}" class="card-img-top" alt="...">
                     <div class="card-body text-center">
                       <h5 class="card-title">Proyectos</h5>
                       <p class="card-text">Consulta proyectos de proyectos.</p>
                       <a href="#" class="btn color-card" data-bs-toggle="modal" data-bs-target="#exampleModal">Consultar</a>
                     </div>
                   </div>
               </div>
               <div class="col-md-4">
                  <div class="card" style="width: 18rem;">
                     <img src="{{ asset('img\supervision.jpg')}}" class="card-img-top" alt="...">
                     <div class="card-body text-center">
                       <h5 class="card-title">Supervisión</h5>
                       <p class="card-text">Consulta proyectos de supervisión.</p>
                       <a href="#" class="btn color-card" data-bs-toggle="modal" data-bs-target="#exampleModalSup">Consultar</a>
                     </div>
                   </div>
               </div>
           </div>
           <div class="row justify-content-evenly mt-5">
            <div class="col-md-4">
               <div class="card" style="width: 18rem;">
                  <img src="{{ asset('img\ambiental.jpg')}}" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <h5 class="card-title">Ambiental</h5>
                    <p class="card-text">Consulta proyectos de ambiental.</p>
                    <a href="#" class="btn color-card" data-bs-toggle="modal" data-bs-target="#exampleModalAmb">Consultar</a>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
               <div class="card" style="width: 18rem;">
                  <img src="{{ asset('img\construccion.jpeg')}}" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <h5 class="card-title">Construcción</h5>
                    <p class="card-text">Consulta proyectos de construcción.</p>
                    <a href="#" class="btn color-card" data-bs-toggle="modal" data-bs-target="#exampleModalCons">Consultar</a>
                  </div>
                </div>
            </div>
           </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Que deseas consultar?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="row g-3 text-center" method="POST" action="{{ route('consulta.show')}}">
               @csrf
               <!----------------------ROW 1-------------------------->
               <div class="col-md-12">
                  <div class="form-floating mb-3">
                     <select class="form-select" name="contrato" id="floatingSelect"
                        aria-label="Floating label select example">
                        @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->nom_proyecto}}</option>
                        @endforeach
                     </select>
                     <label for="floatingSelect">Elige el contrato</label>
                  </div>
               </div>
               <!-------------------------------------------------------------------------->
               <!--<div class="col-sm-12 col-xl-12">
                  <div class="rounded h-100 p-4">
                      <h6 class="mb-4">Selecciona las tablas a consultar</h6>
                      <div class="btn-group" role="group">
                          <input type="checkbox" name="check1" class="btn-check" id="btncheck1" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck1">Inf Contractual</label>
                  
                          <input type="checkbox" name="check2" class="btn-check" id="btncheck2" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck2">Convenios</label>
                  
                          <input type="checkbox" name="check3" class="btn-check" id="btncheck3" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck3">Avances</label>
                      </div>
                  </div>
                  </div>--->
               <div class="row justify-content-around mt-5">
                  <div class="col-4">
                     <button type="submit" class="btn btn-primary">Consultar</button>
                  </div>
                  <div class="col-4 text-end">
                     <a href="" data-bs-dismiss="modal"><button type="button" class="btn btn-danger">Cerrar</button></a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="exampleModalAmb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Que deseas consultar?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="row g-3 text-center" method="POST" action="{{ route('consulta.show')}}">
               @csrf
               <!----------------------ROW 1-------------------------->
               <div class="col-md-12">
                  <div class="form-floating mb-3">
                     <select class="form-select" name="contrato" id="floatingSelect"
                        aria-label="Floating label select example">
                        @foreach ($ambiental as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->nom_proyecto}}</option>
                        @endforeach
                     </select>
                     <label for="floatingSelect">Elige el contrato</label>
                  </div>
               </div>
               <!-------------------------------------------------------------------------->
               <!--<div class="col-sm-12 col-xl-12">
                  <div class="rounded h-100 p-4">
                      <h6 class="mb-4">Selecciona las tablas a consultar</h6>
                      <div class="btn-group" role="group">
                          <input type="checkbox" name="check1" class="btn-check" id="btncheck1" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck1">Inf Contractual</label>
                  
                          <input type="checkbox" name="check2" class="btn-check" id="btncheck2" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck2">Convenios</label>
                  
                          <input type="checkbox" name="check3" class="btn-check" id="btncheck3" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck3">Avances</label>
                      </div>
                  </div>
                  </div>--->
               <div class="row justify-content-around mt-5">
                  <div class="col-4">
                     <button type="submit" class="btn btn-primary">Consultar</button>
                  </div>
                  <div class="col-4 text-end">
                     <a href="" data-bs-dismiss="modal"><button type="button" class="btn btn-danger">Cerrar</button></a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="exampleModalSup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Que deseas consultar?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="row g-3 text-center" method="POST" action="{{ route('consulta.show')}}">
               @csrf
               <!----------------------ROW 1-------------------------->
               <div class="col-md-12">
                  <div class="form-floating mb-3">
                     <select class="form-select" name="contrato" id="floatingSelect"
                        aria-label="Floating label select example">
                        @foreach ($supervision as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->nom_proyecto}}</option>
                        @endforeach
                     </select>
                     <label for="floatingSelect">Elige el contrato</label>
                  </div>
               </div>
               <!-------------------------------------------------------------------------->
               <!--<div class="col-sm-12 col-xl-12">
                  <div class="rounded h-100 p-4">
                      <h6 class="mb-4">Selecciona las tablas a consultar</h6>
                      <div class="btn-group" role="group">
                          <input type="checkbox" name="check1" class="btn-check" id="btncheck1" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck1">Inf Contractual</label>
                  
                          <input type="checkbox" name="check2" class="btn-check" id="btncheck2" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck2">Convenios</label>
                  
                          <input type="checkbox" name="check3" class="btn-check" id="btncheck3" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck3">Avances</label>
                      </div>
                  </div>
                  </div>--->
               <div class="row justify-content-around mt-5">
                  <div class="col-4">
                     <button type="submit" class="btn btn-primary">Consultar</button>
                  </div>
                  <div class="col-4 text-end">
                     <a href="" data-bs-dismiss="modal"><button type="button" class="btn btn-danger">Cerrar</button></a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="exampleModalCons" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Que deseas consultar?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form class="row g-3 text-center" method="POST" action="{{ route('consulta.show')}}">
               @csrf
               <!----------------------ROW 1-------------------------->
               <div class="col-md-12">
                  <div class="form-floating mb-3">
                     <select class="form-select" name="contrato" id="floatingSelect"
                        aria-label="Floating label select example">
                        @foreach ($construccion as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->nom_proyecto}}</option>
                        @endforeach
                     </select>
                     <label for="floatingSelect">Elige el contrato</label>
                  </div>
               </div>
               <!-------------------------------------------------------------------------->
               <!--<div class="col-sm-12 col-xl-12">
                  <div class="rounded h-100 p-4">
                      <h6 class="mb-4">Selecciona las tablas a consultar</h6>
                      <div class="btn-group" role="group">
                          <input type="checkbox" name="check1" class="btn-check" id="btncheck1" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck1">Inf Contractual</label>
                  
                          <input type="checkbox" name="check2" class="btn-check" id="btncheck2" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck2">Convenios</label>
                  
                          <input type="checkbox" name="check3" class="btn-check" id="btncheck3" autocomplete="off">
                          <label class="btn btn-outline-primary" for="btncheck3">Avances</label>
                      </div>
                  </div>
                  </div>--->
               <div class="row justify-content-around mt-5">
                  <div class="col-4">
                     <button type="submit" class="btn btn-primary">Consultar</button>
                  </div>
                  <div class="col-4 text-end">
                     <a href="" data-bs-dismiss="modal"><button type="button" class="btn btn-danger">Cerrar</button></a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection