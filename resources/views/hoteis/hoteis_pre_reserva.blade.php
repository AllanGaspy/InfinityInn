<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Hotéis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>InfinityInn</h1>
        <p>Encontre e reserve hotéis ao redor do mundo com facilidade</p>
    </header>

    <div class="container my-4">
        <!-- Nome e Localização -->
        <div class="mb-4">
            <h1 class="text-primary">{{ $hoteis->hotel }}</h1>
            <p class="text-muted">
                <strong>Localização:</strong> {{ $hoteis->cidade->nome }}, {{ $hoteis->estado->nome }}
            </p>
        </div>

        <!-- Galeria de Imagens -->
        <div class="mb-4">
            <h3 class="mb-3">Galeria</h3>
            <div class="row">
                @foreach ($hoteis->images as $value)
                    <div class="col-md-4 mb-3">
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
            </div>
        </div>

        <!-- Informações do Hotel -->
        <div class="mb-4">
            <h3 class="mb-3">Detalhes do Hotel</h3>
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
            <a href="{{ url('/reservar/'.$hoteis->id) }}" class="btn btn-primary btn-lg">Reservar Agora</a>
        </div>
    </div>
</body>
</html>
