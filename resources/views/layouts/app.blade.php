<!DOCTYPE html>
<html>
<head>
    <title>Estacionamento</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
</head>
<body>
    
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{ route('parking-spots.index') }}">Vagas</a></li>
                <li><a href="{{ route('parking-usage.entry') }}">Entrada de Veículo</a></li>
                <li><a href="{{ route('reports.financial') }}">Relatório Financeiro</a></li>
                <li><a href="{{ route('plans.index') }}">Planos</a></li>
                <li><a href="{{ route('signout') }}">Sair</a></li>
            </ul>
        </nav>
        <hr>
        @yield('content')
    </div>
</body>
</html>
