<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
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
        return view('comments.insert', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $comentario = new Comment;
        $comentario->comment = $request->input('comment');
        $comentario->tipo = $request->input('tipo');
        $comentario->service_id = $id;
        $comentario->save();
        
        return redirect()->route('contratos.show', ['contrato' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comentarios = Comment::where('service_id', $id)->get();
        return view('comments.index', compact('comentarios', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($comment_id, $id)
    {
        DB::beginTransaction();
        try{
            $customer = Comment::find($comment_id);
            //Ejecuta el metodo delete al registro con el id que llego como parametro
            $customer->delete();
            // Hace una redirecion a la ruta que devuelve una vista index
            DB::commit();
        } catch(\Exception $e){
            DB::rollback();
            return view('layouts.errorpage');
        }
        return redirect()->route('contratos.show', ['contrato' => $id]);
    }
}
