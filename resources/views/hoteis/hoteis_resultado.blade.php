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
                                <img src="https://via.placeholder.com/150" class="card-img-left" style="width: 200px;" alt="Imagem padrão">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $hotel->hotel }}</h5>
                                <p class="card-text">{{ $hotel->descricao }}</p>
                                <p class="card-text"><strong>R$ {{ number_format($hotel->valor_diaria, 2, ',', '.') }}</strong> por noite</p>
                                <a href="{{ route('hoteis.show', $hotel->id) }}" class="btn btn-primary">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
