@extends('adminlte::page')

@section('content')
<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Reserva ID:
        <span>{{ $reserva->id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Nome:
        <span>{{ $reserva->nome }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Estado:
        <span>{{ $reserva->estado->nome }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Cidade:
        <span>{{ $reserva->cidade->nome }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Número de quartos:
        <span>{{ $reserva->quartos }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Número de hóspedes:
        <span>{{ $reserva->guests }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Data de Check-in:
        <span>{{ \Carbon\Carbon::parse($reserva->check_in)->format('d/m/Y') }}</span>

    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Data de Check-out:
        <span>{{ $reserva->check_out->format('d/m/Y') }}</span>
    </li>
</ul>
@endsection
