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

    <div class="container my-4">
        <!-- Nome e Localização -->
        <div class="mb-4">
            <h1 class="text-white">{{ $hoteis->hotel }}</h1>
            <p class="text-muted text-white">
                <strong>Localização:</strong> {{ $hoteis->cidade->nome }}, {{ $hoteis->estado->nome }}
            </p>
        </div>

        <!-- Galeria de Imagens -->
        <div class="mb-4">
            <h3 class="mb-3 text-white">Galeria</h3>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @if (!empty($hoteis->images) && is_array($hoteis->images))
                    @foreach ($hoteis->images as $value)
                        <div class="col">
                            <div class="card">
                                <img
                                    src="data:image/png;base64,{{ $value }}"
                                    class="card-img-top img-fluid"
                                    alt="Hotel Image"
                                    style="width: 100%; height: 200px; object-fit: cover;"
                                />
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">Nenhuma imagem disponível para este hotel.</p>
                @endif
            </div>
        </div>

        <!-- Informações do Hotel -->
        <div class="mb-4">
            <h3 class="mb-3 text-white">Detalhes do Hotel</h3>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Estado:</strong>
                    <span>{{ $hoteis->estado->nome }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Cidade:</strong>
                    <span>{{ $hoteis->cidade->nome }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Número de quartos:</strong>
                    <span>{{ $hoteis->quartos }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Valor da diária:</strong>
                    <span>R$ {{ number_format($hoteis->valor_diaria, 2, ',', '.') }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Descrição:</strong>
                    <span>{{ $hoteis->descricao }}</span>
                </li>
            </ul>
        </div>

        <!-- Botão de Ação -->
        <div class="text-center mt-4">
            <a href="{{ url('/reservar/'.$hoteis->id) }}" class="btn btn-green btn-lg text-white">Reservar Agora</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
