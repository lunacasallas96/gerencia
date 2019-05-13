@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Competidores</div>
                @if(session()->has('msj'))
                <div class="alert alert-success" role="alert">
                Criterio Agregado Correctamente.!
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
<form action="{{ route('Controller.criteriostore2') }}" method="POST">
    @csrf
    <input type="hidden" id="IdEmpresa" name="IdEmpresa" value={{$Competidor->id}}>
    <input type="hidden" id="IdCriterio" name="IdCriterio" value={{$Criterio->id}}>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <h2>{{$Competidor->name}}<h2>
            <strong>Criterio Seleccionado : {{$Criterio->descripcion}}<strong>
            </div>
        </div>
        <br><br>
    </div>
    <strong>Seleccione el valor para este criterio<strong>
    <br><br>
    <select name = "tipo">
                    <option value='1'>malo</option>
                    <option value='2'>regular</option>
                    <option value='3'>bueno</option>
                    <option value='4'>sobresaliente</option>
                    <option value='5'>excelente</option>
                    </select>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">GUARDAR CRITERIO</button>
    </div>
    </form>
    <br><br>
    @if($Criterio->fk_id_tipo == 1)
    <strong>Tabla guia para Criterios CUANTITATIVOS</strong>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> Rango </th>
                <th> Valor </th>
            </tr>
                <tr>
                    <td>0-20</td>
                    <td>malo</td>
                </tr>
                <tr>
                    <td>21-40</td>
                    <td>regular</td>
                </tr>
                <tr>
                    <td>41-60</td>
                    <td>bueno</td>
                </tr>
                <tr>
                    <td>61-80</td>
                    <td>sobresaliente</td>
                </tr>
                <tr>
                    <td>91-100 o >100</td>
                    <td>excelente</td>
                </tr>
       
        </thead>
    </table>  
    @endif 
    <a class="btn btn-danger" href="{{ route('Controller.competidoresCriterios') }}/{{$Competidor->id}}"> Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
