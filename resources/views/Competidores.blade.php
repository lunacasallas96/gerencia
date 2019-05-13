@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Competidores</div>
                
                @if(session()->has('msjeliminado'))
                <div class="alert alert-success" role="alert">
                Empresa Eliminado Correctamente.!
                </div>
                @endif
                @if(session()->has('msjcreado'))
                <div class="alert alert-primary" role="alert">
                Empresa Creada Correctamente.!
                </div>
                @endif
                
                
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<form action="{{ route('Controller.CompetidoresStore') }}" method="POST">
    @csrf
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Competidor:</strong>
                <input type="text" name="Nombre" class="form-control" placeholder="Digite el nombre del competidor">
            </div>
        </div>
        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">GUARDAR COMPETIDOR</button>
        </div>
        <br><br>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> nombre </th>
                <th> acciones </th>

            </tr>
            @foreach($datos as $dato)
                <tr>
                @if(($dato -> id) > 1)
                    <td>{{$dato->name}}</td>
                    <td> <a class="btn btn-primary" href="{{ route('Controller.EditarEmpresa') }}/{{$dato->id}}"> Editar</a> <a class="btn btn-success" href="{{ route('Controller.competidoresCriterios') }}/{{$dato->id}}"> Agregar Criterios</a> <a class="btn btn-danger" href="{{ route('Controller.EliminarCompetidor') }}/{{$dato->id}}"> Eliminar</a>
                    </td>
                @endif
                </tr>
            @endforeach
        </thead>
    </table>
    </form>
    <a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
