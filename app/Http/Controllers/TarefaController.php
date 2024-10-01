<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Models\Tarefas;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Tarefas::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TarefaRequest $request)
    {
        $tarefa = Tarefas::create($request->all());
        return response()->json($tarefa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Tarefas::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tarefa=Tarefas::findOrFail($id);
        $tarefa->update($request->all());
        return response()->json($tarefa,200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarefa=Tarefas::findOrFail($id)->delete();
        return response()->json(null,204);
        
    }
}
