@extends('painel.template')

@section('conteudo')
<!-- DashBoarda Tarefas -->

<p class="text-muted"><small>Olá, {{Auth::user()->name}}</small></p>

  @if (session('msgErro'))
        <div class="alert alert-danger">
            <ul>
              <li>{{ @session('msgErro') }}</li>                
            </ul>
        </div>
  @endif

  @if (session('msgSuccess'))
        <div class="alert alert-success">
            <ul>
              <li>{{ @session('msgSuccess') }}</li>                
            </ul>
        </div>
  @endif


<table class="table table-hover table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tarefa</th>
        <th scope="col">Ações</th>        
      </tr>
    </thead>

    <tbody>
  
        @forelse ($tarefas as $tarefa) 

           

            <tr @if($tarefa->concluido ===1) class="table-warning" @endif)>                
                <th scope="row">{{$tarefa->id}}</th>
                
                <td>
                  {{$tarefa->descricao}} 

                  @if($tarefa->concluido ===1)
                      <br/><small class="text-muted"><i class="fas fa-check-double"></i> em {{date('d/m/Y H:i:s', strtotime($tarefa->dhconcluido))}}</small>
                   @endif                  
                </td>

                <td>

                  @if($tarefa->concluido === 0)
                    <a href="{{route('tarefa.edit.form', $tarefa->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Editar Tarefa"><i class="fas fa-pen"></i></a> 
                    <a href="{{route('tarefa.edit.concluir', $tarefa->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Concluir Tarefa"><i class="fas fa-check-double"></i></a>
                  @endif

                  <a href="{{route('tarefa.del', $tarefa->id)}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Excluir Tarefa" onclick="return confirm('Deseja remover a Tarefa ? #{{$tarefa->id}}');"><i class="fas fa-trash-alt"></i></a>
                </td>            
            </tr>

        @empty            
            <tr>                
                <td colspan="3"><p class="text-center text-muted">Nenhuma tarefa encontrada.</p></td>            
            </tr>
        @endforelse

    </tbody>

  </table>

@endsection