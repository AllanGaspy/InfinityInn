@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="mx-auto">
                <a href=" {{ url('/categoria/create') }} " class="btn btn-success" role="button"
                    aria-pressed="true">CRIAR</a>
            </div>

            <table class="table my-5">
                <thead>
                    <tr>
                        <th>Localização</th>
                        <th>Hotel</th>
                        <th>Quantidade de quartos</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $value)
                        <tr>
                            <th scope="row">{{ $value->id }}</th>
                            <td>{{$value->localizacao}}</td>
                            <td>{{$value->hotel}}</td>
                            <td>{{$value->quartos}}</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-primary" href="{{ url('/categoria/' . $value->id) }}"
                                    role="button">Visualizar</a>
                                <a class="btn btn-warning" href="{{ url('/categoria/' . $value->id . '/edit') }}"
                                    role="button">Editar</a>
                                <form method="POST" action='{{ url('/categoria/' . $value->id) }}'
                                    onsubmit="return ConfirmDelete()">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger" role="button" value="Excluir"
                                        type="submit"></input>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
