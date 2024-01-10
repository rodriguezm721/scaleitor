@extends('layouts.layout')
@section('content')
<!---
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <form action="">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Floating Label</h6>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">Comments</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>---->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Nuevo Corte</h3>
                <form class="row g-3" method="POST" action="{{ route('cobros.store') }}">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="dt_ajuste" type="text" class="form-control" id="floatingPassword"
                                placeholder="Ajuste Costos">
                            <label for="floatingPassword">Ajuste Costos</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input name="dt_indirectos" type="text" class="form-control" id="floatingPassword"
                                placeholder="Act Indirectos">
                            <label for="floatingPassword">Act Indirectos</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="dt_estatus_est" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Elige una opción...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
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
