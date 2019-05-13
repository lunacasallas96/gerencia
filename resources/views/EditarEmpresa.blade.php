@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$empresa->name}}</div>
                @if(session()->has('msjeditado'))
                <div class="alert alert-success" role="alert">
                Empresa Editada Carrectamente.!
                </div>
                @endif
                <div class="card-body">
                <form action="{{ route('Controller.EditarEmpresas') }}" method="POST">
                @csrf

                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Editar Nombre Competidor:</strong>
                        <input type="text" name="Nombre" class="form-control" placeholder="{{$empresa->name}}">
                        <input type="hidden" name="Id" value="{{$empresa->id}}">
                    
                    </div>
                </div>
                <br><br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">EDITAR COMPETIDOR</button>
                </div>
                </form>
                <a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>                   
                    
                                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
