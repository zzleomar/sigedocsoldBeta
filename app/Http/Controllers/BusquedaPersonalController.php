<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Personal;
use Yajra\Datatables\Datatables;
class BusquedaPersonalController extends Controller
{
    public function store(Request $request)
    {
        $Personal=Personal::select(['personal.id_personal','personal.nacionalidad','personal.nombre','personal.apellido','personal.telefono_oficina','personal.telefono_habitacion','personal.unidad_ejecutora','personal.unidad_asignado','dependencia_udo.descripcion','dependencia_udo.id_dependencia'])
                ->join('dependencia_udo','personal.unidad_asignado','=','dependencia_udo.dependencia')
                ->where('personal.cedula',$request->cedula);
     
        return Datatables::of($Personal)->make(true);
    }

    /*public function busqueda(Request $request){
    	 $Personal=Personal::select(['personal.id_personal','personal.nacionalidad','personal.nombre','personal.apellido','personal.telefono_oficina','personal.telefono_habitacion','personal.unidad_ejecutora','personal.unidad_asignado','dependencia_udo.descripcion','dependencia_udo.id_dependencia'])
                ->join('dependencia_udo','personal.unidad_asignado','=','dependencia_udo.dependencia')
                ->where('personal.cedula',$request->cedula);
     
        return Datatables::of($Personal)->make(true);
    }*/
}
