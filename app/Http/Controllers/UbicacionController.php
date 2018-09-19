<?php
namespace App\Http\Controllers;
use App\Documento;
use DB;
class UbicacionController extends Controller
{
    public function index()
    {
        $data= Documento::paginate(10);
        
        return view('ubicacion/index')->with(['data'=>$data]);
    }
    public function show($id){
      /*  $data=DB::table('ruta')->select('documento.codigo_plantilla','documento.descripcion_documento','ruta.*','dependencia.nombre_dependencia','estados.id_estados','estados.nombre','users.nombres','users.apellidos')
                ->join('documento','ruta.id_documento','=','documento.id_documento')
                ->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                ->join('estados','ruta.id_estado','=','estados.id_estados')
                ->join('users','ruta.id_user','=','users.id')
                ->where('ruta.id_documento',$id)
                ->orderBy('ruta.fecha', 'asc')->get();*/

        $data=DB::table('ruta')->select('documento.codigo_plantilla','documento.descripcion_documento','ruta.*','dependencia.nombre_dependencia','estados.id_estados','estados.nombre','users.nombres','users.apellidos')
                ->join('documento','ruta.id_documento','=','documento.id_documento')
                //->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                 //

                ->join('estados','ruta.id_estado','=','estados.id_estados')
                 ->join('dependencia','ruta.id_dependencia','=','dependencia.id_dependencia')
                ->join('users','ruta.id_user','=','users.id')
                ->where('ruta.id_documento',$id)
                ->orderBy('ruta.fecha', 'asc')->get();
     
        return view('ubicacion/show')->with(['data'=>$data]);
    }
}
