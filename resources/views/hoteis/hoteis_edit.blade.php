@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!-- pré-vizualização para editar-->
         <br>
         <p>Dados desse Registro</p>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Indentificador ;
                <span class="badge badge-primary badge-pill"><p>{{$hoteis->id}}</p></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Localização ;
                <span class="badge badge-primary badge-pill">{{$hoteis->localizacao}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Número de quartos ; 
                <span class="badge badge-primary badge-pill">{{$hoteis->quartos}}</span>
            </li>
            </ul>        
            <br>
            <p>Ensira os novos Dados</p>

            <!--Forms do EDIT-->
            <form method = 'POST' action="{{ URl('/hoteis/' . $hoteis->id) }}">
                @method('PUT')
                @csrf

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
