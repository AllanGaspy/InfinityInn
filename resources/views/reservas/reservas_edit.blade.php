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

                <!--Forms do create-->
                <form method = 'POST' action="{{ URl('/reservas/' . $reservas->id ) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <!--Alert para requisição não cumprida da categoriaController-->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>s
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleInputEmail1">Estado</label>

                        <!-- Parte na qual estava dando erro no select = class="selectpicker" data-show-subtext="true" data-live-search="true" -->

                        <select id="estado" name='estado_id'>
                            @foreach ($estados as $value)
                                @if ($value->id == $hotel->estado_id)
                                    <option selected='selected' value="{{ $value->id }}">{{ $value->nome }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->nome }}</option>
                                @endif
                            @endforeach
                        </select>

                        <label for="exampleInputEmail1">Cidade</label>
                        <select id="cidade" name='cidade_id'>
                            @foreach ($cidades as $value)
                                @if ($value->id == $hotel->cidade_id)
                                    <option selected='selected' value="{{ $value->id }}">{{ $value->nome }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->nome }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>

                        <input type="text" name="nome" id="nome" class="form-control"
                            placeholder="Digite o nome do hotel" value="{{ $reservas->nome }}">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Hotel</label>

                        <input type="text" name="hotel" id="hotel" class="form-control"
                            placeholder="Digite o nome do hotel" value="{{ $reservas->hotel }}">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantidade de quartos</label>
                        <input type="number" name="quartos" class="form-control"
                            placeholder="Digite a quantidade de quartos" value="{{ $reservas->quartos }}">
                    </div>

                  




                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>

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
                                            $('#cidade').append('<option value="' + cidade.id + '">' +
                                                cidade.nome + '</option>');
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
