<?php
namespace App\Http\Controllers;
use App\Concursos;
use App\ConcursoPreparador;
use App\Preparadurias;
use App\factores;
use App\Plazas;
use App\Periodos;
use App\Asignaturas;
use App\RutasP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use DB;
use  PDF;
use Auth;
use Illuminate\Support\Facades\Input;
class ConcursoController extends Controller
{
    public function index()
    {
        $data=Concursos::select('periodo.nombre','concurso.id_concurso','concurso.id_estados','concurso.fecha_apertura','concurso.fecha_cierre','concurso.cupo_asignado','concurso.limite')
                ->join('periodo','concurso.id_periodo','periodo.id_periodo')
                ->where('concurso.id_periodo','1')
                ->get();
        if($data=="[]")
            $Total=0;
        else
            $Total=count($data);
        return view('preparaduriaconcurso/index')->with(['data'=>$data,'Total'=>$Total]);
    }
    public function create()
    {
      $Asignatura= Asignaturas::where('id_asignatura','<','29')->where('id_asignatura','!=','1')->where('id_asignatura','!=','4')->where('id_asignatura','!=','5')->where('id_asignatura','!=','6')->where('id_asignatura','!=','10')->where('id_asignatura','!=','11')->where('id_asignatura','!=','13')->where('id_asignatura','!=','15')->pluck('nombre','id_asignatura');
      $Periodo= Periodos::pluck('nombre','id_periodo');
      return view('preparaduriaconcurso/create')->with(['Periodo'=>$Periodo,'Asignatura'=>$Asignatura]);
    }
    public function AperturarPreparaduria(Request $request)
    {
        $rules = array(
            'id_periodo' => 'required',
            'limite' => 'required',
            'fecha_apertura' => 'required',
            'fecha_cierre' => 'required',
            'asignaturas' => 'required',
        );    
        $mensajes=array(
            'id_periodo.required'=>'El Periodo Academico  Es Obligatoria',
            'limite.required' => 'La cantidad de Plazas es Obligatorias',
            'fecha_apertura.required'=>'La fecha de apertura Es  Obligatorio',
            'fecha_cierre.required'=>'La fecha de cierre Es  Obligatoria',
            'asignaturas.required'=>'Las Plazas o Asignaturas para el concurso son Obligatorias',
            ); 
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
            DB::beginTransaction();
            //$acronimo=substr($Dependencias[0]['attributes']['nombre_dependencia'],0,1).''.substr($Dependencias[0]['attributes']['nombre_dependencia'],16,1).'-'.$numero.'/'.$year;
            $Concurso = new Concursos();
            $Concurso->id_estados='13';
            $Concurso->id_periodo=$request->id_periodo;
            $Concurso->fecha_apertura=substr($request->fecha_apertura,6,10).'-'.substr($request->fecha_apertura,0,2).'-'.substr($request->fecha_apertura,3,2);
            $Concurso->fecha_cierre=substr($request->fecha_cierre,6,10).'-'.substr($request->fecha_cierre,0,2).'-'.substr($request->fecha_cierre,3,2);
            $Concurso->limite=$request->limite;
            $Concurso->cupo_asignado=0;
            $Concurso->save();
            $data=json_decode($request->asignaturas,true);
            foreach ($data as $row)
            {  
                $Plaza= new Plazas();
                $Plaza->id_concurso=$Concurso->id_concurso;
                $Plaza->id_asignatura=$row;
                $Plaza->asignado='0';
                $Plaza->save();        
            }
            DB::commit();           
            $success=array('success'=>true,'mensaje'=>'Aperturado con Exito El Concurso de Preparadores!!');
            return response()->json($success);
           
        }
    }
      public function Requisitos(Request $request)
    {
        $data=Concursos::select('periodo.nombre')
                ->join('periodo','concurso.id_periodo','periodo.id_periodo')
                ->where('concurso.id_concurso',$request->id_concurso)
                ->get();
          //view()->share(['data'=>$data]);//VARIABLE GLOBAL PRODUCTOS

                
$Plazas=Plazas::select('asignatura.nombre as asignatura')->join('asignatura','plazas.id_asignatura','=','asignatura.id_asignatura')
                ->join('concurso','plazas.id_concurso','=','concurso.id_concurso')
                ->where('concurso.id_concurso',$request->id_concurso)
                ->orderby('asignatura.nombre','asc')
                ->get();
          view()->share(['data'=>$data,'Plazas'=>$Plazas]);//VARIABLE GLOBAL PRODUCTOS


     if($request->has('descargar')){
           $pdf = PDF::loadView('vista-html-requisitos-pdf');//CARGO LA VISTA
           $pdf->output();
           $filename = 'requisitos.pdf';
           return $pdf->stream($filename, array('Attachment' => false)); 
            
        }
        
        return view('vista-html-requisitos-pdf');//RETORNO A MI VISTA
    } 
     public function Plazas(Request $request)
    {
        $data=Concursos::select('periodo.nombre')
                ->join('periodo','concurso.id_periodo','periodo.id_periodo')
                ->where('concurso.id_concurso',$request->id_concurso)
                ->get();
        $Plazas=Plazas::select('asignatura.nombre as asignatura')->join('asignatura','plazas.id_asignatura','=','asignatura.id_asignatura')
                ->join('concurso','plazas.id_concurso','=','concurso.id_concurso')
                ->where('concurso.id_concurso',$request->id_concurso)
                ->orderby('asignatura.nombre','asc')
                ->get();
          view()->share(['data'=>$data,'Plazas'=>$Plazas]);//VARIABLE GLOBAL PRODUCTOS
     if($request->has('descargar')){
           $pdf = PDF::loadView('vista-html-plaza-pdf');//CARGO LA VISTA
           $pdf->output();
           $filename = 'plazas.pdf';
           return $pdf->stream($filename, array('Attachment' => false)); 
            
        }
        
        return view('vista-html-plaza-pdf');//RETORNO A MI VISTA
    } 
    public function cerrar(){
        Concursos::where('id_periodo','1')->update(['id_estados' =>'14']);
        $factor=factores::where('id_periodo','1')->orderby('f10','desc')->get();
        $concursos=Concursos::where('id_periodo','1')->get();
        $n=$concursos[0]['attributes']['limite'];
        for($i=0;$i<$n;$i++)
        { 
                $j=$i+1;
                factores::where('id_preparaduria',$factor[$i]['attributes']['id_preparaduria'])->update(['lugar' =>$j++,'aprobado'=>'1']);
                ConcursoPreparador::where('id_preparaduria',$factor[$i]['attributes']['id_preparaduria'])->update(['aprobado'=>'1']);
        }
        $factorx=factores::where('id_periodo','1')->where('lugar','!=','0')->orderby('f10','desc')->get();
        $x=factores::where('lugar','0')->orderby('f10','desc')->get();
        $Lugar=count($factorx);
        for($i=0;$i<count($x);$i++)
        {
            $p=$i+1;
            $Posicion=$Lugar+$p;
            factores::where('id_preparaduria',$x[$i]['attributes']['id_preparaduria'])->update(['lugar' =>$Posicion++]);
            Preparadurias::where('id_preparaduria',$x[$i]['attributes']['id_preparaduria'])->update(['id_estados' =>'16']);
            $xp=factores::where('id_preparaduria',$x[$i]['attributes']['id_preparaduria'])->get();
            $pos=$factor[0]['attributes']['lugar'];
			Preparadurias::where('id_estados','16')->update(['observacion'=>'Su solicitud fue rechazada por la Comision de Preparadurias la comision asingo la cantidad de  '.$pos.' plazas para su departamento y usted no quedo seleccionado ya que quedo en la '.$pos. ' Posición']);
           $RutasP=new RutasP;
        $RutasP->id_estado='16';
        $RutasP->id_preparaduria=$x[$i]['attributes']['id_preparaduria'];
        $RutasP->id_dependencia=Auth::user()->id_dependencia;
        $RutasP->id_user=Auth::user()->id;
        $RutasP->fecha=date('Y-m-d');
        $RutasP->save(); 
        }
        return redirect()->back();    
    }
}