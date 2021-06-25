<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eTarefa - Autenticação</title>    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    

    <!-- Login CSS -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <!-- Icons fontawesome -->        
    <link href="{{ asset('icons/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/css/solid.css') }}" rel="stylesheet">

</head>

<body class="text-center">       
    @yield('conteudo')       

    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>