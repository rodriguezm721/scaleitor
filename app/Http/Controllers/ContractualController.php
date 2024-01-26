<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Contractual;
use App\Models\Time;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Validation\Rule;

class ContractualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        DB::beginTransaction();
        try{
            $contratos = Contractual::all();
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
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
        //Hace una validacion de los input en la vista 
        $credentials = $request->validate([
            'nom_proyecto' => ['required'],
            'no_contrato' => ['required', 'unique:contractuals'],
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

            $cobro = new Contractual;
            $cobro->nom_proyecto = $request->input('nom_proyecto');
            $cobro->no_contrato = $request->input('no_contrato');
            $cobro->empresa_cont = $request->input('empresa_cont');
            $cobro->consorcio = $request->input('consorcio');
            $cobro->fecha_inicio = $request->input('fecha_inicio');
            $cobro->fecha_fin = $request->input('fecha_fin');
            $cobro->coordinacion = $request->input('coordinacion');
            $cobro->total_dias = $dias_diferencia;
            $cobro->emp_contratante = $request->input('emp_contratante');
            $cobro->imp_contrato = $request->input('imp_contrato');
            $cobro->descripcion = $request->input('descripcion');
            $cobro->save();
            
            // Después de guardar, puedes acceder al ID así:
            $registroId = $cobro->id;
            $cobro = Contractual::find($registroId);

            // Verifica si el registro existe
            if (!$cobro) {
                abort(404, 'Registro no encontrado');
            }

            $datos = $request->input('datos');

            if ($request->filled('datos')) {
                foreach ($datos as $dato) {
                    // Crea objetos DateTime a partir de las fechas
                    $datetime_inicio = new DateTime($dato['campo1']);
                    $datetime_fin = new DateTime($dato['campo2']);
                    // Calcula la diferencia entre las fechas
                    $interval = $datetime_inicio->diff($datetime_fin);
        
                    // Obtén la diferencia en días
                    $dias_diferencia = $interval->days;
                    $dias_diferencia += 1;
                    // Crear una nueva instancia de Time
                    $time = new Time;
                    // Asignar valores desde el formulario
                    $time->fecha_inicio = $dato['campo1'];
                    $time->fecha_fin = $dato['campo2'];
                    $time->dias = $dias_diferencia;
                    // Asociar con Contractual y guardar en la base de datos
                    $cobro->times()->save($time);
                    //Dias acumulados
                    $cobro->total_dias = $cobro->total_dias + $dias_diferencia;
                    $cobro->save();
                }
            }


            // Si llegamos aquí sin excepciones, confirmamos la transacción
            DB::commit();
            return redirect()->route('contratos.index');

            // Puedes devolver una respuesta de éxito o hacer cualquier otra cosa que necesites
            //return response()->json(['mensaje' => 'Contrato guardado con éxito']);
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
    public function show(Contractual $contractual)
    {
        //
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
            'no_contrato' => ['required', Rule::unique('contractuals')->ignore($id)],
        ]);

        DB::beginTransaction();

        try{
            $contratos = Contractual::find($id);
            //Hace un update al registro con lo datos que llegaron del request
            $contratos->fill($request->input())->saveOrFail();
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return redirect()->route('contratos.index');
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
            $contractual->delete();
            // Hace una redirecion a la ruta que devuelve una vista index
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return redirect()->route('contratos.index');
    }
}
