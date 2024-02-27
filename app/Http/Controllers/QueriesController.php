<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contractual;
use App\Models\Cobros;
use App\Models\Time;

class QueriesController extends Controller
{
    public function dashboard()
    {
        $proyectos = Contractual::where('coordinacion', '=', 'Proyectos')->count();
        $ambiental = Contractual::where('coordinacion', '=', 'Ambiental')->count();
        $supervision = Contractual::where('coordinacion', '=', 'Supervision')->count();
        $construccion = Contractual::where('coordinacion', '=', 'Construccion')->count();
        return view('layouts/dashboard')
        ->with(compact('proyectos'))
        ->with(compact('ambiental'))
        ->with(compact('supervision'))
        ->with(compact('construccion'));
    }

    public function signin(){
        return view('auth.signin');
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
}
