<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Hotéis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        input::placeholder {
            color: #ffffff;
            opacity: 1;
        }

        /* Definindo cores roxas personalizadas */
        .bg-purple {
            background-color: #6f42c1 !important;
        }

        .text-purple {
            color: #6f42c1 !important;
        }

        .border-purple {
            border-color: #6f42c1 !important;
        }

        /* Botões verdes */
        .btn-green {
            background-color: #28a745 !important;
            border-color: #28a745 !important;
        }

        .btn-green:hover {
            background-color: #218838 !important;
            border-color: #218838 !important;
        }

        /* Mantendo os textos brancos */
        .text-white {
            color: #ffffff !important;
        }

        /* Estilo para a navbar reduzida */
        .navbar {
            background-color: #6f42c1;
            padding: 0.5rem 1rem;
        }

        .navbar-brand {
            font-size: 1.5rem;
            color: #ffffff;
            font-weight: 300; /* Tamanho discreto da fonte */
        }

        .navbar-brand:hover {
            color: #ffffff;
        }

        .navbar-nav {
            display: none; /* Ocultar outros itens do menu */
        }

        .card {
            background-color: #343a40;
            color: #ffffff;
            border-color: #6f42c1;
        }

        .card-title {
            color: #ffffff;
        }

        .card-text {
            color: #ccc;
        }

        .btn-primary {
            background-color: #6f42c1 !important;
            border-color: #6f42c1 !important;
        }

        .btn-primary:hover {
            background-color: #5a2d91 !important;
            border-color: #5a2d91 !important;
        }
    </style>
</head>
<body class="bg-dark text-white">

    <!-- Navbar reduzida -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">InfinityInn</a>
    </nav>

    <div class="container my-5">
        <h2 class="text-center">Resultados da Busca</h2>

        @if ($hoteis->isEmpty())
            <p class="text-center">Nenhum hotel encontrado com os critérios fornecidos.</p>
        @else
            <div class="row">
                @foreach ($hoteis as $hotel)
                    <div class="col-12 mb-4">
                        <div class="card flex-row">
                            @if ($hotel->images)
                                <img src="data:image/png;base64,{{ $hotel->images[0] }}" class="card-img-left" style="width: 200px;" alt="Imagem do Hotel">
                            @else
                                <img src="" class="card-img-left" style="width: 200px;" alt="Imagem padrão">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $hotel->hotel }}</h5>
                                <p class="card-text">{{ $hotel->descricao }}</p>
                                <p class="card-text"><strong>R$ {{ number_format($hotel->valor_diaria, 2, ',', '.') }}</strong> por noite</p>
                                <a href="{{ route('hoteis_pre_reserva', $hotel->id) }}" class="btn btn-green">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
