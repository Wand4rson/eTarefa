<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eTarefa - Dashboard</title>    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Icons fontawesome -->        
    <link href="{{ asset('icons/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/css/solid.css') }}" rel="stylesheet">

</head>

<body>       

    <header>
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top bg-primary">
            <a class="navbar-brand" href="{{route('dashboard')}}">Gerenciador de Tarefas</a>            
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item">

                        <a class="nav-link text-white" href="{{route('tarefa.add.form')}}">
                            <i class="fas fa-plus-square"></i> Nova Tarefa
                        </a>

                    </li>

                    <li class="nav-item">
                        <hr/>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('userperfil.edit')}}"><i class="fas fa-user-edit"></i> Meus Dados</a>
                    </li>   

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('login.logout')}}"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>  

                </ul>            
                
            </div>

        </nav>
    </header>

    <section class="container-fluid">
        <div class="mt-5">                        
            <br/>
            @yield('conteudo')     
        </div>
    </section>  

    <!--
    <footer class="footer mt-auto py-3" style="background-color :#f7f7f7;">
        <div class="container-fluid text-center">            
            <p class="text-muted">Gerenciador de Tarefas</p>            
        </div>
    </footer>
    -->

    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>