<?php

namespace App\Http\Controllers;

use App\Models\Cobros;
use Illuminate\Http\Request;

class CobrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //define('NUMBER_OF_ITEMS_PER_PAGE', 10);
        //$cobros = Cobros::paginate(NUMBER_OF_ITEMS_PER_PAGE);
        $cobros = Cobros::all();
        return view('cobros.index', compact('cobros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cobros.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cobro = new Cobros;
        $cobro->estatus_est = $request->input('dt_estatus_est');
        $cobro->ajuste_costos = $request->input('dt_ajuste');
        $cobro->act_indirectos = $request->input('dt_indirectos');
        $cobro->save();
        return redirect()->route('cobros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cobros $cobros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cobros)
    {
        //Hace un select al modelo de estado por medio de un id que llega como parametro
        $cobro = Cobros::find($cobros);
        //Retorna una vista con la consulta que hizo al modelo
        return view('cobros.edit', compact('cobro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cobros = Cobros::find($id);
        //Hace un update al registro con lo datos que llegaron del request
        $cobros->fill($request->input())->saveOrFail();
        return redirect()->route('cobros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cobros)
    {
        $cobros = Cobros::find($cobros);
        //Ejecuta el metodo delete al registro con el id que llego como parametro
        $cobros->delete();
        // Hace una redirecion a la ruta que devuelve una vista index
        return redirect()->route('cobros.index');
    }
}
