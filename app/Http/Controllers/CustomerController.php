<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
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
        return view('customers.insert');
    }

    public function insert($id)
    {
        return view('customers.insert', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $customer = new Customer;
        $customer->nom_cliente = $request->input('nom_cliente');
        $customer->cargo = $request->input('cargo');
        $customer->empresa = $request->input('empresa');
        $customer->email = $request->input('email');
        $customer->num_tel = $request->input('num_tel');
        $customer->service_id = $id;
        $customer->save();

        return redirect()->route('clientes.show', ['cliente' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clientes = Customer::where('service_id', $id)->get();
        return view('customers.index', compact('clientes', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customer_id, $id)
    {
        DB::beginTransaction();
        try{
            $customer = Customer::find($customer_id);
            //Ejecuta el metodo delete al registro con el id que llego como parametro
            $customer->delete();
            // Hace una redirecion a la ruta que devuelve una vista index
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return redirect()->route('clientes.show', ['cliente' => $id]);
    }
}
