@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criterios</div>
                @if(session()->has('msj'))
                <div class="alert alert-success" role="alert">
                Criterio Creado Correctamente.!
                </div>
                @endif
                @if(session()->has('msjeliminado'))
                <div class="alert alert-success" role="alert">
                Criterio Eliminado Correctamente.!
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
<form action="{{ route('Controller.criteriostore') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DESCRIPCIÓN:</strong>
                <input type="text" name="DESCRIPCION" class="form-control" placeholder="Diegite la descripción" required="true">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TIPO:</strong>
                <select name = "tipo">
                <option value='1'>Cuantitativo</option>
                <option value='2'>Cualitativo</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">GUARDAR CRITERIO</button>
        </div>
    </div>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> nombre </th>
                <th> tipo </th>
                <th> acciones </th>

            </tr>
            @foreach($datos as $dato)
                <tr>
                    <td>{{$dato->descripcion}}</td>
                    <td>{{$dato->tipo}}</td>
                    <td>  <a class="btn btn-danger" href="{{ route('Controller.EliminarCriterio') }}/{{$dato->id}}"> Eliminar</a></td>
                </tr>
            @endforeach
        </thead>
    </table>
   <br><br>
   <a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
$(document).ready(function(){

})
</script>    

