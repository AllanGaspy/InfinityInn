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
    </style>
</head>
<body class="bg-dark text-white">

    <!-- Navbar reduzida -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">InfinityInn</a>
    </nav>

    <div class="container my-5">
        <!-- Seção de Busca -->
        <form action="{{ url('/buscar') }}" method="GET" class="mb-4">
            <div class="row">
                <!-- Estado -->
                <div class="col-md-2 mb-3">
                    <select id="estado" name="estado_id" class="form-control bg-dark text-white border-purple">
                        <option value="">Selecione o Estado</option>
                        @foreach ($estados as $value)
                            <option value="{{ $value->id }}">{{ $value->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Cidade -->
                <div class="col-md-2 mb-3">
                    <select name="cidade_id" id="cidade" class="form-control bg-dark text-white border-purple">
                        <option value="">Selecione a Cidade</option>
                    </select>
                </div>

                <!-- Data de Entrada -->
                <div class="col-md-2 mb-3">
                    <input type="date" name="check_in" id="check_in" class="form-control bg-dark text-white border-purple" placeholder="Check-in" required>
                </div>

                <!-- Data de Saída -->
                <div class="col-md-2 mb-3">
                    <input type="date" name="check_out" id="check_out" class="form-control bg-dark text-white border-purple" placeholder="Check-out" required>
                </div>

                <!-- Quantidade de Pessoas -->
                <div class="col-md-2 mb-3">
                    <input type="number" name="guests" id="guests" class="form-control bg-dark text-light border-purple" placeholder="Nº de Hóspedes" min="1" required>
                </div>

                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-green w-100 text-white">Buscar</button>
                </div>
            </div>
        </form>

        <!-- Seção de Hotéis Destaque -->
        <h2 class="mb-4 text-center text-white">Hotéis em Destaque</h2>
        <div class="row">
            @foreach ($hoteis as $hoteis)
                <div class="col-12 mb-4">
                    <div class="card flex-row bg-dark text-white border-purple">
                        @if($hoteis->images)
                            <img src="data:image/png;base64,{{ $hoteis->images[0] }}" class="card-img-left" style="width: 200px;" alt="Imagem do Hotel">
                        @else
                            <p>Sem imagem</p>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-white">{{ $hoteis->hotel }}</h5>
                            <p class="card-text">{{ Str::limit($hoteis->descricao, 100) }}</p>
                            <p class="card-text"><strong>R$ {{ number_format($hoteis->valor_diaria, 2, ',', '.') }}</strong> por noite</p>
                            <a href="{{ route('hoteis_pre_reserva', $hoteis->id) }}" class="btn btn-green">Ver Mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <footer class="bg-purple text-white text-center py-3">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>
