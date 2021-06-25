@extends('painel.template')

@section('conteudo')
<h2>Meu Perfil de Usuário</h2>
<form method="POST" action="{{route('userperfil.edit.action')}}">
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
        <label for="name" class="col-form-label">Nome do Usuário</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$usuario->name}}">
    </div>
    
     <p>
        <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapsetrocasenha" role="button" aria-expanded="false" aria-controls="collapsetrocasenha">
          Alterar Senha
        </a>        
     </p>

     <div class="form-group">
        <div class="collapse" id="collapsetrocasenha">
            <div class="card card-body">
                    <div class="form-group">
                        <label for="password" class="col-form-label">Informe sua Nova Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="col-form-label">Confirme sua Nova Senha</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
            </div>
        </div>
     </div>

    
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Salvar</button>                    
    </div>

</form>  

@endsection

