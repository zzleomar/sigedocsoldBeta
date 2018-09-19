<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Oficio;
use App\Dependencia;
class UbicacionOficioControllers extends Controller
{
      public function show($id){
        $Oficio=Oficio::where('id_documento',$id)->get(); 
         $Dependencia= Dependencia::where('id_dependencia',$Oficio[0]['attributes']['id_dependencia'])->get();
        $Escuela=$Dependencia[0]['attributes']['id_escuela'];
        $data=DB::table('ruta_oficio')->
                select('escuela.nombre as escuela','users.nombres','perfil.nombre_perfil','users.apellidos','users.id_perfil','documento.codigo_plantilla','documento.descripcion_documento','oficio.acronimo','ruta_oficio.fecha','dependencia.nombre_dependencia','estados.id_estados','estados.nombre')
                ->join('oficio','ruta_oficio.id_oficio','=','oficio.id_oficio')
                ->join('documento','oficio.id_documento','=','documento.id_documento')
                ->join('dependencia','oficio.id_dependencia','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','dependencia.id_escuela')
                ->join('estados','ruta_oficio.id_estado','=','estados.id_estados')
                ->join('users','ruta_oficio.id_user','=','users.id')
                ->join('perfil','users.id_perfil','=','perfil.id_perfil')
                ->where('ruta_oficio.id_oficio',$Oficio[0]['attributes']['id_oficio'])
                ->where ('escuela.id_escuela',$Escuela)
                ->orderBy('ruta_oficio.fecha', 'asc')->get();
  
                
        return view('ubicacionoficio/show')->with(['data'=>$data]);
    }
}
