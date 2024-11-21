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
        <!-- Seção de Busca -->
        <form action="{{ route('buscar') }}" method="GET" class="mb-4">
            <div class="row">
                <!-- Estado -->
                <div class="col-md-2 mb-3">
                    <select id="estado" name="estado_id" class="form-control">
                        <option value="">Selecione o Estado</option>
                        @foreach ($estados as $value)
                            <option value="{{ $value->id }}">{{ $value->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Cidade -->
                <div class="col-md-2 mb-3">
                    <select name="cidade_id" id="cidade" class="form-control">
                        <option value="">Selecione a Cidade</option>
                    </select>
                </div>

                <!-- Data de Entrada -->
                <div class="col-md-2 mb-3">
                    <input type="date" name="check_in" class="form-control" placeholder="Check-in" required>
                </div>

                <!-- Data de Saída -->
                <div class="col-md-2 mb-3">
                    <input type="date" name="check_out" class="form-control" placeholder="Check-out" required>
                </div>

                <!-- Quantidade de Pessoas -->
                <div class="col-md-2 mb-3">
                    <input type="number" name="guests" class="form-control" placeholder="Nº de Hóspedes" min="1" required>
                </div>

                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
            </div>
        </form>

        <!-- Seção de Hotéis Destaque -->
        <h2 class="mb-4 text-center">Hotéis em Destaque</h2>
        <div class="row">
            @foreach ($hoteis as $hoteis)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($hoteis->images)
                            <img src="data:image/png;base64,{{ $hoteis->images[0] }}" class="card-img-top" alt="Imagem do Hotel">
                        @else
                            <p>Sem imagem</p>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $hoteis->hotel }}</h5>
                            <p class="card-text">{{ Str::limit($hoteis->descricao, 100) }}</p>
                            <p class="card-text"><strong>R$ {{ number_format($hoteis->valor_diaria, 2, ',', '.') }}</strong> por noite</p>
                            <a href="{{ route('hotel.show', $hoteis->id) }}" class="btn btn-primary">Ver Mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Sistema de Reserva de Hotéis. Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script de AJAX -->
    <script>
        // Evento de mudança no select de Estado
        $('#estado').on('change', function() {
            var estadoId = $(this).val(); // Pega o valor do estado selecionado

            // Limpa o select de cidade
            $('#cidade').html('<option value="">Selecione uma Cidade</option>');

            // Se um estado foi selecionado, realiza a requisição AJAX
            if (estadoId) {
                $.ajax({
                    url: '{{ url('localidades/cidades') }}/' + estadoId, // URL para obter as cidades
                    type: 'GET',
                    success: function(data) {
                        // Preenche o select de cidades com as cidades retornadas
                        if (data.length > 0) {
                            data.forEach(function(cidade) {
                                $('#cidade').append('<option value="' + cidade.id + '">' + cidade.nome + '</option>');
                            });
                        } else {
                            $('#cidade').html('<option value="">Nenhuma cidade encontrada</option>');
                        }
                    },
                    error: function() {
                        alert('Erro ao carregar as cidades.');
                    }
                });
            }
        });
    </script>
</body>
</html>
