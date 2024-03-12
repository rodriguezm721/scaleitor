<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contractual;
use App\Models\Cobros;
use App\Models\Time;
use App\Models\Advance;
use App\Models\Service;

class QueriesController extends Controller
{
    public function dashboard()
    {
        $proyectos = Contractual::where('coordinacion', '=', 'Proyectos')->get();
        $ambiental = Contractual::where('coordinacion', '=', 'Ambiental')->get();
        $supervision = Contractual::where('coordinacion', '=', 'Supervision')->get();
        $construccion = Contractual::where('coordinacion', '=', 'Construccion')->get();
        return view('layouts/dashboard')
        ->with(compact('proyectos'))
        ->with(compact('ambiental'))
        ->with(compact('supervision'))
        ->with(compact('construccion'));
    }

    public function signin(){
        return view('auth.signin');
    }

    public function register(){
        return view('auth.register');
    }
    
    public function queries(Request $request)
    {
        
        // Recibe los valores de los checkboxes
        $no_contrato = $request->input('no_contrato');
        $contrato = Contractual::where('no_contrato', $no_contrato)->pluck('id')->first();
        if ($contrato !== null) {
            $resultados1 = [];
            $resultados2 = [];
            $resultados3 = [];

            // Verifica si el checkbox con nombre 'check3' está presente en la solicitud
            if ($request->has('check1')) {
                $resultados1 = Contractual::where('no_contrato', '=', $no_contrato)->get();
            }
            if ($request->has('check2')) {
                $resultados2 = Time::where('contractual_id', '=', $contrato)->get(); 
            }
            if ($request->has('check3')) {
                $resultados3 = Contractual::where('no_contrato', '=', $no_contrato)->get();
            }
            
            return view('layouts.querie')
            ->with(compact('resultados1'))
            ->with(compact('resultados2'))
            ->with(compact('resultados3'));
        } else {
            return redirect()->route('layouts.dashboard')->withErrors(['error' => 'El contrato no existe']);
        }
    }
    
    public function show(Request $request)
    {
        $contrato = $request->input('contrato');
        return redirect()->route('contratos.show', ['contrato' => $contrato]);
        /*$operaciones = Service::with(['customers', 'comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->where('contractual_id', $contrato)
        ->get();

        $convenios = Time::where('contractual_id', $contrato)->get();

        $avancesG = Advance::where('contractual_id', $contrato)
        ->where('tipo', 'General')
        ->get();

        $avancesS = Advance::where('contractual_id', $contrato)
        ->where('tipo', 'Supervision')
        ->get();

        $avancesC = Advance::where('contractual_id', $contrato)
        ->where('tipo', 'Constructora')
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
        ->with(compact('avancesC'))
        ->with(compact('cobros'))
        ->with(compact('id'))
        ->with(compact('contrato'));*/
    }
}
