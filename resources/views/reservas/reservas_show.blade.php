@extends('adminlte::page')

@section('content')
<!--Gostei dessa lista, pensei em por um forms  em baixo dela para efetuar a reserva-->
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Hotel:
            <span class=""><p>{{ $reservas->id }}</p></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
           Nome:
            <span class="">{{$reservas->nome}}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Estado:
            <span class="">{{ $reservas->estado->nome }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Cidade:
            <span class="">{{ $reservas->cidade->nome }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Número de quartos:
            <span class="">{{$reservas->quartos}}</span>
        </li>
        
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Valor da diária:
            <span class=""></span>
        </li>
    </ul>

   
      
    </div>



@endsection


