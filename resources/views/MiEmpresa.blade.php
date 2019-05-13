@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">AGROINSUMOS SAN MIGUEL S.A.S</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <h2>  Mis Criterios  </h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> Criterio </th>
                <th> Valor </th>
            </tr>
            @foreach($CriteriosAsig as $Criterio)
                <tr>
                    <td>{{$Criterio->nombre}}</td>
                    <td>{{$Criterio->valor}}</td>
                </tr>
            @endforeach
        </thead>
    </table>
        <br>
        
        <a class="btn btn-primary" href="{{ route('Controller.competidoresCriterios') }}/1"> Editar Criterios</a>
        <br>
        <br>
    <h2>Graficas</h2>
    <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Promedio', 'Empresa'],
          @foreach($Empresas as $Empresa)
            ['<?php echo $Empresa['name']?>',<?php echo $Empresa['Promedio']?>],
          @endforeach
        ]);

        var options = {
          title: 'Promedio De Puntuación',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 700px; height: 350px"></div>
  </body>
</html>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Calificación', 'N° en esta CAlificacion'],
          ['Malo',     {{$malo}}],
          ['Regular',      {{$regular}}],
          ['Bueno',  {{$bueno}}],
          ['Sobresaliente', {{$sobresaliente}}],
          ['Excelente',    {{$excelente}}]
        ]);

        var options = {
          title: '% de Criterios'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 700px; height: 350px;"></div>
  </body>
</html>

<a class="btn btn-danger" href="{{ url('/home') }}"> Volver</a>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

