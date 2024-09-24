@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                
        <form method = 'POST' action="{{URl('/categoria') }}">
            @csrf  

        <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
            <input type="text" name="nome" class="form-control"  placeholder="Create here">
            </div>
        <button type="submit" class="btn btn-primary">Enviar</button>

            </form>
            </div>
        </div>
    </div>
</div>
@endsection