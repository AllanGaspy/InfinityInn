@extends('adminlte::page')

@section('content')
<!--Gostei dessa lista, pensei em por um forms  em baixo dela para efetuar a reserva-->
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Hotel:
            <span class=""><p>{{ $hoteis->hotel }}</p></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Estado:
            <span class="">{{ $hoteis->estado->nome }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Cidade:
            <span class="">{{ $hoteis->cidade->nome }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Número de quartos:
            <span class="">{{$hoteis->quartos}}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Valor da diária:
            <span class="">{{$hoteis->valor_diaria}}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Descrição:
            <span class="">{{$hoteis->descricao}}</span>
        </li>
    </ul>

    <div class="row row-cols-1 row-cols-md-3 g-3">
        @if (!empty($hoteis->images) && is_array($hoteis->images))
            @foreach ($hoteis->images as $value)
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
        @else
            <p class="text-muted">Nenhuma imagem disponível para este hotel.</p>
        @endif
    </div>



@endsection


