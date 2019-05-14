<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Http\Controller\Criterio;
use App\Http\Controller\Empresas;
use App\Http\Controller\Competidor;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function Miempresa()
	{   
        $CriterioAsig = Competidor::where('fk_empresa',1)->get();
        foreach($CriterioAsig as $Criterio){
            $Criterio->offsetSet('nombre',$Criterio->relacionTipo->descripcion);
            $Criterio->offsetSet('valor',$Criterio->relacionEscala->descripcion);
        }
        $malo = 0;
        $regular = 0;
        $bueno = 0;
        $sobresaliente = 0;
        $excelente = 0;
        foreach($CriterioAsig as $CriterioA){
            if($CriterioA->fk_escala == 1){
                $malo = $malo + 1;
            }
            if($CriterioA->fk_escala == 2){
                $regular = $regular + 1;
            }
            if($CriterioA->fk_escala == 3){
                $bueno = $bueno + 1 ;
            }
            if($CriterioA->fk_escala == 4){
                $sobresaliente = $sobresaliente+1;
            }
            if($CriterioA->fk_escala == 5){
                $excelente=$excelente + 1;
            }
        }

        $Empresas = Empresas::all();
        foreach($Empresas as $Empresa){
            $CompetidorEmpresa = Competidor::where('fk_empresa',$Empresa->id)->get();
            $Promedio = 0 ;
            foreach($CompetidorEmpresa as $Competidor){
                $Promedio = $Promedio+$Competidor->fk_escala;
            }
            $Empresa->offsetSet('Promedio',$Promedio);
        }
        return view('MiEmpresa',
        [
            'CriteriosAsig'=>$CriterioAsig,
            'malo'=>$malo,
            'bueno'=>$bueno,
            'regular'=>$regular,
            'sobresaliente'=>$sobresaliente,
            'excelente'=>$excelente,
            'Empresas'=>$Empresas,
        ]);
    }
    public function empresausuarios()
	{   
        $CriterioAsig = Competidor::where('fk_empresa',1)->get();
        foreach($CriterioAsig as $Criterio){
            $Criterio->offsetSet('nombre',$Criterio->relacionTipo->descripcion);
            $Criterio->offsetSet('valor',$Criterio->relacionEscala->descripcion);
        }
        $malo = 0;
        $regular = 0;
        $bueno = 0;
        $sobresaliente = 0;
        $excelente = 0;
        foreach($CriterioAsig as $CriterioA){
            if($CriterioA->fk_escala == 1){
                $malo = $malo + 1;
            }
            if($CriterioA->fk_escala == 2){
                $regular = $regular + 1;
            }
            if($CriterioA->fk_escala == 3){
                $bueno = $bueno + 1 ;
            }
            if($CriterioA->fk_escala == 4){
                $sobresaliente = $sobresaliente+1;
            }
            if($CriterioA->fk_escala == 5){
                $excelente=$excelente + 1;
            }
        }

        $Empresas = Empresas::all();
        foreach($Empresas as $Empresa){
            $CompetidorEmpresa = Competidor::where('fk_empresa',$Empresa->id)->get();
            $Promedio = 0 ;
            foreach($CompetidorEmpresa as $Competidor){
                $Promedio = $Promedio+$Competidor->fk_escala;
            }
            $Empresa->offsetSet('Promedio',$Promedio);
        }
        return view('MiEmpresaUsuario',
        [
            'CriteriosAsig'=>$CriterioAsig,
            'malo'=>$malo,
            'bueno'=>$bueno,
            'regular'=>$regular,
            'sobresaliente'=>$sobresaliente,
            'excelente'=>$excelente,
            'Empresas'=>$Empresas,
        ]);
    }
    public function Competidores()
	{
        $datos = Empresas::all();
        return view('Competidores',[
            'datos'=>$datos,
        ]);
    }
    public function usuarios()
	{
        $datos = User::All();
        return view('Usuarios',[
            'datos'=>$datos,
        ]);
    }
    public function NuevoCriterio()
	{
        $datos = Criterio::all();

        foreach($datos as $dato){
            $dato->offsetSet('tipo',$dato->relacionTipo->descripcion);
        }

        return view('NuevoCriterio',
        [
            'datos'=>$datos,        
        ]);
    }
    
    public function EliminarCriterio(Request $request, $id)
	{
        $Criterio = Criterio::where('id',$id)->first();
        $Criterio->delete();
    
        return back()->with('msjeliminado','eliminado');
    }

    public function EliminarCompetidor(Request $request, $id)
	{
        $Competidor = Empresas::where('id',$id)->first();
        $Competidor->delete();
    
        return back()->with('msjeliminado','eliminado');
    }
    public function EliminarUsuario(Request $request, $id)
	{
        $Usuario = User::where('id',$id)->first();
        $Usuario->delete();
    
        return back()->with('msjeliminado','eliminado');
    }

    public function EditarEmpresa(Request $request, $id)
	{
        
        $Empresa=Empresas::where('id',$id)->first();

        return view('EditarEmpresa',[
            'empresa'=>$Empresa,
        ]);
    }
    public function Reporte(Request $request)
	{
        $Empresas = Empresas::all();
        $Criterios = Criterio::all();
    
        foreach($Empresas as $Empresa){
            $i=0;
            $concatenado=[];
            foreach($Criterios as $Criterio){
                $CriterioAsig = Competidor::where('fk_empresa',$Empresa->id)->where('fk_criterio',$Criterio->id)->first();
                if($CriterioAsig != null){
                    $collection = collect([]);
                    $collection->add($CriterioAsig->relacionEscala->descripcion);
                    $concatenado[$i]= $collection;
                    $i=$i+1;
                }else{
                    $collection = collect([]);
                    $collection->add('No Aplica');
                    $concatenado[$i]= $collection;
                    $i=$i+1;

                }
            }
           
            $Empresa->offsetSet('Valores',$concatenado); 
          //   return $Empresa->Valores[0];    
        }

        return PDF::loadView('reporte',compact('Empresas','Criterios'))->download('ReporteAnteproyectos.pdf');
         
    }
    public function EditarEmpresas(Request $request)
	{
        
        $Empresa=Empresas::where('id',$request['Id'])->first();
        $Empresa -> name = $request->get('Nombre');
        $Empresa->save();

        return back()->with('msjeditado','eliminado');
    }
    
    
    public function storeCriterio(Request $request)
	{
        Criterio::insert([
            'descripcion' => $request['DESCRIPCION'],
            'fk_id_tipo' => $request['tipo'],
        ]);

        return back()->with('msj','eliminado');
    }
    public function CompetidoresStore(Request $request)
	{
        Empresas::insert([
            'name' => $request['Nombre'],
           ]);

           return back()->with('msjcreado','eliminado');
    }
    
    public function competidoresCriterios(Request $request,$id)
	{
        $Competidor = Empresas::where('id',$id)->first();
        $CriterioAsig = Competidor::where('fk_empresa',$id)->get();
        foreach($CriterioAsig as $Criterio){
            $Criterio->offsetSet('nombre',$Criterio->relacionTipo->descripcion);
            $Criterio->offsetSet('calificacion',$Criterio->relacionEscala->descripcion);
        }
        $Criterios = Criterio::all();
        foreach($Criterios as $Criterio){
            if(Competidor::where('fk_empresa',$id)->where('fk_criterio',$Criterio->id)->first() == null){
                $Criterio->offsetSet('estado','Sin Agregar');
                $Criterio->offsetSet('tipo',$Criterio->relacionTipo->descripcion);
            
            }else{
                $Criterio->offsetSet('estado','Agregado');
                $Criterio->offsetSet('tipo',$Criterio->relacionTipo->descripcion);
            }
            
        }

        return view('CompetidoresCriterio',[
            'Competidor'=>$Competidor,
            'Criterios'=>$Criterios,
        ]);
    }
    
    public function CriterioCompetidor(Request $request, $id,$idc)
	{
        if ($request->isMethod('GET')) {
            $Competidor = Empresas::where('id',$idc)->first();
            $Criterio = Criterio::where('id',$id)->first();
            return view('AñadirCriterio',[
                'Competidor'=>$Competidor,
                'Criterio'=>$Criterio,
            ]);
        }
        
    }
    
    public function criteriostore(Request $request)
	{
       if(Competidor::where('fk_empresa',$request['IdEmpresa'])->where('fk_criterio',$request['IdCriterio'])->first() == null){
        Competidor::insert([
            'fk_empresa'=>$request['IdEmpresa'],
            'fk_criterio'=>$request['IdCriterio'],
            'fk_escala'=>$request['tipo'],
        ]);     
        }else{  
            $criterio = Competidor::where('fk_empresa',$request['IdEmpresa'])->where('fk_criterio',$request['IdCriterio'])->first();
            $criterio->fk_escala = $request['tipo'];
            $criterio->save();
        }
        return back()->with('msj','eliminado');
    }
    public function Matriz(Request $request)
	{
        $Empresas = Empresas::all();
        $Criterios = Criterio::all();
    
        foreach($Empresas as $Empresa){
            $i=0;
            $concatenado=[];
            foreach($Criterios as $Criterio){
                $CriterioAsig = Competidor::where('fk_empresa',$Empresa->id)->where('fk_criterio',$Criterio->id)->first();
                if($CriterioAsig != null){
                    $collection = collect([]);
                    $collection->add($CriterioAsig->relacionEscala->descripcion);
                    $concatenado[$i]= $collection;
                    $i=$i+1;
                }else{
                    $collection = collect([]);
                    $collection->add('No Aplica');
                    $concatenado[$i]= $collection;
                    $i=$i+1;

                }
            }
           
            $Empresa->offsetSet('Valores',$concatenado); 
          //   return $Empresa->Valores[0];    
        }
        return view('MatrizR',[
            'Criterios'=>$Criterios,
            'Empresas'=>$Empresas
        ]);
    }

    
    
}
