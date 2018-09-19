<?php
namespace App\Http\Controllers;
use App\Preparadurias;
use App\Estudiante;
use App\Dependencia;
use App\Horario;
use App\AsignarAulas;
use DB;
use Auth;
class UbicacionPreparaduriaController extends Controller
{
        public function index()
    {
        if(Auth::User()->id_perfil==5)
        {
        $data= Preparadurias::select('preparaduria.*','asignatura.nombre','users.nombres','users.apellidos')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->where('users.id',Auth::User()->id)   
                ->paginate(10);
        }
        else{
             $data= Preparadurias::select('preparaduria.*','asignatura.nombre','users.nombres','users.apellidos')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->paginate(10);
        }
        return view('ubicacionpreparaduria/index')->with(['data'=>$data]);
    }
    public function show($id)
    {
        $Preparador=Preparadurias::where('id_preparaduria',$id)->get();
        $Estudiante=Estudiante::where('id_estudiante',$Preparador[0]['attributes']['id_estudiante'])->get();
        $Dependencia= Dependencia::where('id_dependencia',$Estudiante[0]['attributes']['id_dependencia'])->get();
        $Escuela=$Dependencia[0]['attributes']['id_escuela'];
        $data=DB::table('rutasp')
                ->select('preparaduria.numero','escuela.nombre as escuela','preparaduria.observacion','rutasp.*','dependencia.nombre_dependencia','estados.id_estados','estados.nombre','asignatura.nombre as materia','users.nombres','users.apellidos','dependencias.nombre as dependencia')
                ->join('preparaduria','rutasp.id_preparaduria','=','preparaduria.id_preparaduria')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('estados','rutasp.id_estado','=','estados.id_estados')
                ->join('users','rutasp.id_user','=','users.id')
                ->join('dependencia','users.id_dependencia','=','dependencia.id_dependencia')
                ->join('dependencias','dependencia.id_dependencia','=','dependencias.id_departamento')
                ->join('escuela','dependencia.id_escuela','=','dependencia.id_escuela')
                ->where ('dependencias.id_dependencias','9')
                ->where ('escuela.id_escuela',$Escuela)
                ->where('rutasp.id_preparaduria',$id)
                ->orderBy('rutasp.fecha', 'asc')->get();
$Horario = Horario::select('asignatura.nombre')->join('asignatura','horario.id_asignatura','=','asignatura.id_asignatura')
                ->join('preparaduria','horario.id_preparaduria','=','preparaduria.id_preparaduria')
                ->join('periodo','preparaduria.id_periodo','=','periodo.id_periodo')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->get();
        $Asignado=AsignarAulas::select('aula.nombre','asignar_aula.*')->join('aula','asignar_aula.id_aula','=','aula.id_aula')->get();
        
        return view('ubicacionpreparaduria/show')->with(['data'=>$data,'Horario'=>$Horario,'Asignado'=>$Asignado]);
    }

}
