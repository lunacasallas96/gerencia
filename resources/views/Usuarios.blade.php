@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   Usuarios
                    @if(session()->has('msjeliminado'))
                    <div class="alert alert-success" role="alert">
                    Usuario Eliminado Correctamente.!
                    </div>
                    @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Correo </th>
                        <th> Rol </th>
                        <th> Acciones </th>

                    </tr>
                    @foreach($datos as $dato)
                        <tr>
                            <td>{{$dato->name}}</td>
                            <td>{{$dato->email}}</td>
                            @if($dato->name == "Coordinador")
                            <td> Coordinador </td>
                            <td> </td>
                            @endif
                            @if($dato->name != "Coordinador")
                            <td> Usuario </td>
                            <td> <a class="btn btn-danger" href="{{ route('Controller.EliminarUsuario') }}/{{$dato->id}}"> Eliminar</a></td>
                            @endif
 
                        </tr>
                    @endforeach
                </thead>
            </table>
        <br><br>
        <a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  

