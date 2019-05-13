@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Competidores</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
<form action="{{ route('Controller.CompetidoresStore') }}" method="POST">
    @csrf
    <input type="hidden" id="IdEmpresa" name="IdEmpresa" value={{$Competidor->id}}>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <h2>{{$Competidor->name}}<h2>
            <strong>Criterios<strong>
            </div>
        </div>
        <br><br>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> nombre </th>
                <th> tipo </th>
                <th> estado </th>
                <th> acción</th>
            </tr>
            @foreach($Criterios as $Criterio)
                <tr>
                    <td>{{$Criterio->descripcion}}</td>
                    <td>{{$Criterio->tipo}}</td>
                    @if($Criterio->estado == "Agregado")
                    <td bgcolor="#0BE94B">{{$Criterio->estado}}</td>
                    @endif
                    @if($Criterio->estado == "Sin Agregar")
                    <td bgcolor="#D51010">{{$Criterio->estado}}</td>
                    @endif
                    <td> <a class="btn btn-success" href= "{{ route('Controller.CriterioCompetidor') }}/{{$Criterio->id}}/{{$Competidor->id}}" > AGREGAR CRITERIO</a></td>
             
                </tr>
                @endforeach
        </thead>
    </table>   
    </form>   
    @if($Competidor->name == "AGROINSUMOS SAN MIGUEL S.A.S")
    <a class="btn btn-danger" href="{{ route('Controller.empresa') }}"> Volver</a>
    @endif
    @if($Competidor->name != "AGROINSUMOS SAN MIGUEL S.A.S")
    <a class="btn btn-danger" href="{{ route('Controller.competidores') }}"> Volver</a>
    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
