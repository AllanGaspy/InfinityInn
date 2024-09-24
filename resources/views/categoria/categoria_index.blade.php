@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <table>
                        <tr>
                         <th>id </th>
                         <th>Nome </th>
                         <th>hoteis </th>
                         <th>apartamentos </th>
                         <th>Ação </th>
                        </tr>
                    @foreach($categorias as $value)    
                        <tr>
                        <td>{{$value -> id}}</td>
                        <td>{{$value -> nome}}</td>
                        <td>{{$value -> hoteis}}</td>
                        <td>{{$value -> apartamentos}}</td>
                        <!-- show edit e delete -->
                        <td>
                            <a href="{{ url('/categoria/' . $value->id)}}"><button type="button" class="btn btn-primary">Visualizar</button></a> 
                            <a href=""><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href=""><button type="button" class="btn btn-primary">Ecluir</button></a>
                        </td>
                        </tr>
                    @endforeach 
                        <tr>
                        <!-- Criação button --> 
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ url ('/categoria/create')}}"><button type="button" class="btn btn-success">Criar</button></a>
                            
                    </div>
                        </tr>   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection