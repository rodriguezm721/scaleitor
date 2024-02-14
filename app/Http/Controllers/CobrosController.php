<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

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

    public function insert($id)
    {
        return view('cobros.insert', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'total_contrato' => ['required', 'numeric'],
            'periodo' => ['required'],
            'fecha_ingreso' => ['required'],
            'programado' => ['required', 'numeric'],
            'acum_promg' => ['required', 'numeric'],
            'estimado' => ['required', 'numeric'],
            'acum_esti' => ['required', 'numeric'],
            'cobrado' => ['required', 'numeric'],
            'acum_cobra' => ['required', 'numeric'],
        ]);


        $total_contrato = floatval($request->input('total_contrato'));
        $programado = floatval($request->input('programado'));
        $acum_promg = floatval($request->input('acum_promg'));
        $estimado = floatval($request->input('estimado'));
        $acum_esti = floatval($request->input('acum_esti'));
        $cobrado = floatval($request->input('cobrado'));
        $acum_cobra = floatval($request->input('acum_cobra'));

        $cobro = new Cobros;
        $cobro->total_contrato = $total_contrato;
        $cobro->periodo = $request->input('periodo');
        $cobro->fecha_ingreso = $request->input('fecha_ingreso');
        $cobro->programado = $programado;
        $cobro->program_xcentaje = round(($programado/$total_contrato)*100);
        $cobro->acum_promg = $acum_promg;
        $cobro->acumpg_xcentaje = round(($acum_promg/$total_contrato)*100);
        $cobro->estimado = $estimado;
        $cobro->estim_xcentaje = round(($estimado/$total_contrato)*100);
        $cobro->acum_esti = $acum_esti;
        $cobro->acumest_xcentaje = round(($acum_esti/$total_contrato)*100);
        $cobro->cobrado = $cobrado;
        $cobro->cobra_xcentaje = round(($cobrado/$total_contrato)*100);
        $cobro->acum_cobra = $acum_cobra;
        $cobro->acumcobra_xcentaje = round(($acum_cobra/$total_contrato)*100);
        $cobro->comentario = $request->input('comentario');
        $cobro->rsr = 'Algo';
        $cobro->contractual_id = $request->input('contrato_id');
        $cobro->save();
        return redirect()->route('contratos.show', ['contrato' => $request->input('contrato_id')]);
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
        //dd($request->input('programado'), floatval($request->input('programado')), floatval(str_replace(',', '', $request->input('programado'))));
        //dd(floatval($request->input('programado')));
        //dd(floatval(str_replace(',', '.', $request->input('programado'))));
        $total_contrato = floatval(str_replace(',', '', $request->input('total_contrato')));
        $programado = floatval(str_replace(',', '', $request->input('programado')));
        $acum_promg = floatval(str_replace(',', '', $request->input('acum_promg')));
        $estimado = floatval(str_replace(',', '', $request->input('estimado')));
        $acum_esti = floatval(str_replace(',', '', $request->input('acum_esti')));
        $cobrado = floatval(str_replace(',', '', $request->input('cobrado')));
        $acum_cobra = floatval(str_replace(',', '', $request->input('acum_cobra')));
        
        $cobro = Cobros::find($id);
        $cobro->total_contrato = $total_contrato;
        $cobro->periodo = $request->input('periodo');
        $cobro->fecha_ingreso = $request->input('fecha_ingreso');
        $cobro->programado = $programado;
        $cobro->program_xcentaje = round(($programado/$total_contrato)*100);
        $cobro->acum_promg = $acum_promg;
        $cobro->acumpg_xcentaje = round(($acum_promg/$total_contrato)*100);
        $cobro->estimado = $estimado;
        $cobro->estim_xcentaje = round(($estimado/$total_contrato)*100);
        $cobro->acum_esti = $acum_esti;
        $cobro->acumest_xcentaje = round(($acum_esti/$total_contrato)*100);
        $cobro->cobrado = $cobrado;
        $cobro->cobra_xcentaje = round(($cobrado/$total_contrato)*100);
        $cobro->acum_cobra = $acum_cobra;
        $cobro->acumcobra_xcentaje = round(($acum_cobra/$total_contrato)*100);
        $cobro->comentario = $request->input('comentario');
        $cobro->rsr = 'Algo';
        $cobro->contractual_id = $request->input('contrato_id');
        $cobro->save();
        return redirect()->route('contratos.show', ['contrato' => $request->input('contrato_id')]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cobro_id, $id)
    {
        DB::beginTransaction();
        try{
            $cobro = Cobros::find($cobro_id);
            //Ejecuta el metodo delete al registro con el id que llego como parametro
            $cobro->delete();
            // Hace una redirecion a la ruta que devuelve una vista index
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return redirect()->route('contratos.show', ['contrato' => $id]);

    }
}
