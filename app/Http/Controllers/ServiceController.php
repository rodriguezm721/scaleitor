<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Customer;
use App\Models\Contractual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operaciones = Service::all();
        return view('servicios.index', compact('operaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contratos = Contractual::all();
        return view('servicios.insert', compact('contratos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service;
        $service->nom_corto = $request->input('nom_corto');
        $service->alcance = $request->input('alcance');
        $service->lider = $request->input('lider');
        $service->contractual_id = $request->input('contrato_id');
        $service->save();
        
        // Después de guardar, puedes acceder al ID así:
        $registroId = $service->id;
        $s_id = Service::find($registroId);
        // Verifica si el registro existe
        if (!$s_id) {
            abort(404, 'Registro no encontrado');
        }

        $datos = $request->input('datos');
        if ($request->filled('datos')) {
            foreach ($datos as $dato) {
                // Crear una nueva instancia de Customer
                $customer = new Customer;
                // Asignar valores desde el formulario
                $customer->nom_cliente = $dato['campo1'];
                $customer->cargo = $dato['campo2'];
                $customer->empresa = $dato['campo3'];
                $customer->email = $dato['campo4'];
                $customer->num_tel = $dato['campo5'];
                // Asociar con Contractual y guardar en la base de datos
                $s_id->customers()->save($customer);
                }
            }
        return redirect()->route('servicios.show', ['servicio' => $request->input('contrato_id')]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $operaciones = Service::where('contractual_id', $id)->get();
        return view('servicios.index', compact('operaciones', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($service)
    {
        DB::beginTransaction();
        try{
            //Hace un select al modelo de estado por medio de un id que llega como parametro
            $operacion = Service::find($service);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return view('layouts.errorpage');
        }
        //Retorna una vista con la consulta que hizo al modelo
        return view('servicios.edit', compact('operacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try{
            $operaciones = Service::find($id);
            //Hace un update al registro con lo datos que llegaron del request
            $operaciones->nom_corto = $request->input('nom_corto');
            $operaciones->alcance = $request->input('alcance');
            $operaciones->lider = $request->input('lider');
            $operaciones->contractual_id = $request->input('contractual_id');
            $operaciones->save();
            //$operaciones->fill($request->input())->saveOrFail();
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
            
        }
        return redirect()->route('servicios.show', ['servicio' => $request->input('contractual_id')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($service_id, $id)
    {
        DB::beginTransaction();
        try{
            $service = Service::find($service_id);
            //Ejecuta el metodo delete al registro con el id que llego como parametro
            $service->delete();
            // Hace una redirecion a la ruta que devuelve una vista index
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return redirect()->route('servicios.show', ['servicio' => $id]);
    }
}
