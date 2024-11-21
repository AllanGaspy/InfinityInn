@extends('adminlte::page')

@section('content')

<div class="container my-5">
    <h2 class="text-center">Resultados da Busca</h2>

    @if ($hoteis->isEmpty())
        <p class="text-center">Nenhum hotel encontrado com os critérios fornecidos.</p>
    @else
        <div class="row">
            @foreach ($hoteis as $hotel)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($hotel->images)
                            <img src="data:image/png;base64,{{ $hotel->images[0] }}" class="card-img-top" alt="Imagem do Hotel">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Imagem padrão">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $hotel->hotel }}</h5>
                            <p class="card-text">{{ $hotel->description }}</p>
                            <p class="card-text"><strong>R$ {{ number_format($hotel->price_per_night, 2, ',', '.') }}</strong> por noite</p>
                            <a href="{{ route('hotel.show', $hotel->id) }}" class="btn btn-primary">Ver Mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
