<?php

namespace App\Http\Controllers;

use App\Models\Advance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function insert($id)
    {
        return view('advances.insert', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $avance = new Advance;
        $avance->fisico_obs = $request->input('fisico_obs');
        $avance->pro_fisico = $request->input('pro_fisico');
        $avance->real_fisico = $request->input('real_fisico');
        $avance->des_fisico = floatval($request->input('pro_fisico')) - floatval($request->input('real_fisico'));
        $avance->financiero_obs = $request->input('financiero_obs');
        $avance->pro_fina = $request->input('pro_fina');
        $avance->real_fina = $request->input('real_fina');
        $avance->des_fina = floatval($request->input('pro_fina')) - floatval($request->input('real_fina'));
        $avance->contractual_id = $request->input('contrato_id');
        $avance->save();

        return redirect()->route('contratos.show', ['contrato' => $request->input('contrato_id')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Advance $advance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($advance)
    {
        DB::beginTransaction();
        try{
            //Hace un select al modelo de estado por medio de un id que llega como parametro
            $avance = Advance::find($advance);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return view('layouts.errorpage');
        }
        //Retorna una vista con la consulta que hizo al modelo
        return view('advances.edit', compact('avance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try{
            $avance = Advance::find($id);
            //Hace un update al registro con lo datos que llegaron del request
            $avance->fisico_obs = $request->input('fisico_obs');
            $avance->pro_fisico = $request->input('pro_fisico');
            $avance->real_fisico = $request->input('real_fisico');
            $avance->des_fisico = floatval($request->input('pro_fisico')) - floatval($request->input('real_fisico'));
            $avance->financiero_obs = $request->input('financiero_obs');
            $avance->pro_fina = $request->input('pro_fina');
            $avance->real_fina = $request->input('real_fina');
            $avance->des_fina = floatval($request->input('pro_fina')) - floatval($request->input('real_fina'));
            $avance->contractual_id = $request->input('contrato_id');
            $avance->save();
            //$operaciones->fill($request->input())->saveOrFail();
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
            
        }
        return redirect()->route('contratos.show', ['contrato' => $request->input('contrato_id')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($avance_id, $id)
    {
        DB::beginTransaction();
        try{
            $avance = Advance::find($avance_id);
            //Ejecuta el metodo delete al registro con el id que llego como parametro
            $avance->delete();
            // Hace una redirecion a la ruta que devuelve una vista index
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return redirect()->route('contratos.show', ['contrato' => $id]);
    }
}
