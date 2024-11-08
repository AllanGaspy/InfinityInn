@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!--Forms do create-->
            <form method = 'POST' action="{{ URl('/categoria') }}">
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
                    <label for="exampleInputEmail1">Localização</label>
                    <input type="text" name="localizacao" class="form-control"  placeholder="Digite a localização">
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

        </div>
    </div>
</div>
@endsection
