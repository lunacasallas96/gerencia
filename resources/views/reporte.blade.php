<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>UDEC - GESAP(REPORTES)</title>
	<style type="text/css">
  @font-face {
    font-family: 'Arial';
    font-style: normal;
    font-weight: 400;
  }
	body{font-family:Arial; color:#333; background:#fff; margin-left:auto; margin-right:auto; max-width:210mm; max-height:297mm;}
	.clear{clear:both;}
	.blue{color:#787878;}

	h1,
	h2{color:#787878; margin-bottom:0; font-weight: normal;}
	p{margin-top:0;}
    

	/*Head*/
	#head{text-align:left; margin-bottom:5em;}
	#head img{margin:1em 0; width:7cm;}
	#head .line{font-size:1em; font-style: italic; color:#999;}

	/*Features*/
	h1.features{text-align: center; border-bottom:1px solid #ccc; font-family:Arial; text-transform: uppercase;}
	.feature{float:center; width:100%;}
	.feature h2{font-size:1.1em; text-transform: uppercase;}
    .feature p{color:#555;}
	.feature:nth-child(even){float:right;}
    .final{text-align: center; border-bottom:1px solid #ccc; font-family:Arial; text-transform: uppercase;}
     /* table */

     table { font-size: 75%; table-layout: fixed; width: 100%; }
     table { border-collapse: separate; border-spacing: 2px; }
     th, td { border-width: 3px; padding: 1em; position: relative; text-align: center; }
     th, td { border-radius: 0.5em; border-style: solid; }
     th { background: #EEE; border-color: #BBB; }
     td { border-color: #DDD; }
      /* table meta & balance */

      table.meta, table.balance { float: left; width: 36%; }
      table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

      /* table meta */

      table.meta th { width: 40%; }
      table.meta td { width: 60%; }



	</style>
  
</head>
<body>
	<div id="head">
		<!-- Embeaded image :-) --> 
   
        <h1 class="features">REPORTE GENERADO POR</h1>
        <p class="line">Plataforma Web De BENCHMARKING</p>
        <p class="line">Gerencia</p>
        <p class="line">UNIVERSIDAD DE CUNDINAMARCA</p>
        <p class="line">05/2019</p>
  
       
     
 			
	</div>

    <div id="features">

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
   
   
</body>
<footer>
<div id="head">
		<div id="features"> 

        </div>
 		
	</div>
</footer>
</html>
