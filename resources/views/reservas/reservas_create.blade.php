@extends('adminlte::page')

@section('content')

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!--Formulário de criação-->
            <form method='POST' action="{{ URL('/reservas') }}" enctype="multipart/form-data">
                @csrf

                <!-- Alertas para erros -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Campo de Estado -->
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado_id" class="form-control">
                        <option value="">Selecione um Estado</option>
                        @foreach ($estados as $value)
                            <option value="{{ $value->id }}">{{ $value->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo de Cidade -->
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <select id="cidade" name="cidade_id" class="form-control">
                        <option value="">Selecione uma Cidade</option>
                    </select>
                </div>

                <!-- Campo de Nome -->
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Digite o nome da reserva">
                </div>

                <!-- Campo de Hotel -->
                <div class="form-group">
                    <label for="hotel">Hotel (Digite o ID)</label>
                    <input type="number" name="hotel_id" class="form-control" placeholder="Digite o ID do hotel">
                </div>

                <!-- Campo de Quantidade de Quartos -->
                <div class="form-group">
                    <label for="quartos">Quantidade de quartos</label>
                    <input type="number" name="quartos" class="form-control" placeholder="Digite a quantidade de quartos">
                </div>

                <!-- Campo de Número de Hóspedes (Guests) -->
                <div class="form-group">
                    <label for="guests">Número de Hóspedes</label>
                    <input type="number" name="guests" class="form-control" placeholder="Digite o número de hóspedes" min="1">
                </div>

                <!-- Campo de Check-in -->
                <div class="form-group">
                    <label for="check_in">Data de Check-in</label>
                    <input type="date" name="check_in" class="form-control" required>
                </div>

                <!-- Campo de Check-out -->
                <div class="form-group">
                    <label for="check_out">Data de Check-out</label>
                    <input type="date" name="check_out" class="form-control" required>
                </div>

                <!-- Botão de Enviar -->
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

            <!-- Script de Ajax para carregar as Cidades -->
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

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

@endsection
