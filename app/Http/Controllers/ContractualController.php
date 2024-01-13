<?php

namespace App\Http\Controllers;

use App\Models\Contractual;
use Illuminate\Http\Request;

class ContractualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contractual::all();
        return view('contractuals.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contractuals.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cobro = new Contractual;
        $cobro->nom_proyecto = $request->input('nom_proyecto');
        $cobro->no_contrato = $request->input('no_contrato');
        $cobro->empresa_cont = $request->input('empresa_cont');
        $cobro->consorcio = $request->input('consorcio');
        $cobro->emp_contratante = $request->input('emp_contratante');
        $cobro->imp_contrato = $request->input('imp_contrato');
        $cobro->periodo_eject = $request->input('periodo_eject');
        $cobro->descripcion = $request->input('descripcion');
        $cobro->save();
        return redirect()->route('contratos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contractual $contractual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($contractual)
    {
        //Hace un select al modelo de estado por medio de un id que llega como parametro
        $contrato = Contractual::find($contractual);
        //Retorna una vista con la consulta que hizo al modelo
        return view('contractuals.edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contratos = Contractual::find($id);
        //Hace un update al registro con lo datos que llegaron del request
        $contratos->fill($request->input())->saveOrFail();
        return redirect()->route('contratos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($contractual)
    {
        $contractual = Contractual::find($contractual);
        //Ejecuta el metodo delete al registro con el id que llego como parametro
        $contractual->delete();
        // Hace una redirecion a la ruta que devuelve una vista index
        return redirect()->route('contratos.index');
    }
}
