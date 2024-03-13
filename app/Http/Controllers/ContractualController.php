<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Contractual;
use App\Models\Time;
use App\Models\Advance;
use App\Models\Service;
use App\Models\Cobros;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Validation\Rule;

class ContractualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function status(Request $request){

        $contratos = Contractual::find($request->input('id'));
        $contratos->status = $request->input('status');
        $contratos->save();
        return redirect()->route('contratos.show', ['contrato' => $request->input('id')]);
    }
    public function index()
    {
        DB::beginTransaction();
        try{
            $proyectos = Contractual::where('coordinacion', '=', 'Proyectos')->count();
            $ambiental = Contractual::where('coordinacion', '=', 'Ambiental')->count();
            $supervision = Contractual::where('coordinacion', '=', 'Supervision')->count();
            $construccion = Contractual::where('coordinacion', '=', 'Construccion')->count();
            $contratos = Contractual::where('coordinacion', '=', 'Proyectos')->get();
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return view('contractuals.index')
        ->with(compact('proyectos'))
        ->with(compact('ambiental'))
        ->with(compact('supervision'))
        ->with(compact('construccion'))
        ->with(compact('contratos'));
    }

    public function index2()
    {
        DB::beginTransaction();
        try{
            $proyectos = Contractual::where('coordinacion', '=', 'Proyectos')->count();
            $ambiental = Contractual::where('coordinacion', '=', 'Ambiental')->count();
            $supervision = Contractual::where('coordinacion', '=', 'Supervision')->count();
            $construccion = Contractual::where('coordinacion', '=', 'Construccion')->count();
            $contratos = Contractual::where('coordinacion', '=', 'Ambiental')->get();
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return view('contractuals.indexamb')
        ->with(compact('proyectos'))
        ->with(compact('ambiental'))
        ->with(compact('supervision'))
        ->with(compact('construccion'))
        ->with(compact('contratos'));
    }

    public function index3()
    {
        DB::beginTransaction();
        try{
            $proyectos = Contractual::where('coordinacion', '=', 'Proyectos')->count();
            $ambiental = Contractual::where('coordinacion', '=', 'Ambiental')->count();
            $supervision = Contractual::where('coordinacion', '=', 'Supervision')->count();
            $construccion = Contractual::where('coordinacion', '=', 'Construccion')->count();
            $contratos = Contractual::where('coordinacion', '=', 'Supervision')->get();
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return view('contractuals.indexsup')
        ->with(compact('proyectos'))
        ->with(compact('ambiental'))
        ->with(compact('supervision'))
        ->with(compact('construccion'))
        ->with(compact('contratos'));
    }

    public function index4()
    {
        DB::beginTransaction();
        try{
            $proyectos = Contractual::where('coordinacion', '=', 'Proyectos')->count();
            $ambiental = Contractual::where('coordinacion', '=', 'Ambiental')->count();
            $supervision = Contractual::where('coordinacion', '=', 'Supervision')->count();
            $construccion = Contractual::where('coordinacion', '=', 'Construccion')->count();
            $contratos = Contractual::where('coordinacion', '=', 'Construccion')->get();
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return view('contractuals.indexcons')
        ->with(compact('proyectos'))
        ->with(compact('ambiental'))
        ->with(compact('supervision'))
        ->with(compact('construccion'))
        ->with(compact('contratos'));
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
        //Hace una validacion de los input en la vista 
        $credentials = $request->validate([
            'nom_proyecto' => ['required'],
            'coordinacion' => ['required'],
            'c_costo' => ['required'],
            'no_contrato' => ['required', 'unique:contractuals'],
            'imp_contrato' => ['required', 'numeric'],
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required|required_with:fecha_inicio|after_or_equal:fecha_inicio',
        ]);
        //Inserta en el modelo lo que le llego del request
        //$dependencias = Dependence::create($request->input());
        // Inicia la transacción
        DB::beginTransaction();

        try {

            $inicio = new DateTime($request->input('fecha_inicio'));
            $fin = new DateTime($request->input('fecha_fin'));
            $interval = $inicio->diff($fin);
            $dias_diferencia = $interval->days;
            $dias_diferencia += 1;

            $contrato = new Contractual;
            $contrato->nom_proyecto = $request->input('nom_proyecto');
            $contrato->no_contrato = $request->input('no_contrato');
            $contrato->empresa_cont = $request->input('empresa_cont');
            $contrato->consorcio = $request->input('consorcio');
            $contrato->c_costo = $request->input('c_costo');
            $contrato->fecha_inicio = $request->input('fecha_inicio');
            $contrato->fecha_fin = $request->input('fecha_fin');
            $contrato->coordinacion = $request->input('coordinacion');
            $contrato->total_dias = $dias_diferencia;
            $contrato->emp_contratante = $request->input('emp_contratante');
            $contrato->imp_contrato = floatval($request->input('imp_contrato'));
            $contrato->descripcion = $request->input('descripcion');
            $contrato->status = 1;
            $contrato->save();

            $registroId = $contrato->id;
            $cobro = Contractual::find($registroId);
            DB::commit();

            if ($cobro->coordinacion == 'Proyectos') {
                return redirect()->route('contratos.index');
            }elseif ($cobro->coordinacion == 'Ambiental') {
                return redirect()->route('contratos.index2');
            }elseif ($cobro->coordinacion == 'Supervision'){
                return redirect()->route('contratos.index3');
            }elseif ($cobro->coordinacion == 'Construccion'){
                return redirect()->route('contratos.index4');
            }
            
        } catch (\Exception $e) {
            // Si ocurre alguna excepción, realiza el rollback para deshacer todas las operaciones
            DB::rollback();

            // Puedes registrar el error o manejarlo de alguna manera específica
            //Log::error('Error en la transacción: ' . $e->getMessage());

            // Devuelve una respuesta de error, lanza una excepción, o maneja el error según tus necesidades
            return redirect()->route('contratos.index')->withErrors(['error' => 'Ocurrio un error al guardar el contrato']);
            //return response()->json(['error' => 'Error en la transacción'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($contrato)
    {
        $operaciones = Service::with(['customers', 'comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->where('contractual_id', $contrato)
        ->get();

        $convenios = Time::where('contractual_id', $contrato)->get();

        $avancesG = Advance::where('contractual_id', $contrato)
        ->where('tipo', 'General')
        ->get();

        $avancesS = Advance::where('contractual_id', $contrato)
        ->where('tipo', 'Ejecutora')
        ->get();

        $cobros = Cobros::where('contractual_id', $contrato)->get();
        
        $contrato = Contractual::find($contrato);
        //$operaciones = Service::where('contractual_id', $contrato)->get();
        $id = $contrato;
        return view('contractuals.index2')
        ->with(compact('convenios'))
        ->with(compact('operaciones'))
        ->with(compact('avancesG'))
        ->with(compact('avancesS'))
        ->with(compact('cobros'))
        ->with(compact('id'))
        ->with(compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($contractual)
    {
        DB::beginTransaction();
        try{
            //Hace un select al modelo de estado por medio de un id que llega como parametro
            $contrato = Contractual::find($contractual);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return view('layouts.errorpage');
        }
        //Retorna una vista con la consulta que hizo al modelo
        return view('contractuals.edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $credentials = $request->validate([
            'nom_proyecto' => ['required'],
            'coordinacion' => ['required'],
            'c_costo' => ['required'],
            'no_contrato' => ['required', Rule::unique('contractuals')->ignore($id)],
            'imp_contrato' => ['required', 'numeric'],
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required|required_with:fecha_inicio|after_or_equal:fecha_inicio',
        ]);

        DB::beginTransaction();

        try{
            $contratos = Contractual::find($id);
            $coordinacion = $contratos->coordinacion;
            //Hace un update al registro con lo datos que llegaron del request
            $contratos->fill($request->input())->saveOrFail();
            DB::commit();
            if ($coordinacion == 'Proyectos') {
                return redirect()->route('contratos.index');
            }elseif ($coordinacion == 'Ambiental') {
                return redirect()->route('contratos.index2');
            }elseif ($coordinacion == 'Supervision'){
                return redirect()->route('contratos.index3');
            }elseif ($coordinacion == 'Construccion'){
                return redirect()->route('contratos.index4');
            }
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($contractual)
    {
        DB::beginTransaction();
        try{
            $contractual = Contractual::find($contractual);
            //Ejecuta el metodo delete al registro con el id que llego como parametro
            $coordinacion = $contractual->coordinacion;
            $contractual->delete();
            // Hace una redirecion a la ruta que devuelve una vista index
            DB::commit();

            if ($coordinacion == 'Proyectos') {
                return redirect()->route('contratos.index');
            }elseif ($coordinacion == 'Ambiental') {
                return redirect()->route('contratos.index2');
            }elseif ($coordinacion == 'Supervision'){
                return redirect()->route('contratos.index3');
            }elseif ($coordinacion == 'Construccion'){
                return redirect()->route('contratos.index4');
            }
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
    }
}
