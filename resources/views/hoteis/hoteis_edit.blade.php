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

            <!--Forms do edit-->
            <form method='POST' action="{{ url('/hoteis/' . $hotel->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <!--Alert para requisição não cumprida da categoriaController-->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado_id">
                        @foreach ($estados as $value)
                            <option value="{{ $value->id }}" {{ $value->id == $hotel->estado_id ? 'selected' : '' }}>
                                {{ $value->nome }}
                            </option>
                        @endforeach
                    </select>

                    <label for="cidade">Cidade</label>
                    <select id="cidade" name="cidade_id">
                        @foreach ($cidades as $value)
                            <option value="{{ $value->id }}" {{ $value->id == $hotel->cidade_id ? 'selected' : '' }}>
                                {{ $value->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="hotel">Hotel</label>
                    <input type="text" name="hotel" id="hotel" class="form-control"
                        placeholder="Digite o nome do hotel" value="{{ $hotel->hotel }}">
                </div>

                <div class="form-group">
                    <label for="quartos">Quantidade de quartos</label>
                    <input type="number" name="quartos" class="form-control"
                        placeholder="Digite a quantidade de quartos" value="{{ $hotel->quartos }}">
                </div>

                <!-- Campo de descrição -->
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" class="form-control" rows="4"
                        placeholder="Digite a descrição do hotel">{{ $hotel->descricao }}</textarea>
                </div>

                <!-- Campo de valor da diária -->
                <div class="form-group">
                    <label for="valor_diaria">Valor da diária</label>
                    <input type="number" name="valor_diaria" class="form-control" step="0.01"
                        placeholder="Digite o valor da diária" value="{{ $hotel->valor_diaria }}">
                </div>

                <h4>Imagens Existentes</h4>
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    @if (!empty($hotel->images) && is_array($hotel->images))
                        @foreach ($hotel->images as $key => $value)
                            <div class="col">
                                <div class="card">
                                    <img
                                        src="data:image/png;base64,{{ $value }}"
                                        class="card-img-top img-fluid"
                                        alt="Hotel Image"
                                        style="width: 100%; height: 200px; object-fit: cover;"
                                    />
                                    <div class="card-body text-center">
                                        <!-- Checkbox para remover imagem -->
                                        <input type="checkbox" name="remove_images[]" value="{{ $key }}" id="remove-{{ $key }}">
                                        <label for="remove-{{ $key }}">Remover</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Nenhuma imagem disponível para este hotel.</p>
                    @endif
                </div>


                <h4>Adicionar Novas Imagens</h4>
                <div class="mb-3">
                    <input type="file" name="images[]" class="form-control" multiple />
                </div>

                <button type="submit" class="btn btn-primary">Editar</button>
            </form>

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
