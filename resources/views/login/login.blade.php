@extends('login.template')

@section('conteudo')
    
<form class="form-signin" method="POST" action="{{route('login.action')}}">
    @csrf
    <img class="mb-4" src="{{ asset('img/user_login.png') }}" alt="Logo" width="250" height="120">
    <h1 class="h3 mb-3 font-weight-normal">Acesse o Sistema</h1>  
    <hr/>

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

    <label for="email" class="sr-only">E-mail de Acesso</label>
    <input type="email" name="email" class="form-control" placeholder="E-mail" required autofocus>
  
    <label for="password" class="sr-only">Senha de Acesso</label>
    <input type="password" name="password" class="form-control" placeholder="Senha de Acesso" required>   
  
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
  
    <p>Não possui cadastro ?<br/>Cadastre-se <a href="{{route('login.register')}}">Aqui</a></p>
  
    <p class="mt-5 mb-3 text-black">Gerenciador de Tarefas</p>
    <p class="mt-2 mb-2 text-black">&copy; eTarefas - {{date('Y')}} </p>
  
  </form>

@endsection