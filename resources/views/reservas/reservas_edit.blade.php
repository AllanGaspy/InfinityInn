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

            <!-- Formulário de edição -->
            <form method="POST" action="{{ URL('/reservas/' . $reserva->id) }}" enctype="multipart/form-data">
                @method('PUT')
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
                        @foreach ($estados as $value)
                            <option value="{{ $value->id }}" {{ $reserva->estado_id == $value->id ? 'selected' : '' }}>
                                {{ $value->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo de Cidade -->
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <select id="cidade" name="cidade_id" class="form-control">
                        @foreach ($cidades as $value)
                            <option value="{{ $value->id }}" {{ $reserva->cidade_id == $value->id ? 'selected' : '' }}>
                                {{ $value->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo de Nome -->
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome da reserva" value="{{ $reserva->nome }}">
                </div>

                <!-- Campo de Hotel -->
                <div class="form-group">
                    <label for="hotel">Hotel (Digite o ID)</label>
                    <input type="number" name="hotel_id" class="form-control" placeholder="Digite o ID do hotel" value="{{ $reserva->hotel_id }}">
                </div>

                <!-- Campo de Quantidade de Quartos -->
                <div class="form-group">
                    <label for="quartos">Quantidade de quartos</label>
                    <input type="number" name="quartos" class="form-control" placeholder="Digite a quantidade de quartos" value="{{ $reserva->quartos }}">
                </div>

                <!-- Campo de Número de Hóspedes -->
                <div class="form-group">
                    <label for="guests">Número de Hóspedes</label>
                    <input type="number" name="guests" class="form-control" placeholder="Digite o número de hóspedes" min="1" value="{{ $reserva->guests }}">
                </div>

                <!-- Campo de Check-in -->
                <div class="form-group">
                    <label for="check_in">Data de Check-in</label>
                    <input type="date" name="check_in" class="form-control" required value="{{ $reserva->check_in->format('Y-m-d') }}">
                </div>

                <!-- Campo de Check-out -->
                <div class="form-group">
                    <label for="check_out">Data de Check-out</label>
                    <input type="date" name="check_out" class="form-control" required value="{{ $reserva->check_out->format('Y-m-d') }}">
                </div>

                <!-- Botão de Enviar -->
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>

            <!-- Script de Ajax para carregar as Cidades -->
            <script>
                $('#estado').on('change', function() {
                    var estadoId = $(this).val();
                    $('#cidade').html('<option value="">Selecione uma Cidade</option>');
                    if (estadoId) {
                        $.ajax({
                            url: '{{ url('localidades/cidades') }}/' + estadoId,
                            type: 'GET',
                            success: function(data) {
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
