<!DOCTYPE html>
<html>
<head>
    <title>VIDEPARK</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">VIDE<span style="color:#c41026;">PARK  </span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                    <a class="nav-link  "href="{{ route('parking-spots.index') }}">Vagas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link"href="{{ route('parking-usage.entry') }}">Entrada de Veículo</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link"href="{{ route('reports.financial') }}">Relatório Financeiro</a>
                    </li>
                    <li class="nav-item">

                    <a class="nav-link"href="{{ route('plans.index') }}">Planos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


</body>

</html>