@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>-</th>    
            @foreach($Criterios as $Criterio)
                <th>{{$Criterio->descripcion}}</td>
            @endforeach
        </tr>
        @foreach($Empresas as $Empresa)
            <tr>
                <th> {{$Empresa->name}} </th>
                @foreach($Empresa->Valores as $V)
                @IF($V == '["excelente"]')
                    <td><p style="color:#0CF205";>{{$V[0]}}</p> </td>
                @ENDIF
                @IF($V == '["malo"]')
                    <td><p style="color:#FF0000";>{{$V[0]}}</p> </td>
                @ENDIF
                @IF($V == '["regular"]')
                    <td><p style="color:#DC5300";>{{$V[0]}}</p> </td>
                @ENDIF
                @IF($V == '["bueno"]')
                    <td><p style="color:#FFA600";>{{$V[0]}}</p> </td>
                @ENDIF
                @IF($V == '["sobresaliente"]')
                    <td><p style="color:#0FA900";>{{$V[0]}}</p> </td>
                @ENDIF
                @IF($V == '["No Aplica"]')
                    <td><p style="color:#000000";>{{$V[0]}}</p> </td>
                @ENDIF
                @endforeach
                </tr>
             
            @endforeach
                 
        </thead>
    </table>
    
                <a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
