
@extends('adminlte::page')

@section('content')

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  </head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!--Forms do create-->
            <form method = 'POST' action="{{ URl('/hoteis') }}">
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
            @foreach ($estados as $value)
                <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                    <option value="{{ $value->id }}">{{ $value->estados->nome - $value->nome }}</option>
                    </select>

                    <label for="exampleInputEmail1">Municipio</label>
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true"></select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Hotel</label>
                    <input type="text" name="hotel" class="form-control"  placeholder="Digite o nome do hotel">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Quantidade de quartos</label>
                    <input type="int" name="quartos" class="form-control"  placeholder="Digite a quantidade de quartos">
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            @endforeach
        </div>
    </div>
</div>


  

    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

@endsection
