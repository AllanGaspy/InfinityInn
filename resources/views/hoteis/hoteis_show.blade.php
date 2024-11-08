@extends('adminlte::page')

@section('content') 
<!--Gostei dessa lista, pensei em por um forms  em baixo dela para efetuar a reserva-->
            <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Indentificador ;
                <span class="badge badge-primary badge-pill"><p>{{$hoteis->id}}</p></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Localização 
                <span class="badge badge-primary badge-pill">{{$hoteis->estado}}</span>
                <span class="badge badge-primary badge-pill">{{$hoteis->municipio}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Número de quartos ; 
                <span class="badge badge-primary badge-pill">{{$hoteis->quartos}}</span>
            </li>
            </ul>
@endsection


