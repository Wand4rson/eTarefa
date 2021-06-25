@extends('painel.template')

@section('conteudo')
<h2>Nova Tarefa</h2>
<form method="POST" action="{{route('tarefa.add.action')}}">
    @csrf
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('msgErro'))
        <div class="alert alert-danger">
            <ul>
            <li>{{ @session('msgErro') }}</li>                
            </ul>
        </div>
    @endif

    
    <div class="form-group">
        <label for="descricao" class="col-form-label">Descrição da Tarefa</label>
        <input type="text" class="form-control" id="descricao" name="descricao">
    </div>
    
    <div class="form-group form-check">
        <input class="form-check-input" type="checkbox" value="1" id="concluido" name="concluido">
        <label class="form-check-label" for="concluido">
          Tarefa Concluída ?
        </label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Salvar</button>                    
    </div>

</form>  

@endsection

