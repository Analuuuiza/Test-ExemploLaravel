<?php

namespace Tests\Unit;

use App\Models\Tarefas;
use Tests\TestCase;

class TarefaTest extends TestCase
{
    public function test_criar_tarefa_de_teste()
    {
        $tarefa = Tarefas::create([
            'titulo' => 'Tarefa de Teste',
            'descricao' => 'Criando uma Tarefa de Teste',
            'concluida' => false
        ]);
$this->assertEquals('Tarefa de Teste', $tarefa->titulo);
$this->assertEquals('Criando uma Tarefa de Teste', $tarefa->descricao);
$this->assertFalse($tarefa->concluida);
    }
}