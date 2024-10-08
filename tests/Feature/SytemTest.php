<?php

namespace Tests\Feature;

use App\Models\Tarefas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SytemTest extends TestCase
{
    /**
     * A basic feature test example.
     */
  use RefreshDatabase;

public function test_full_tarefa_crud(){

    // criar uma tarefa
    $tarefa = Tarefas:: create([
        'titulo'=> 'Nova Tarefa',
        'descricao'=> 'Tarefa de Teste',
        'concluida'=> false,
    ]);


    $this-> assertDatabaseHas('tarefas',[
        'titulo'=> 'Nova Tarefa',

    ]);
    //assertDatabaseHas: Este metódo verifica se há uma entrada específica no banco de dados.
    


//Read
$tarefaRecuperada = Tarefas::find($tarefa->id);
$this->assertEquals('Nova Tarefa', $tarefaRecuperada->titulo);
$this->assertEquals('Tarefa de Teste', $tarefaRecuperada->descricao);


// update
$tarefaRecuperada->update(['titulo'=>'Tarefa Atualizada']);
$this-> assertEquals('Tarefa Atualizada', $tarefaRecuperada->titulo);

// delete
$tarefaRecuperada->delete();
$this-> assertDatabaseMissing('tarefas',['id'=>$tarefaRecuperada->id]);
//assertDatabaseMissing: este método verifica se não mais um determinado registro no banco de dados.
}



}
