<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\Contractual;
use Illuminate\Http\Request;
use DateTime;

class TimeController extends Controller
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
    public function create($id)
    {
        //return view('times.insert', compact('$id'));
    }

    public function insert($id)
    {
        return view('times.insert', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $credentials = $request->validate([
            'monto' => ['nullable', 'numeric'],
            'fecha_inicio' => 'nullable|required_without:monto',
            'fecha_fin' => 'nullable|required_with:fecha_inicio|date|after_or_equal:fecha_inicio',
            // Agrega más campos y reglas según sea necesario
        ]);

        $datetime_inicio = new DateTime($request->input('fecha_inicio'));
        $datetime_fin = new DateTime($request->input('fecha_fin'));
        // Calcula la diferencia entre las fechas
        $interval = $datetime_inicio->diff($datetime_fin);
    
        // Obtén la diferencia en días
        $dias_diferencia = $interval->days;
        if($dias_diferencia == 0){
            // Crear una nueva instancia de Time
            $time = new Time;
            // Asignar valores desde el formulario
            $time->fecha_inicio = $request->input('fecha_inicio');
            $time->fecha_fin = $request->input('fecha_fin');
            $time->monto = floatval($request->input('monto'));
            $time->comentario = $request->input('comentario');
            $time->dias = $dias_diferencia;
            $time->contractual_id = $request->input('id');
            $time->save();

            return redirect()->route('contratos.show', ['contrato' => $request->input('id')]);
        }else{
            $dias_diferencia += 1;
            // Crear una nueva instancia de Time
            $time = new Time;
            // Asignar valores desde el formulario
            $time->fecha_inicio = $request->input('fecha_inicio');
            $time->fecha_fin = $request->input('fecha_fin');
            $time->monto = floatval($request->input('monto'));
            $time->comentario = $request->input('comentario');
            $time->dias = $dias_diferencia;
            $time->contractual_id = $request->input('id');
            $time->save();

            return redirect()->route('contratos.show', ['contrato' => $request->input('id')]);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $convenios = Time::where('contractual_id', $id)->get();
        return view('times.index', compact('convenios', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($time)
    {
        $convenio = Time::find($time);
        return view('times.edit', compact('convenio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $time)
    {
        $credentials = $request->validate([
            'monto' => ['nullable', 'numeric'],
            'fecha_inicio' => 'nullable|required_without:monto',
            'fecha_fin' => 'nullable|required_with:fecha_inicio|date|after_or_equal:fecha_inicio',
            // Agrega más campos y reglas según sea necesario
        ]);

        $datetime_inicio = new DateTime($request->input('fecha_inicio'));
        $datetime_fin = new DateTime($request->input('fecha_fin'));
        // Calcula la diferencia entre las fechas
        $interval = $datetime_inicio->diff($datetime_fin);
    
        // Obtén la diferencia en días
        $dias_diferencia = $interval->days;
        if($dias_diferencia == 0){
            // Crear una nueva instancia de Time
            $time = Time::find($time);
            // Asignar valores desde el formulario
            $time->fecha_inicio = $request->input('fecha_inicio');
            $time->fecha_fin = $request->input('fecha_fin');
            $time->monto = floatval($request->input('monto'));
            $time->comentario = $request->input('comentario');
            $time->dias = $dias_diferencia;
            $time->contractual_id = $request->input('id');
            $time->save();

            return redirect()->route('contratos.show', ['contrato' => $request->input('id')]);
        }else{
            $dias_diferencia += 1;
            // Crear una nueva instancia de Time
            $time = Time::find($time);
            // Asignar valores desde el formulario
            $time->fecha_inicio = $request->input('fecha_inicio');
            $time->fecha_fin = $request->input('fecha_fin');
            $time->monto = floatval($request->input('monto'));
            $time->comentario = $request->input('comentario');
            $time->dias = $dias_diferencia;
            $time->contractual_id = $request->input('id');
            $time->save();

            return redirect()->route('contratos.show', ['contrato' => $request->input('id')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $contractual_id)
    {
        //dump($id, $contractual_id, $dias);
        
        $time = Time::find($id);
        //Ejecuta el metodo delete al registro con el id que llego como parametro
        $time->delete();
        // Hace una redirecion a la ruta que devuelve una vista index
        return redirect()->route('contratos.show', ['contrato' => $contractual_id]);
    }
}
