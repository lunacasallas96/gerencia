@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <center>
        <img src="{{ asset('css/logo-San-Miguel.png') }}">
        </center>
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($nombre == "Coordinador")
                    <a class="btn btn-primary" href="{{ route('Controller.empresa') }}"> Mi Empresa</a>
                    <a class="btn btn-primary" href="{{ route('Controller.competidores') }}"> Competidores</a>
                    <a class="btn btn-primary" href="{{ route('Controller.nuevocriterio') }}"> Criterios</a>
                    <a class="btn btn-primary" href="{{ route('Controller.usuarios') }}"> Usuarios</a>
                    <a class="btn btn-primary" href="{{ route('Controller.matriz') }}"> Matriz De Resultados</a>
                    @endif
                    @if($nombre != "Coordinador")
                    <a class="btn btn-primary" href="{{ route('Controller.empresausuarios') }}"> Mi Empresa</a>
                    <a class="btn btn-primary" href="{{ route('Controller.matriz') }}"> Matriz De Resultados</a>
                    @endif
                                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
