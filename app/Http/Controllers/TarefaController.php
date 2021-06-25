<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TarefaController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');

    }

    //Redireciona para Dashboard caso Logado
    public function index()
    {
        $tarefas = Tarefa::where('user_id', Auth::user()->id)->get();

        return view('painel.dashboard',['tarefas'=>$tarefas]);

    }


    //Abre Form Nova Tarefa
    public function tarefaForm()
    {
        return view('painel.tarefa.add');

    }

    //Abre form Editar com Dados preenchidos
    public function tarefaEditForm($id)
    {
        $tarefa = Tarefa::where('id', $id)->where('user_id', Auth::user()->id)->first();
        
        if ($tarefa)
        {
          //echo "tem a tarefa";

            return view('painel.tarefa.edit', ['tarefa'=>$tarefa]);           
        }
        else
        {
            return redirect()->route('dashboard')->with(['msgErro' => 'Registro não existe, ou não está vinculado ao seu usuário.']);
        }
    }

    //Pega dados do form em edição e envia para o database
    public function tarefaEditFormAction($id, Request $request)
    {       
        $tarefa = Tarefa::where('id', $id)->where('user_id', Auth::user()->id)->first();
        
        if ($tarefa)
        {

            $tarefa->descricao = $request->input('descricao');
            $tarefa->user_id = Auth::user()->id;
            
    
            if($request->has('concluido'))
            {
                //Checado            
                $tarefa->concluido = $request->input('concluido');
                $tarefa->dhconcluido = now();
            }
            else
            {        
                //Não checado
                $tarefa->concluido =0;
            }
    
            $tarefa->save();
         
          //echo "tem a tarefa";

          return redirect()->route('dashboard');       
        }
        else
        {
            return redirect()->route('dashboard')->with(['msgErro' => 'Registro não existe, ou não está vinculado ao seu usuário.']);
        }
    }


    //Marca Tarefa como concluido
    public function tarefaEditConcluir($id)
    {
        $tarefa = Tarefa::where('id', $id)->where('user_id', Auth::user()->id)->first();
        
        if ($tarefa)
        {           
            $tarefa->concluido = 1;
            $tarefa->dhconcluido = now();           
            $tarefa->save();
         
          return redirect()->route('dashboard');       
        }
        else
        {
            return redirect()->route('dashboard')->with(['msgErro' => 'Registro não existe, ou não está vinculado ao seu usuário.']);
        }

    }


    //Pega dados do FormTarefa e Salva ADD
    public function tarefaFormAction(Request $request)
    {

        $credentials = $request->validate([
            'descricao' => ['required','min:4']            
        ]);


        $tarefa = new Tarefa();
        $tarefa->descricao = $request->input('descricao');
        $tarefa->user_id = Auth::user()->id;
        

        if($request->has('concluido'))
        {
            //Checado            
            $tarefa->concluido = $request->input('concluido');
            $tarefa->dhconcluido = now();
        }
        else
        {        
            //Não checado
            $tarefa->concluido =0;
        }

        $tarefa->save();

        //$tarefa->concluido = $request->input('concluido', 0); 
        //Tarefa Marcada como concluido, seta Data.
        //if ($tarefa->concluido === '1'){ $tarefa->dhconcluido = now();}

        
        

        return redirect()->route('dashboard');

    }

    public function tarefaDelete($id)
    {
        $tarefa = Tarefa::where('id', $id)->where('user_id', Auth::user()->id)->first();
        

        if ($tarefa)
        {
          //echo "tem a tarefa";
           $tarefa->delete();
           return redirect()->route('dashboard')->with(['msgSuccess' => 'Registro removido com sucesso.']);
        }
        else
        {
            return redirect()->route('dashboard')->with(['msgErro' => 'Registro não existe, ou não está vinculado ao seu usuário.']);
        }


    }


    //Carrega form edição de usuário preenchido
    public function userperfilFormEdit()
    {
        $usuario = User::where('id', Auth::user()->id)->first();
        
        if ($usuario)
        {
          //echo "tem o usuario e é o seu";

            return view('painel.userperfil', ['usuario'=>$usuario]);           
        }
        else
        {
            return redirect()->route('dashboard')->with(['msgErro' => 'Registro de usuário não existe, ou não está vinculado ao seu usuário.']);
        }

    }

    //Pega dados do formulario usuario edit e salva no database
    public function userperfilFormEditAction(Request $request)
    {
        
        if ($request->input('password')) 
        {
            //Preencheu Senha valida todos os campos
            $validacao = $request->validate([
                'name' => ['required'],                        
                'password' => ['required','min:4'],
                'password_confirmation' => ['required','min:4','same:password']        
            ]);
        }
        else
        {
            //Não preencheu Senha, valida somente Nome
            $validacao = $request->validate([
                'name' => ['required']                
            ]);
        }

        $usuario = User::where('id', Auth::user()->id)->first();
        
        if ($usuario)
        {
            $usuario->name = $request->name;            
            if ($request->input('password')) { $usuario->password = Hash::make($request->password);}
            $usuario->save();                        
            return redirect()->route('dashboard')->with(['msgSuccess' => 'Dados de usuário modificados com sucesso.']);
        }
        else
        {
            return redirect()->route('dashboard')->with(['msgErro' => 'Registro de usuário não existe, ou não está vinculado ao seu usuário.']);
        }        
    }
}
