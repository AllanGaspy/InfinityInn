@extends('adminlte::page')

@section('content')
<!--Gostei dessa lista, pensei em por um forms  em baixo dela para efetuar a reserva-->
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Hotel:
            <span class=""><p>{{ $postagens->id }}</p></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Estado:
            <span class="">{{ $postagens->estado->nome }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Cidade:
            <span class="">{{ $postagens->cidade->nome }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Número de quartos:
            <span class="">{{$postagens->quartos}}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Valor da diária:
            <span class=""></span>
        </li>
    </ul>

    <div class="row row-cols-1 row-cols-md-3 g-3">
        @foreach ($postagens->images as $value)
            <div class="col">
                <div class="card">
                    <img
                        src="data:image/png;base64,{{ $value }}"
                        class="card-img-top img-fluid"
                        alt="Hotel Image"
                        style="width: 100%; height: 200px; object-fit: cover;"
                    />
                </div>
            </div>
        @endforeach
    </div>



@endsection


