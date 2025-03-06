<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarefas;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\Prioridade;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    // O inicio da aplicação---------------------------------------------------------------------------------------------
    public function index()
    {
        //Busca todas as tarefas
        $tarefas = Tarefas::all();

        //Retorna a view index.blade.php com as tarefas
        return view('tarefas',compact('tarefas'));
    }
     //final da aplicação---------------------------------------------------------------------------------------------------



     // Função para criar uma nova tarefa---------------------------------------------------------------------------------
    public function create()
    {
        return view('NovoTrabalho');    
    }
     
    public function store(Request $request)
    {
        //Validação dos campos
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'status' => 'required',
            'data_limite' => 'required',     
            'categoria_nome' => 'required',
            'prioridade_nome' => 'required',
        ]);


        $categoria= Categoria::create(['categoria' => $request->categoria_nome]);

        $prioridade= Prioridade::create(['prioridade' => $request->prioridade_nome]);

        
        //Cria uma nova tarefa associada ao usuário logado
        $tarefa = new Tarefas($request->all());
        $tarefa->user_id = Auth::id();
        $tarefa->categoria_id = $categoria->id;
        $tarefa->prioridade_id = $prioridade->id;
        $tarefa->save();

        //Redireciona para a rota /tarefas
        return redirect('padaria')->with('success', ['msg' =>'Tarefa criada com sucesso!']);
    }
     // Fim criar tarefa-----------------------------------------------------------------------------------------------------


     //pesquisando tarefa-----------------------------------------------------------------------------------------------------
    public function show(Request $request)
    {
        $query = Tarefas::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('titulo', 'LIKE', "%{$search}%")
                  ->orWhere('descricao', 'LIKE', "%{$search}%")
                  ->orWhere('status', 'LIKE', "%{$search}%")
                  ->orWhereHas('categoria', function ($q) use ($search) {
                      $q->where('categoria', 'LIKE', "%{$search}%");
                  })
                  ->orWhereHas('prioridade', function ($q) use ($search) {
                      $q->where('prioridade', 'LIKE', "%{$search}%");
                  });
        }
    
        $tarefas = $query->get();
    
        return view('tarefas', compact('tarefas'));
    }
     //fim pesquisa-------------------------------------------------------------------------------------------------------------------


      // Função para atualizar tarefa-----------------------------------------------------------------------------------------
    public function edit($id)
    {
        //Busca a tarefa pelo id
        $tarefa = Tarefas::find($id);

        //Retorna a view edit.blade.php com a tarefa
        return view('Atualizando',compact('tarefa'));
        
    }
   
    public function update(Request $request, $id)
    {
        //Validação dos campos
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'status' => 'required',
            'data_limite' => 'required',     
            'categoria_nome' => 'required',
            'prioridade_nome' => 'required',
        ]);

        //Busca a tarefa pelo id
        $tarefa = Tarefas::find($id);

        $categoria= Categoria::create(['categoria' => $request->categoria_nome]);

        $prioridade= Prioridade::create(['prioridade' => $request->prioridade_nome]);

        //Atualiza a tarefa
        $tarefa->update($request->all());
        $tarefa->categoria_id = $categoria->id;
        $tarefa->prioridade_id = $prioridade->id;
        $tarefa->save();

        //Redireciona para a rota /tarefas
        return redirect('padaria')->with('success', ['msg' =>'Tarefa atualizada com sucesso!']);
        
    }
     // Fim atualizar tarefa-----------------------------------------------------------------------------------------------------



     //destruir tarefa-----------------------------------------------------------------------------------------------------
    public function destroy($id)
    {
        //Busca a tarefa pelo id
        $tarefa = Tarefas::find($id);

        //Deleta a tarefa
        $tarefa->delete();

        //Redireciona para a rota /tarefas
        return redirect('padaria')->with('success', ['msg' =>'Tarefa deletada com sucesso!']);
    }

    // Fim destruir tarefa-----------------------------------------------------------------------------------------------------
    
    
}
