<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ConcursoPreparador;
use App\Horario;
use App\Aulas;
use App\Asignaturas;
use App\Plazas;
use App\Concursos;
use App\AsignarAulas;
use App\RutasP;
use App\Preparadurias;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use DB;
use Auth;
use  PDF;
use Illuminate\Support\Facades\Input;
class HorarioController extends Controller
{
    public function index()
    {
          $data=ConcursoPreparador::select('preparaduria.id_preparaduria','users.nombres','users.apellidos','concurso_preparador.puntaje','concurso_preparador.condicion')
                ->join('preparaduria','concurso_preparador.id_preparaduria','preparaduria.id_preparaduria')
                ->join('estudiante','preparaduria.id_estudiante','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','users.id')
                ->where('concurso_preparador.id_periodo','1')
                ->where('concurso_preparador.plaza','1')  
                ->orderby('concurso_preparador.puntaje','desc')  
                ->get();
        return view('horario/index')->with(['data'=>$data]);
    }
    public function create($id)
    {
        $Concurso=Concursos::where('id_periodo','1')->paginate(10);
        $Aula=Aulas::orderby('nombre','asc')->pluck('nombre','id_aula');
        $Asignatura= Asignaturas::join('plazas','asignatura.id_asignatura','=','plazas.id_asignatura')->where('plazas.id_concurso',$Concurso[0]['attributes']['id_concurso'])->where('plazas.asignado','0')->orderby('nombre','asc')->pluck('nombre','asignatura.id_asignatura');
        return view('horario/create')->with(['Asignatura'=>$Asignatura,'Aula'=>$Aula,'id'=>$id]);
        
    }
    public function CargarHorario(Request $request)
    {
        if( $request->id_aula_4!=""){
           $rules = array(
            'id_asignatura'=> 'required',
            'id_aula_1'=> 'required',
            'dia_1'=> 'required',
            'hora_entrada_1'=> 'required',
            'hora_salida_1'=> 'required',
            'id_aula_2'=> 'required',
            'dia_2'=> 'required',
            'hora_entrada_2'=> 'required',
            'hora_salida_2'=> 'required',
            'id_aula_3'=> 'required',
            'dia_3'=> 'required',
            'hora_entrada_3'=> 'required',
            'hora_salida_3'=> 'required',
            'id_aula_4'=> 'required',
            'dia_4'=> 'required',
            'hora_entrada_4'=> 'required',
            'hora_salida_4'=> 'required',
            
            );    
        $mensajes=array(
            'id_asignatura.required'=>'La Asignatura a Dar Es Obligatoria',
            'id_aula_1.required' => 'El Aula Para el Dia N°1 Es Obligatoria',
            'dia_1.required'=>'El Dia N°1 Es  Obligatorio',
            'hora_entrada_1.required'=>'La Hora de Entrada Es  Obligatoria',
            'hora_salidad_1.required'=>'La Hora de Salida Es  Obligatoria',
            'id_aula_2.required' => 'El Aula Para el Dia N°2 Es Obligatoria',
            'dia_2.required'=>'El Dia N°2 Es  Obligatorio',
            'hora_entrada_2.required'=>'La Hora de Entrada Es  Obligatoria',
            'hora_salidad_2.required'=>'La Hora de Salida Es  Obligatoria',
            'id_aula_3.required' => 'El Aula Para el Dia N°3 Es Obligatoria',
            'dia_3.required'=>'El Dia N°3 Es  Obligatorio',
            'hora_entrada_3.required'=>'La Hora de Entrada Es  Obligatoria',
            'hora_salidad_3.required'=>'La Hora de Salida Es  Obligatoria',
            'id_aula_4.required' => 'El Aula Para el Dia N°4 Es Obligatoria',
            'dia_4.required'=>'El Dia N°4 Es  Obligatorio',
            'hora_entrada_4.required'=>'La Hora de Entrada Es  Obligatoria',
            'hora_salidad_4.required'=>'La Hora de Salida Es  Obligatoria',
            
            );     
            }
            else{
         $rules = array(
            'id_asignatura'=> 'required',
            'id_aula_1'=> 'required',
            'dia_1'=> 'required',
            'hora_entrada_1'=> 'required',
            'hora_salida_1'=> 'required',
            'id_aula_2'=> 'required',
            'dia_2'=> 'required',
            'hora_entrada_2'=> 'required',
            'hora_salida_2'=> 'required',
            'id_aula_3'=> 'required',
            'dia_3'=> 'required',
            'hora_entrada_3'=> 'required',
            'hora_salida_3'=> 'required',
            );    
        $mensajes=array(
            'id_asignatura.required'=>'La Asignatura a Dar Es Obligatoria',
            'id_aula_1.required' => 'El Aula Para el Dia N°1 Es Obligatoria',
            'dia_1.required'=>'El Dia N°1 Es  Obligatorio',
            'hora_entrada_1.required'=>'La Hora de Entrada Es  Obligatoria',
            'hora_salidad_1.required'=>'La Hora de Salida Es  Obligatoria',
            'id_aula_2.required' => 'El Aula Para el Dia N°2 Es Obligatoria',
            'dia_2.required'=>'El Dia N°2 Es  Obligatorio',
            'hora_entrada_2.required'=>'La Hora de Entrada Es  Obligatoria',
            'hora_salidad_2.required'=>'La Hora de Salida Es  Obligatoria',
            'id_aula_3.required' => 'El Aula Para el Dia N°3 Es Obligatoria',
            'dia_3.required'=>'El Dia N°3 Es  Obligatorio',
            'hora_entrada_3.required'=>'La Hora de Entrada Es  Obligatoria',
            'hora_salidad_3.required'=>'La Hora de Salida Es  Obligatoria',
            
            );       
            }
          
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        { 
           DB::beginTransaction();
           $Horario=new Horario();
           $Horario->id_preparaduria=$request->id_preparaduria;
           $Horario->id_asignatura=$request->id_asignatura;
           $Horario->save();
           $AsingarAulas=new AsignarAulas();
           $AsingarAulas->id_horario=$Horario->id_horario;
           $AsingarAulas->id_aula=$request->id_aula_1;
           $AsingarAulas->dia=$request->dia_1;
           $AsingarAulas->entrada=substr($request->hora_entrada_1,0,5);
           $AsingarAulas->salida=substr($request->hora_salida_1,0,5);
           $AsingarAulas->save();
           $AsingarAu=new AsignarAulas();
           $AsingarAu->id_horario=$Horario->id_horario;
           $AsingarAu->id_aula=$request->id_aula_2;
           $AsingarAu->dia=$request->dia_2;
           $AsingarAu->entrada=substr($request->hora_entrada_2,0,5);
           $AsingarAu->salida=substr($request->hora_salida_2,0,5);
           $AsingarAu->save();
           $AsingarAul=new AsignarAulas();
           $AsingarAul->id_horario=$Horario->id_horario;
           $AsingarAul->id_aula=$request->id_aula_3;
           $AsingarAul->dia=$request->dia_3;
           $AsingarAul->entrada=substr($request->hora_entrada_3,0,5);
           $AsingarAul->salida=substr($request->hora_salida_3,0,5);
           $AsingarAul->save();
           if( $request->id_aula_4!="")
           {
            $AsingarAula=new AsignarAulas();
            $AsingarAula->id_horario=$Horario->id_horario;
            $AsingarAula->id_aula=$request->id_aula_4;
            $AsingarAula->dia=$request->dia_4;
            $AsingarAula->entrada=substr($request->hora_entrada_4,0,5);
            $AsingarAula->salida=substr($request->hora_salida_4,0,5);
            $AsingarAula->save();
           }
           $RutasP=new RutasP;
           $RutasP->id_estado='15';
           $RutasP->id_preparaduria=$request->id_preparaduria;
           $RutasP->id_dependencia=Auth::User()->id_dependencia;
           $RutasP->id_user=Auth::user()->id;
           $RutasP->fecha=date('Y-m-d');
           $RutasP->save();
           Plazas::where('id_asignatura',$request->id_asignatura)->update(['asignado' => '1']);
           Preparadurias::where('id_preparaduria',$request->id_preparaduria)->update(['id_estados' => '15']);
           ConcursoPreparador::where('id_preparaduria',$request->id_preparaduria)->update(['plaza' =>'2']);
           DB::commit(); 
           $success=array('success'=>true,'mensaje'=>'Horario Asignado Con Exito!!');
           return response()->json($success);
        }
    }
     public function HorarioClases(Request $request)
    {
        $Periodo= \App\Periodos::where('id_periodo','1')->get(); 
        $Horario = Horario::select('users.nombres','users.apellidos','asignatura.nombre','periodo.nombre as periodo')->join('asignatura','horario.id_asignatura','=','asignatura.id_asignatura')
                ->join('preparaduria','horario.id_preparaduria','=','preparaduria.id_preparaduria')
                ->join('periodo','preparaduria.id_periodo','=','periodo.id_periodo')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->get();
        $Asignado=AsignarAulas::select('aula.nombre','asignar_aula.*')->join('aula','asignar_aula.id_aula','=','aula.id_aula')->get();
        view()->share(['Horario'=>$Horario,'Asignado'=>$Asignado,'Periodo'=>$Periodo]);//VARIABLE GLOBAL PRODUCTOS
        if($request->has('descargar'))
        {
            $pdf = PDF::loadView('vista-html-pdf-horario');//CARGO LA VISTA
            $pdf->output();
            $filename = 'horarioclases.pdf';
            return $pdf->stream($filename, array('Attachment' => false)); 
        }
    }
}
