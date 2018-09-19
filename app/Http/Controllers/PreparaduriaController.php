<?php
namespace App\Http\Controllers;
use App\Asignaturas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Estudiante;
use App\RutasP;
use App\PreparaduriaAsignaturasCursando;
use App\Preparadurias;
use App\User;
use App\Dependencia;
use App\Dependencias;
use App\Escuela;
use App\Sellos;
use App\Profesor;
use App\Documento;
use App\Oficio;
use App\RutaOficio;
use App\ConcursoPreparador;
use App\SellosEscuelas;
use App\Periodos;
use App\Semestre;
use App\Concursos;
use App\OficioCopia;
use App\OficioContratacionPreparador;
use App\factores;
use Auth;
use  PDF;
use Illuminate\Support\Facades\Input;

class PreparaduriaController extends Controller
{
     private $dir_tmp;
    private $dir_mark;
    private $tipo_validos;
    public function __construct() 
    { $this->middleware('auth');
        //inicializar las variables de configuracion
        $this->dir_tmp=env('TMP_DIR');
        $this->dir_mark=env('URL_MARKS');
        $this->tipo_validos=env('FORMAT_IMG');
        //verificar si el directorio existes
        if(!is_dir($this->dir_mark))
        {
            //crear el directorio
            mkdir($this->dir_mark,0777);
            chmod($this->dir_mark,0777);
        }
    }
    public function index(){
       $datas=Concursos::where('id_periodo','1')->paginate(10);
       $x=count($datas[0]['attributes']);
       if($x>0)
       {  $x=1;}  
       else
       {$x=0;}
        if(Auth::User()->id_perfil==5)
        {
            
           /*  $Asignatura= Asignaturas::join('plazas','asignatura.id_asignatura','=','plazas.id_asignatura')->where('plazas.id_concurso',$datas[0]['attributes']['id_concurso'])->orderby('nombre','asc')->get();
            // print_r($Asignatura);
                $x1=count($Asignatura);*/
                //echo "string".$x1;

            $data=Preparadurias::select('users.nombres','users.apellidos','escuela.nombre as escuela','dependencia.nombre_dependencia','preparaduria.*','asignatura.nombre')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->join('dependencia','estudiante.id_dependencia','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->where('users.id',Auth::User()->id)    
                ->paginate(10);

               $x2=0;     
            // if($x1==1)
             //{
                //$id_asig=$Asignatura[0]['attributes']['id_asignatura'];
                //echo $id_asig;die();
                $data1=Preparadurias::select('users.nombres','users.apellidos','escuela.nombre as escuela','dependencia.nombre_dependencia','preparaduria.*','asignatura.nombre')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->join('dependencia','estudiante.id_dependencia','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')

                ->where('users.id',Auth::User()->id)
                ->where('preparaduria.id_periodo',1)->get();    
            //    ->where('preparaduria.id_asignatura',Auth::User()->id)->get();    
                $x2=count($data1);
                 $x3=count($data);

              //}



        if ($x3==0) {
            
     //       $var2= new PreparaduriaController();
       // $var2->create();
   $Periodo=Periodos::pluck('nombre','id_periodo');
     $Semestre=Semestre::pluck('nombre','id_semestre');
     $Concurso=Concursos::where('id_periodo','1')->paginate(10);
     $Asignatura= Asignaturas::join('plazas','asignatura.id_asignatura','=','plazas.id_asignatura')->where('plazas.id_concurso',$Concurso[0]['attributes']['id_concurso'])->orderby('nombre','asc')->pluck('nombre','asignatura.id_asignatura');
     $Asignaturas= Asignaturas::pluck('nombre','id_asignatura as id_asignaturas');
     return view('preparaduria/create')->with(['Semestre'=>$Semestre,'Periodo'=>$Periodo,'Asignatura'=>$Asignatura,'Asignaturas'=>$Asignaturas]); 
       }


            
            $id_periodo=$data[0]['attributes']['id_periodo'];
        return view('preparaduria/index')->with(['datas'=>$datas,'data'=>$data,'x'=>$x,'id_periodo'=>$id_periodo,
        'x2'=>$x2]);

          
        }
        if(Auth::User()->id_perfil==6)
        { 
            
            $Preparaduria=Preparadurias::where('id_estados','<','9')->get();
            if($Preparaduria=="[]")
                $Total=0;
            else
                $Total=count($Preparaduria);

            $data= Preparadurias::select('users.nombres','users.apellidos','escuela.nombre as escuela','dependencia.nombre_dependencia','preparaduria.*','asignatura.nombre')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->join('dependencia','estudiante.id_dependencia','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->where('preparaduria.id_estados','!=','11')
                ->paginate(10);    
                        $id_periodo=$data[0]['attributes']['id_periodo'];
                   
             return view('preparaduria/index')->with(['datas'=>$datas,'data'=>$data,'x'=>$x,'Total'=>$Total,'id_periodo'=>$id_periodo,'x'=>$x]);

        }
        if(Auth::User()->id_perfil==4 || Auth::User()->id_perfil==7 || Auth::User()->id_perfil==2  )
        {
            if(Auth::User()->id_perfil==7)
            {
                $Preparaduria=Preparadurias::where('id_estados','!=','8')->get();
                $Preparadurias=Preparadurias::where('id_estados','<','9')->get();
                  
            }
            if(Auth::User()->id_perfil==2)
            {
                $Preparaduria=Preparadurias::where('id_estados','!=','12')->get();
              
            }
             if(Auth::User()->id_perfil==2)
            {
                $Preparadurias=Preparadurias::where('id_estados','<','9')->get();
              
            }
            if($Preparaduria=="[]")
                $Total=0;
            else
                $Total=count($Preparaduria);
            if($Preparadurias=="[]")
                $Totals=0;
            else
                $Totals=count($Preparadurias);
            $data= Preparadurias::select('users.nombres','users.apellidos','escuela.nombre as escuela','dependencia.nombre_dependencia','preparaduria.*','asignatura.nombre','dependencias.nombre as dep')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->join('dependencia','estudiante.id_dependencia','=','dependencia.id_dependencia')
                ->join('dependencias','dependencia.id_dependencia','=','dependencias.id_departamento')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->where('dependencias.id_departamento',Auth::User()->id_dependencia)  
                 ->where('dependencias.id_dependencias','9')      
                ->paginate(10);   
            
            
            $id_periodo=$data[0]['attributes']['id_periodo'];
            return view('preparaduria/index')->with(['datas'=>$datas,'data'=>$data,'Total'=>$Total,'Totals'=>$Totals,'x'=>$x,'id_periodo'=>$id_periodo]);

        }
     if(Auth::User()->id_perfil==1 )
        {
            $data= Preparadurias::select('users.nombres','users.apellidos','escuela.nombre as escuela','dependencia.nombre_dependencia','preparaduria.*','asignatura.nombre')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->join('dependencia','estudiante.id_dependencia','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')->paginate(10);    
                    return view('preparaduria/index')->with(['data'=>$data,'x'=>$x]);

        }
		if(Auth::User()->id_perfil==3 )
        {
            $data= Preparadurias::select('users.nombres','users.apellidos','escuela.nombre as escuela','dependencia.nombre_dependencia','preparaduria.*','asignatura.nombre')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('users','estudiante.id_user','=','users.id')
                ->join('dependencia','estudiante.id_dependencia','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')->paginate(10);    
                    return view('preparaduria/index')->with(['datas'=>$datas,'data'=>$data,'x'=>$x]);

        }
    }
    public function create(){
     $Periodo=Periodos::pluck('nombre','id_periodo');
     $Semestre=Semestre::pluck('nombre','id_semestre');
     $Concurso=Concursos::where('id_periodo','1')->paginate(10);
     $Asignatura= Asignaturas::join('plazas','asignatura.id_asignatura','=','plazas.id_asignatura')->where('plazas.id_concurso',$Concurso[0]['attributes']['id_concurso'])->orderby('nombre','asc')->pluck('nombre','asignatura.id_asignatura');
     $Asignaturas= Asignaturas::pluck('nombre','id_asignatura as id_asignaturas');
     return view('preparaduria/create')->with(['Semestre'=>$Semestre,'Periodo'=>$Periodo,'Asignatura'=>$Asignatura,'Asignaturas'=>$Asignaturas]);
    }
    public function agregarPreparaduria(Request $request)
    {
        $rules = array(
            'semestre' => 'required',
            'credito' => 'required',
            'promedio' => 'required',
            'id_asignatura' => 'required',
            'asignaturas' => 'required',
            'nota' => 'required',
            'periodo' => 'required',
            'f2'=>'required', // Materias Aplazadas
            'f3'=>'required', // N° de Sem Como Preparador
            'f4'=>'required', // N° de Articulos Publicados
            'f5'=>'required', // N° de Trabajos Cientificos
            'f6'=>'required', // N° de Cursos Adicionales
            'f7'=>'required',// N° de Distinciones
            'imgRecord' =>'required|required_with:'.$this->tipo_validos,
            'imgInscripcion' =>'required|required_with:'.$this->tipo_validos,
            'imgEstudio' =>'required|required_with:'.$this->tipo_validos,
            'imgCurriculum' =>'required|required_with:'.$this->tipo_validos,

            );    
        $mensajes=array(
            'id_asignatura.required'=>'La Asignatura a Dar Es Obligatoria',
            'asignaturas.required' => 'Asignaturas a Cursar Son Obligatorias',
            'semestre.required'=>'El Semestre a Cursar Es  Obligatorio',
            'credito.required'=>'El Numero de Creditos Aprobados Es  Obligatoria',
            'promedio.required'=>'El Promedio General Es  Obligatoria',
            'periodo.required'=>'El Periodo Academico Es  Obligatoria',
            'nota.required'=>'La Nota con que aprobo Es  Obligatoria',
            'f2.required'=>'Las Materias Aplazadas es Obligatorio',
            'f3.required'=>'El N° de Sem Como Preparador es Obligatorio',
            'f4.required'=>'El N° de Articulos Publicados es Obligatorio',
            'f5.required'=>'El N° de Trabajos Cientificos es Obligatorio',
            'f6.required'=>'El N° de Cursos Adicionales es Obligatorio',
            'f7.required'=>'El N° de Distinciones es Obligatorio',
            'imgRecord.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
            'imgInscripcion.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
            'imgEstudio.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
            'imgCurriculum.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
            'imgRecord.required'=>'El Record es Obligatoria',
             'imgInscripcion.required'=>'La Constancia de Inscripcion es Obligatoria',
             'imgEstudio.required'=>'El Horario es Obligatoria',
            'imgCurriculum.required'=>'El Curriculum es Obligatoria',
            ); 
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
            DB::beginTransaction();
            $year=date('Y');
            $Estudiante= Estudiante::where('id_user',Auth::user()->id)->get();
            $SolicitudPreparador=Preparadurias::where('id_estudiante',$Estudiante[0]['attributes']['id_estudiante'])->where('id_periodo',$request->periodo)->get();
            $Concurso=Concursos::where('id_periodo',$request->periodo)->get();
            $Solicitado=count($SolicitudPreparador);
            if($Solicitado>0){
                    $success=array('success'=>true,'mensaje'=>'El Bachiller: '.Auth::user()->nombres.''.Auth::user()->apellidos.' Ya realizo una Solicitud de Preparaduria en el Periodo Academico:'.$request->periodo);
                    return response()->json($success);
            }
            else
            {
            
                $Verificar=Preparadurias::select('preparaduria.numero')->where('preparaduria.anio',$year)->get()->toArray();
                $Total=count($Verificar);
                if($Total>0)
                {   
                    $numero=$Total+1;
                    $Estudiante= Estudiante::where('id_user',Auth::user()->id)->get();
                    $Preparaduria = new Preparadurias();
                    $Preparaduria->id_concurso=$Concurso[0]['attributes']['id_concurso'];
                    $Preparaduria->id_estudiante=$Estudiante[0]['attributes']['id_estudiante'];
                    $Preparaduria->id_asignatura=$request->id_asignatura;
                    $Preparaduria->semestre=$request->semestre;
                    $Preparaduria->f2=$request->f2;
                    $Preparaduria->f3=$request->f3;
                    $Preparaduria->f4=$request->f4;
                    $Preparaduria->f5=$request->f5;
                    $Preparaduria->f6=$request->f6;
                    $Preparaduria->f7=$request->f7;
                    $Preparaduria->condicion=$request->condicion;
                    $Preparaduria->creditos_aprobados=$request->credito;
                    $Preparaduria->promedio_general=str_replace(',','.',$request->promedio);
                    $Preparaduria->id_estados="1"; // creado
                    $Preparaduria->nota=str_replace(',','.',$request->nota);
                    $Preparaduria->id_periodo=$request->periodo;
                    $Preparaduria->numero=$numero;
                    $Preparaduria->anio=$year;
                    $Preparaduria->record=$request->imgRecord; 
                    $Preparaduria->inscripcion=$request->imgInscripcion; 
                    $Preparaduria->horario=$request->imgEstudio; 
                    $Preparaduria->curriculum=$request->imgCurriculum; 
                    $Preparaduria->observacion="creada";
                    $Preparaduria->save();
                    $data=json_decode($request->asignaturas,true);
                    foreach ($data as $row)
                    {   
                        $PreparaduriaAsignaturasCursando=new PreparaduriaAsignaturasCursando();
                        $PreparaduriaAsignaturasCursando->id_preparaduria=$Preparaduria->id_preparaduria;
                        $PreparaduriaAsignaturasCursando->id_asignatura=$row;
                        $PreparaduriaAsignaturasCursando->save();
                    } 
                    $RutasP=new RutasP;
                    $RutasP->id_estado=$Preparaduria->id_estados;
                    $RutasP->id_preparaduria=$Preparaduria->id_preparaduria;
                    $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
                    $RutasP->id_user=Auth::user()->id;
                    $RutasP->fecha=date('Y-m-d');
                    $RutasP->save();
                    DB::commit();
                    $success=array('success'=>true,'mensaje'=>'Solicitud de Preparaduria Creado con Exito!!');
                    return response()->json($success);

                }
                else{
                    $numero=1;
                    $Estudiante= Estudiante::where('id_user',Auth::user()->id)->get();
                    $Preparaduria = new Preparadurias();
                    $Preparaduria->id_concurso=$Concurso[0]['attributes']['id_concurso'];
                    $Preparaduria->id_estudiante=$Estudiante[0]['attributes']['id_estudiante'];
                    $Preparaduria->id_asignatura=$request->id_asignatura;
                    $Preparaduria->semestre=$request->semestre;
                    $Preparaduria->creditos_aprobados=$request->credito;
                    $Preparaduria->promedio_general=str_replace(',','.',$request->promedio);
                    $Preparaduria->id_estados="1";
                    $Preparaduria->nota=str_replace(',','.',$request->nota);
                    $Preparaduria->id_periodo=$request->periodo;
                     $Preparaduria->f2=$request->f2;
                    $Preparaduria->f3=$request->f3;
                    $Preparaduria->f4=$request->f4;
                    $Preparaduria->f5=$request->f5;
                    $Preparaduria->f6=$request->f6;
                    $Preparaduria->f7=$request->f7;
                    $Preparaduria->condicion=$request->condicion;
                    $Preparaduria->numero=$numero;
                    $Preparaduria->anio=$year;
                    $Preparaduria->record=$request->imgRecord; 
                    $Preparaduria->inscripcion=$request->imgInscripcion; 
                    $Preparaduria->horario=$request->imgEstudio; 
                    $Preparaduria->curriculum=$request->imgCurriculum; 
                    $Preparaduria->observacion="creada";
                    $Preparaduria->save();
                    $data=json_decode($request->asignaturas,true);
                    foreach ($data as $row)
                    {   
                        $PreparaduriaAsignaturasCursando=new PreparaduriaAsignaturasCursando();
                        $PreparaduriaAsignaturasCursando->id_preparaduria=$Preparaduria->id_preparaduria;
                        $PreparaduriaAsignaturasCursando->id_asignatura=$row;
                        $PreparaduriaAsignaturasCursando->save();
                    } 
                    $RutasP=new RutasP;
                    $RutasP->id_estado=$Preparaduria->id_estados;
                    $RutasP->id_preparaduria=$Preparaduria->id_preparaduria;
                    $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
                    $RutasP->id_user=Auth::user()->id;
                    $RutasP->fecha=date('Y-m-d');
                    $RutasP->save();
                    rename($this->dir_tmp.'/'.$request->imgRecord, ($this->dir_mark.'/'.$request->imgRecord));
                    rename($this->dir_tmp.'/'.$request->imgInscripcion, ($this->dir_mark.'/'.$request->imgInscripcion));
                    rename($this->dir_tmp.'/'.$request->imgEstudio, ($this->dir_mark.'/'.$request->imgEstudio));
                    DB::commit();
                    $success=array('success'=>true,'mensaje'=>'Solicitud de Preparaduria Creado con Exito!!');
                    return response()->json($success);
                }
            }
        }    
    }
    public function EntregarSolicitud()
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Concurso= ConcursoPreparador::where('aprobado','1')->get();
        foreach ($Concurso as $row)
        { 
            $id_user=$row['attributes']['id_user'];
            $Estudiante= Estudiante::where('id_user',$id_user)->get();
            $Preparador= Preparadurias::where('id_estudiante',$Estudiante[0]['attributes']['id_estudiante'])->get();
            $RutasP=new RutasP;
            $RutasP->id_estado='9';
            $RutasP->id_preparaduria=$Preparador[0]['attributes']['id_preparaduria'];
            $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
            $RutasP->id_user=Auth::User()->id;
            $RutasP->fecha=date('Y-m-d');
            $RutasP->save();
            $Dependencia=Dependencia::where('id_dependencia',$RutasP->id_dependencia)->get();
            $NombreD=$Dependencia[0]['attributes']['nombre_dependencia'];
            Preparadurias::where('id_preparaduria',$Preparador[0]['attributes']['id_preparaduria'])->update(['id_estados' => '9']);
        } 
        $JobSchool= User::where('id_perfil','2')->get();
        $Secretaria= User::where('id_dependencia',$RutasP->id_dependencia)->where('id',$Estudiante[0]['attributes']['id_user'])->get();
        $admin=$JobSchool[0]['attributes']['email'];
        $name=$JobSchool[0]['attributes']['email'];
        $fullname=$JobSchool[0]['attributes']['nombres'].' , '.$JobSchool[0]['attributes']['apellidos'];
        $name_secre=$Secretaria[0]['attributes']['email'];
        $email=env('MAIL_USERNAME');
        $Funciones->EnviarSolicitudJefeDpto($name,$fullname,$name_secre,$email,$admin,$NombreD);
        DB::commit();
        return redirect()->back();
        
    }
     public function RemitirSolicitud()
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $year=date('Y');
        $fecha=date('Y-m-d');
        $Profesor=Profesor::select('users.nombres','users.apellidos','users.sexo')->join('users','profesor.id_user','=','users.id')->where('profesor.id_dependencia',Auth::user()->id_dependencia)->where('users.id_perfil','2')->get();
        $Para=Profesor::select('users.id')->join('users','profesor.id_user','=','users.id')->where('users.id_perfil','6')->get();
        $Verificar=Documento::select('oficio.numero')->join('oficio','documento.id_documento','=','oficio.id_documento')->where('oficio.anio',$year)->where('oficio.id_dependencia',Auth::user()->id_dependencia)->get()->toArray();
        $Total=count($Verificar);
        $Sexo=$Profesor[0]['attributes']['sexo'];
        if($Sexo=='Femenino')
        {
            $de="PROFA. ". $Profesor[0]['attributes']['nombres'].' '.$Profesor[0]['attributes']['apellidos'];
        }
        if($Sexo=='Masculino')
        {
            $de="PROF. ". $Profesor[0]['attributes']['nombres'].' '.$Profesor[0]['attributes']['apellidos'];
        }
        $Dependencias=Dependencia::where('id_dependencia',Auth::user()->id_dependencia)->get();
        $codigo_documento_generado=time();
        $Documento = new Documento();
        $Documento->id_dependencia_c= Auth::user()->id_dependencia;
        $Documento->id_usuario=Auth::user()->id;
        $Documento->id_categoria='1';
        $Documento->id_subcategoria='3';
        $Documento->id_itemsubcategoria='9';
        $Documento->id_estados="12";
        $Documento->codigo_plantilla=$codigo_documento_generado;
        $Documento->descripcion_documento='Oficio de Concurso de Preparadores Docentes';
        $Documento->save();
        $Oficio=new Oficio();
        if($Total>0)
        {   
            $numero=$Total+1;
            $acronimo=substr($Dependencias[0]['attributes']['nombre_dependencia'],0,1).''.substr($Dependencias[0]['attributes']['nombre_dependencia'],16,1).'-'.$numero.'/'.$year;
            $Oficio->id_documento=$Documento->id_documento;
            $Oficio->id_categoria=$Documento->id_categoria;
            $Oficio->id_subcategoria=$Documento->id_subcategoria;
            $Oficio->id_itemsubcategoria=$Documento->id_itemsubcategoria;
            $Oficio->id_estados="12";
            $Oficio->id_dependencia=Auth::user()->id_dependencia;
            $Oficio->id_user=Auth::user()->id;
            $Oficio->id_para_user=$Para[0]['attributes']['id'];
            $Oficio->numero=$numero;
            $Oficio->anio=$year;
            $Oficio->acronimo=$acronimo;
            $Oficio->nota="Oficio de Concurso de Preparadores";
            $Oficio->de=" ";
            $Oficio->cuerpo="Oficio de Concurso de Preparadores";
            $Oficio->fecha=$fecha;
            $Oficio->save();
            $RutaOficio=new RutaOficio();
            $RutaOficio->id_estado='1';
            $RutaOficio->id_oficio=$Oficio->id_oficio;
            $RutaOficio->id_dependencia=$Oficio->id_dependencia;
            $RutaOficio->id_user=Auth::user()->id;
            $RutaOficio->fecha=date('Y-m-d');
            $RutaOficio->save();
            $RutaOficio=new RutaOficio();
            $RutaOficio->id_estado=$Oficio->id_estados;
            $RutaOficio->id_oficio=$Oficio->id_oficio;
            $RutaOficio->id_dependencia=$Oficio->id_dependencia;
            $RutaOficio->id_user=Auth::user()->id;
            $RutaOficio->fecha=date('Y-m-d');
            $RutaOficio->save();
        }
        else
        if($Total==0)
        {   
            $numero=1;
            $acronimo=substr($Dependencias[0]['attributes']['nombre_dependencia'],0,1).''.substr($Dependencias[0]['attributes']['nombre_dependencia'],16,1).'-'.$numero.'/'.$year;
            $Oficio->id_documento=$Documento->id_documento;
            $Oficio->id_categoria=$Documento->id_categoria;
            $Oficio->id_subcategoria=$Documento->id_subcategoria;
            $Oficio->id_itemsubcategoria=$Documento->id_itemsubcategoria;
            $Oficio->id_estados="12";
            $Oficio->id_dependencia=Auth::user()->id_dependencia;
            $Oficio->id_user=Auth::user()->id;
            $Oficio->id_para_user=$Para[0]['attributes']['id'];
            $Oficio->numero=$numero;
            $Oficio->anio=$year;
            $Oficio->acronimo=$acronimo;
            $Oficio->fecha=$fecha;
            $Oficio->nota="Oficio de Concurso de Preparadores";
            $Oficio->de=" ";
            $Oficio->cuerpo="Oficio de Concurso de Preparadores";
            $Oficio->save();
            $RutaOficio=new RutaOficio();
            $RutaOficio->id_estado='1';
            $RutaOficio->id_oficio=$Oficio->id_oficio;
            $RutaOficio->id_dependencia=$Oficio->id_dependencia;
            $RutaOficio->id_user=Auth::user()->id;
            $RutaOficio->fecha=date('Y-m-d');
            $RutaOficio->save();
            $RutaOficio=new RutaOficio();
            $RutaOficio->id_estado=$Oficio->id_estados;
            $RutaOficio->id_oficio=$Oficio->id_oficio;
            $RutaOficio->id_dependencia=$Oficio->id_dependencia;
            $RutaOficio->id_user=Auth::user()->id;
            $RutaOficio->fecha=date('Y-m-d');
            $RutaOficio->save();
        }
	$Concurso= ConcursoPreparador::select('concurso_preparador.*')->join('preparaduria','concurso_preparador.id_preparaduria','=','preparaduria.id_preparaduria')->where('aprobado','1')->where('preparaduria.id_periodo','1')->get();
        foreach ($Concurso as $row)
        { 
            $id_user=$row['attributes']['id_user'];
            $Estudiante= Estudiante::where('id_user',$id_user)->get();
            $RutasP=new RutasP;
            $RutasP->id_estado='12';
            $RutasP->id_preparaduria=$row['attributes']['id_preparaduria'];
            $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
            $RutasP->id_user=Auth::User()->id;
            $RutasP->fecha=date('Y-m-d');
            $RutasP->save();
            $Dependencia=Dependencia::where('id_dependencia',$RutasP->id_dependencia)->get();
            $NombreD=$Dependencia[0]['attributes']['nombre_dependencia'];
            Preparadurias::where('id_preparaduria',$row['attributes']['id_preparaduria'])->update(['id_estados' => '12']);
        } 
//        $JobSchool= User::where('id_perfil','6')->get();
//        $Secretaria= User::where('id_dependencia',$RutasP->id_dependencia)->where('id',$Estudiante[0]['attributes']['id_user'])->get();
//        $admin=$JobSchool[0]['attributes']['email'];
//        $name=$JobSchool[0]['attributes']['email'];
//        $fullname=$JobSchool[0]['attributes']['nombres'].' , '.$JobSchool[0]['attributes']['apellidos'];
//        $name_secre=$Secretaria[0]['attributes']['email'];
//        $email=env('MAIL_USERNAME');
//        $Funciones->EnviarSolicitudJefeEscuela($name,$fullname,$name_secre,$email,$admin,$NombreD);
        DB::commit();
        return redirect()->back();
        
    }
    public function EnviarSolicitud($id)
    {
        DB::beginTransaction();
        $Estado=Preparadurias::where('id_preparaduria',$id)->get();
        $Estatus=$Estado[0]['attributes']['id_estados'];
        if($Estatus==10)
        { 
            $Funciones= new FuncionesController();
            $Estudiante= Estudiante::where('id_estudiante',$Estado[0]['attributes']['id_estudiante'])->get();
            $RutasP=new RutasP;
            $RutasP->id_estado='9';
            $RutasP->id_preparaduria=$id;
            $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
            $RutasP->id_user=Auth::User()->id;
            $RutasP->fecha=date('Y-m-d');
            $RutasP->save();
            $Dependencia=Dependencia::where('id_dependencia',$RutasP->id_dependencia)->get();
            $NombreD=$Dependencia[0]['attributes']['nombre_dependencia'];
            Preparadurias::where('id_preparaduria',$id)->update(['id_estados' => '9']);
            DB::commit();
            return redirect()->back();
        }
        else
        if($Estatus==1)
        {
            $Funciones= new FuncionesController();
            $Estudiante= Estudiante::where('id_user',Auth::user()->id)->get();
            $RutasP=new RutasP;
            $RutasP->id_estado='2';
            $RutasP->id_preparaduria=$id;
            $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
            $RutasP->id_user=Auth::user()->id;
            $RutasP->fecha=date('Y-m-d');
            $RutasP->save();
            Preparadurias::where('id_preparaduria',$id)->update(['id_estados' => '2']);
            $Job= User::where('id_dependencia',$RutasP->id_dependencia)->where('id_perfil','7')->get();
            $admin=$Job[0]['attributes']['email'];
            $name=$Job[0]['attributes']['email'];
            $fullname=$Job[0]['attributes']['nombres'].' , '.$Job[0]['attributes']['apellidos'];
            $email=env('MAIL_USERNAME');
            $numero=$Estado[0]['attributes']['numero'];
            $Funciones->EnviarSolicitud($name,$fullname,$email,$admin,$numero);
            DB::commit();
            return redirect()->back();
        }
    }
    public function vistaHTMLPDFPreparaduria(Request $request)
    {
    
      
        $preparaduria = Preparadurias::select('users.cedula','asignatura.codigo','preparaduria.numero','dependencia.id_dependencia','users.nombres','users.apellidos','preparaduria.semestre','preparaduria.nota',
                'periodo.nombre as periodo','preparaduria.creditos_aprobados','preparaduria.promedio_general','asignatura.codigo','asignatura.nombre','estudiante.firma')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('dependencia','dependencia.id_dependencia','=','estudiante.id_dependencia')
                ->join('users','estudiante.id_user','=','users.id')
                ->join('periodo','preparaduria.id_periodo','=','periodo.id_periodo')
                ->where('preparaduria.id_preparaduria',$request->id_preparaduria)
                ->get();//OBTENGO TODOS MIS PRODUCTO
        
        $materias = PreparaduriaAsignaturasCursando::select('asignatura.codigo','asignatura.nombre')
                ->join('asignatura','preparaduria_asignaturas_cursando.id_asignatura','=','asignatura.id_asignatura')
                ->where('preparaduria_asignaturas_cursando.id_preparaduria',$request->id_preparaduria)
                ->get();//OBTENGO TODOS MIS PRODUCTO
        $Profesor=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2')
                ->where('profesor.id_dependencia',$preparaduria[0]['attributes']['id_dependencia'])
                ->get();
        $UserJobDep=User::select('nombres','apellidos','sexo')->where('id',$Profesor[0]['attributes']['id_user'])->get();
        $Dependencia=Dependencia::select('nombre_dependencia','id_escuela')->where('id_dependencia',$preparaduria[0]['attributes']['id_dependencia'])->get();
        $Escuela=Escuela::select('nombre')->where('id_escuela',$Dependencia[0]['attributes']['id_escuela'])->get();
        view()->share(['Dependencia'=>$Dependencia,'Escuela'=>$Escuela,'preparaduria'=>$preparaduria,
            'UserJobDep'=>$UserJobDep,'materias'=>$materias,'Profesor'=>$Profesor]);//VARIABLE GLOBAL PRODUCTOS
        if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-preparaduria');//CARGO LA VISTA
          
           $pdf->output();
           $filename = 'preparaduria.pdf';
            return $pdf->stream($filename, array('Attachment' => false)); 
  
          //  return $pdf->download('preparaduria.pdf');//SUGERIR NOMBRE A DESCARGAR
        
            
        }else{
               $pdf = PDF::loadView('vista-html-pdf-preparaduria');//CARGO LA VISTA
          
          
              return view('vista-html-pdf-preparaduria');//RETORNO A MI VISTA
   
        }
        
    }     
    public function Visto($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Preparaduria=Preparadurias::where('id_preparaduria',$id)->get();
        $Estudiante= Estudiante::where('id_estudiante',$Preparaduria[0]['attributes']['id_estudiante'])->get();
        $RutasP=new RutasP;
        $RutasP->id_estado='3';
        $RutasP->id_preparaduria=$id;
        $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
        $RutasP->id_user=Auth::user()->id;
        $RutasP->fecha=date('Y-m-d');
        $RutasP->save();
        Preparadurias::where('id_preparaduria',$id)->update(['id_estados' => '3']);
        $Student= User::where('id_dependencia',$RutasP->id_dependencia)->where('id',$Estudiante[0]['attributes']['id_user'])->get();
        $Secretaria= User::where('id_dependencia',$RutasP->id_dependencia)->where('id_perfil','3')->get();
        $admin=$Student[0]['attributes']['email'];
        $name=$Student[0]['attributes']['email'];
        $fullname=$Student[0]['attributes']['nombres'].' , '.$Student[0]['attributes']['apellidos'];
        $name_secre=$Secretaria[0]['attributes']['email'];
        $email=env('MAIL_USERNAME');
        $Funciones->VistoSolicitud($name,$fullname,$name_secre,$email,$admin,$id);
        DB::commit();
      
        return redirect()->back();
    }
    public function Verificado (Request $request)
    { $rules = array(
            'f1' => 'required',
            'condicion' => 'required',
            );    
        $mensajes=array(
            'f1.required'=>'El Promedio Es Obligatoria',
            'condicion.required' => 'La Condición Es Obligatoria',
            ); 
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
            DB::beginTransaction();
            $Estudiante=Estudiante::where('id_user',$request->id_user)->get();
	    $Preparaduria=Preparadurias::where('id_estudiante',$Estudiante[0]['attributes']['id_estudiante'])->get();
	    $factores= new factores();
            $factores->id_user=$request->id_user;
            $factores->id_periodo=$Preparaduria[0]['attributes']['id_periodo'];
            $factores->id_preparaduria=$Preparaduria[0]['attributes']['id_preparaduria'];
           
            $factores->f1= str_replace(',','.',$request->f1);//ss$request->f1;
            $factores->f2=$request->f2*0.5;
            $f3=($request->f3*0.5);
            if($f3>2.5)
            {
                $f3=2.5;
            }    
            $factores->f3=$f3;
            $factores->f4=$request->f4*0.5;
            $factores->f5=$request->f5*0.25;
            $factores->f6=$request->f6*0.25;
            $f7=$request->f7*0.25;
            if($f7>1)
            {
                $f7=1;
            }
            $factores->f7=$f7;
            $f8=($factores->f1-$factores->f2) *0.7;
            $f9=($factores->f3+$factores->f4+$factores->f5+$factores->f6+$factores->f7)*0.3 ;
            $f8_r=round($f8, 2);
            $f9_r=round($f9, 2);
            $factores->f8=$f8_r;
            $factores->f9 =$f9_r;      
            $factores->f10 =$factores->f8+$factores->f9;
            $factores->lugar='0';
            $factores->aprobado='0';
            $factores->save();
            
            $ConcursoPreparador= new ConcursoPreparador ();
            $ConcursoPreparador->id_user=$request->id_user;
            $ConcursoPreparador->puntaje=$factores->f10;
            $ConcursoPreparador->id_periodo=$Preparaduria[0]['attributes']['id_periodo'];
            $ConcursoPreparador->id_preparaduria=$Preparaduria[0]['attributes']['id_preparaduria'];
            $ConcursoPreparador->condicion=$request->condicion;
            $ConcursoPreparador->plaza='0';
            $ConcursoPreparador->aprobado='0';
            $ConcursoPreparador->save();
            $Funciones= new FuncionesController();
            $Preparaduria=Preparadurias::where('id_preparaduria',$request->id)->get();
            $Estudiante= Estudiante::where('id_estudiante',$Preparaduria[0]['attributes']['id_estudiante'])->get();
            $RutasP=new RutasP;
            $RutasP->id_estado='8';
            $RutasP->id_preparaduria=$request->id;
            $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
            $RutasP->id_user=Auth::user()->id;
            $RutasP->fecha=date('Y-m-d');
            $RutasP->save();
            Preparadurias::where('id_preparaduria',$request->id)->update(['id_estados' => '8']);
            $Student= User::where('id_dependencia',$RutasP->id_dependencia)->where('id',$Estudiante[0]['attributes']['id_user'])->get();
            $Secretaria= User::where('id_dependencia',$RutasP->id_dependencia)->where('id_perfil','3')->get();
            $Dependencia=Dependencia::where('id_dependencia',$RutasP->id_dependencia)->get();
            $Escuela=Escuela::where('id_escuela',$Dependencia[0]['attributes']['id_escuela'])->get();
            $admin=$Student[0]['attributes']['email'];
            $name=$Student[0]['attributes']['email'];
            $fullname=$Student[0]['attributes']['nombres'].' , '.$Student[0]['attributes']['apellidos'];
            $name_secre=$Secretaria[0]['attributes']['email'];
            $email=env('MAIL_USERNAME');
            $escuela=$Escuela[0]['attributes']['nombre'];
            $numero=$Preparaduria[0]['attributes']['numero'];
            $Funciones->Verificado($name,$fullname,$name_secre,$email,$admin,$numero,$escuela);
            DB::commit();
            $success=array('success'=>true,'mensaje'=>'Solicitud de Preparaduria Evaluada y Verificada Con EXITO!!');
                    return response()->json($success);
        }
    }
     public function Aprobado ($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Preparaduria=Preparadurias::where('id_preparaduria',$id)->get();
        $Estudiante= Estudiante::where('id_estudiante',$Preparaduria[0]['attributes']['id_estudiante'])->get();
        $RutasP=new RutasP;
        $RutasP->id_estado='10';
        $RutasP->id_preparaduria=$id;
        $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
        $RutasP->id_user=Auth::user()->id;
        $RutasP->fecha=date('Y-m-d');
        $RutasP->save();
        $numero=$Preparaduria[0]['attributes']['numero'];
        Preparadurias::where('id_preparaduria',$id)->update(['id_estados' => '10']);
        $Student= User::where('id_dependencia',$RutasP->id_dependencia)->where('id',$Estudiante[0]['attributes']['id_user'])->get();
        $Secretaria= User::where('id_dependencia',$RutasP->id_dependencia)->where('id_perfil','2')->get();
        $Dependencia=Dependencia::where('id_dependencia',$RutasP->id_dependencia)->get();
        $Escuela=Escuela::where('id_escuela',$Dependencia[0]['attributes']['id_escuela'])->get();
        $admin=$Student[0]['attributes']['email'];
        $name=$Student[0]['attributes']['email'];
        $fullname=$Student[0]['attributes']['nombres'].' , '.$Student[0]['attributes']['apellidos'];
        $name_secre=$Secretaria[0]['attributes']['email'];
        $email=env('MAIL_USERNAME');
        $escuela=$Escuela[0]['attributes']['nombre'];
        $Funciones->Aprobado($name,$fullname,$name_secre,$email,$admin,$numero,$escuela);
        DB::commit();
        return redirect()->back();
    }
    public function Evaluar ($id)
    {
        $Preparador=Preparadurias::where('id_preparaduria',$id)->get();
        $Estudiante= Estudiante::where('id_estudiante',$Preparador[0]['attributes']['id_estudiante'])->get();
        $User=User::where('id',$Estudiante[0]['attributes']['id_user'])->get();   
        return view('preparaduria/evaluar')->with(['id'=>$id,'User'=>$User, 'Preparador'=>$Preparador]);
    }
      public function Rechazado ($id)
    {
        
        return view('preparaduria/rechazado')->with(['id'=>$id]);
    }
    public function Rechazo(Request $request){
         $rules = array(
            'observacion' => 'required',
            );    
        $mensajes=array(
            'observacion.required'=>'La Observacion Es  Obligatoria',
            
            ); 
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
            DB::beginTransaction();
            $Funciones= new FuncionesController();
            $Preparaduria=Preparadurias::where('id_preparaduria',$request->id)->get();
            $Estudiante= Estudiante::where('id_estudiante',$Preparaduria[0]['attributes']['id_estudiante'])->get();
            $numero=$Preparaduria[0]['attributes']['numero'];
            if(Auth::user()->id_perfil=='6')
            {
                $RutasP=new RutasP;
                $RutasP->id_estado='13';
                $RutasP->id_preparaduria=$request->id;
                $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
                $RutasP->id_user=Auth::user()->id;
                $RutasP->fecha=date('Y-m-d');
                $RutasP->save();
                Preparadurias::where('id_preparaduria',$request->id)->update(['id_estados' => '13','observacion'=>$request->observacion]);
                $Student= User::where('id_dependencia',$RutasP->id_dependencia)->where('id',$Estudiante[0]['attributes']['id_user'])->get();
                $Secretaria= User::where('id_dependencia',$RutasP->id_dependencia)->where('id_perfil','2')->get();
                $admin=$Student[0]['attributes']['email'];
                $name=$Student[0]['attributes']['email'];
                $fullname=$Student[0]['attributes']['nombres'].' , '.$Student[0]['attributes']['apellidos'];
                $name_secre=$Secretaria[0]['attributes']['email'];
                $email=env('MAIL_USERNAME');
                $Dependencia=Dependencia::where('id_dependencia',$RutasP->id_dependencia)->get();
                $Escuela=Escuela::where('id_escuela',$Dependencia[0]['attributes']['id_escuela'])->get();
                $escuela=$Escuela[0]['attributes']['nombre'];
                $Funciones->RechazadoPor($name,$fullname,$name_secre,$email,$admin,$numero,$escuela);
                DB::commit();
            }
            else
            {
                $RutasP=new RutasP;
                $RutasP->id_estado='11';
                $RutasP->id_preparaduria=$request->id;
                $RutasP->id_dependencia=$Estudiante[0]['attributes']['id_dependencia'];
                $RutasP->id_user=Auth::user()->id;
                $RutasP->fecha=date('Y-m-d');
                $RutasP->save();
                Preparadurias::where('id_preparaduria',$request->id)->update(['id_estados' => '11','observacion'=>$request->observacion]);
                $Student= User::where('id_dependencia',$RutasP->id_dependencia)->where('id',$Estudiante[0]['attributes']['id_user'])->get();
                $Secretaria= User::where('id_dependencia',$RutasP->id_dependencia)->where('id_perfil','3')->get();
                $admin=$Student[0]['attributes']['email'];
                $name=$Student[0]['attributes']['email'];
                $fullname=$Student[0]['attributes']['nombres'].' , '.$Student[0]['attributes']['apellidos'];
                $name_secre=$Secretaria[0]['attributes']['email'];
                $email=env('MAIL_USERNAME');
                $Funciones->Rechazado($name,$fullname,$name_secre,$email,$admin,$numero);
                DB::commit();
            }    
            $success=array('success'=>true,'mensaje'=>'Rechazo la Solicitud de Preparaduria!!');
            return response()->json($success);
        }
    }
     public function vistaHTMLPDFPreparaduriaVerificado(Request $request)
    {
        $preparaduria = Periodos::select('nombre as periodo')->where('id_periodo',$request->id_periodo)->get();//OBTENGO TODOS MIS PRODUCTO
        $Profesor=Profesor::select('id_user')->join('users','profesor.id_user','=','users.id')->where('users.id_perfil','2')->where('profesor.id_dependencia',Auth::User()->id_dependencia)->get();
        $Profesors=Profesor::select('id_user','firma')->join('users','profesor.id_user','=','users.id')->where('users.id_perfil','7')->where('profesor.id_dependencia',Auth::User()->id_dependencia)->get();
        $UserJobDep=User::select('nombres','apellidos','sexo')->where('id',$Profesor[0]['attributes']['id_user'])->get();
        $UserJob=User::select('nombres','apellidos','sexo')->where('id',$Profesors[0]['attributes']['id_user'])->get();
        $Sello=Sellos::select('sello')->where('id_users',$Profesor[0]['attributes']['id_user'])->get();
        $Dependencia=Dependencia::select('nombre_dependencia','id_escuela')->where('id_dependencia',Auth::User()->id_dependencia)->get();
        $Dependencias=Dependencias::select('nombre','id_dependencias')->where('id_departamento',Auth::User()->id_dependencia)->where('id_dependencias','9')->get();
        $Concurso= ConcursoPreparador::select('users.cedula','users.nombres','users.apellidos','concurso_preparador.*')->join('users','concurso_preparador.id_user','=','users.id')->join('preparaduria','concurso_preparador.id_preparaduria','=','preparaduria.id_preparaduria')->where('preparaduria.id_periodo',$request->id_periodo)->where('aprobado','1')->orderby('puntaje','desc')->get();
        $i=1;
        $Escuela=Escuela::select('nombre')->where('id_escuela',$Dependencia[0]['attributes']['id_escuela'])->get();
        view()->share(['i'=>$i,'Concurso'=>$Concurso,'Dependencia'=>$Dependencia,'Dependencias'=>$Dependencias,'Escuela'=>$Escuela,'preparaduria'=>$preparaduria,'UserJob'=>$UserJob,'UserJobDep'=>$UserJobDep,'Sello'=>$Sello,'Profesors'=>$Profesors,'Profesor'=>$Profesor]);//VARIABLE GLOBAL PRODUCTOS
     if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-preparaduria-verificado');//CARGO LA VISTA
      
         //   return $pdf->download('preparaduriaverificado.pdf');//SUGERIR NOMBRE A DESCARGAR
        $pdf->output();
           $filename = 'preparaduria.pdf';
            return $pdf->stream($filename, array('Attachment' => false)); 
            
        }
        
        return view('vista-html-pdf-preparaduria-verificado');//RETORNO A MI VISTA
    } 
    public function vistaHTMLPDFPreparaduriaSolicitudVerificado(Request $request)
    {
        $preparaduria = Periodos::select('nombre as periodo')->where('id_periodo',$request->id_periodo)->get();//OBTENGO TODOS MIS PRODUCTO
        $Profesor=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2')
                ->where('profesor.id_dependencia','2')->get();
        $Profesorx=Profesor::select('id_user')->join('users','profesor.id_user','=','users.id')->where('users.id_perfil','6')->get();
        $Profesors=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','7')
                ->where('profesor.id_dependencia','2')
                ->get();
        $Documento=Documento::where('descripcion_documento','Oficio de Concurso de Preparadores Docentes')->get();
        $Oficio=Oficio::where('id_documento',$Documento[0]['attributes']['id_documento'])->get();
       
        $UserJobDep=User::select('nombres','apellidos','sexo')->where('id',$Profesor[0]['attributes']['id_user'])->get();
        $UserJob=User::select('nombres','apellidos','sexo')->where('id',$Profesors[0]['attributes']['id_user'])->get();
        $UserJobSchool=User::select('nombres','apellidos','sexo')->where('id',$Profesorx[0]['attributes']['id_user'])->get();
        $Sello=Sellos::select('sello')->where('id_users',$Profesor[0]['attributes']['id_user'])->get();
        $Dependencia=Dependencia::select('nombre_dependencia','id_escuela')->where('id_dependencia','2')->get();
        $Dependencias=Dependencias::select('nombre','id_dependencias')->where('id_departamento','2')->where('id_dependencias','9')->get();
        $Concurso= ConcursoPreparador::select('users.cedula','users.nombres','users.apellidos','concurso_preparador.*')
                ->join('users','concurso_preparador.id_user','=','users.id')
                ->join('preparaduria','concurso_preparador.id_preparaduria','=','preparaduria.id_preparaduria')
                ->where('preparaduria.id_periodo',$request->id_periodo)->where('aprobado','1')
                ->orderby('puntaje','desc')->get();
        $i=1;
        $Escuela=Escuela::select('nombre')->where('id_escuela',$Dependencia[0]['attributes']['id_escuela'])->get();
        view()->share(['i'=>$i,'Oficio'=>$Oficio,'UserJobSchool'=>$UserJobSchool,'Concurso'=>$Concurso,'Dependencia'=>$Dependencia,'Dependencias'=>$Dependencias,'Escuela'=>$Escuela,'preparaduria'=>$preparaduria,'UserJob'=>$UserJob,'UserJobDep'=>$UserJobDep,'Sello'=>$Sello,'Profesors'=>$Profesors,'Profesorx'=>$Profesorx,'Profesor'=>$Profesor]);//VARIABLE GLOBAL PRODUCTOS
     if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-preparaduria-remitido');//CARGO LA VISTA
       $pdf->output();
           $filename = 'oficioconcursopreparadores.pdf';
            return $pdf->stream($filename, array('Attachment' => false)); 
          //  return $pdf->download('preparaduriaremitido.pdf');//SUGERIR NOMBRE A DESCARGAR
        
            
        }
        
        return view('vista-html-pdf-preparaduria-remitido');//RETORNO A MI VISTA
    }
    public function vistaHTMLPDFPreparaduriaAprobado(Request $request)
    {
        $preparaduria = Preparadurias::select('users.cedula','preparaduria.numero','asignatura.codigo','users.id_dependencia','users.nombres','users.apellidos','preparaduria.semestre','preparaduria.nota','preparaduria.periodo','preparaduria.creditos_aprobados','preparaduria.promedio_general','asignatura.codigo','asignatura.nombre','estudiante.firma')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('dependencia','dependencia.id_dependencia','=','estudiante.id_dependencia')
                ->join('users','estudiante.id_user','=','users.id')
                ->where('preparaduria.id_preparaduria',$request->id_preparaduria)
                ->get();//OBTENGO TODOS MIS PRODUCTO
        $materias = PreparaduriaAsignaturasCursando::select('asignatura.codigo','asignatura.nombre')
                ->join('asignatura','preparaduria_asignaturas_cursando.id_asignatura','=','asignatura.id_asignatura')
                ->where('preparaduria_asignaturas_cursando.id_preparaduria',$request->id_preparaduria)
                ->get();//OBTENGO TODOS MIS PRODUCTO
        $Profesor=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2')
                ->where('profesor.id_dependencia',$preparaduria[0]['attributes']['id_dependencia'])
                ->get();
        $UserJobDep=User::select('nombres','apellidos','sexo')->where('id',$Profesor[0]['attributes']['id_user'])->get();
        $Sello=Sellos::select('sello')->where('id_users',$Profesor[0]['attributes']['id_user'])->get();
        $Profesors=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','6')
                ->get();
        $Dependencia=Dependencia::select('nombre_dependencia','id_escuela')->where('id_dependencia',$preparaduria[0]['attributes']['id_dependencia'])->get();
        $Escuela=Escuela::select('nombre')->where('id_escuela',$Dependencia[0]['attributes']['id_escuela'])->get();
        $UserJobSchool=User::select('nombres','apellidos','sexo','id')->where('id',$Profesors[0]['attributes']['id_user'])->get();
        $SellosEscuela=SellosEscuelas::select('sello')->where('id_users',$UserJobSchool[0]['attributes']['id'])->get();
        view()->share(['Dependencia'=>$Dependencia,'Escuela'=>$Escuela,'preparaduria'=>$preparaduria,'UserJobSchool'=>$UserJobSchool,'UserJobDep'=>$UserJobDep,'materias'=>$materias,'Profesor'=>$Profesor,'Profesors'=>$Profesors,'Sello'=>$Sello,'SellosEscuela'=>$SellosEscuela]);//VARIABLE GLOBAL PRODUCTOS
        if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-preparaduria-aprobado');//CARGO LA VISTA
            return $pdf->download('preparaduria-aprobado.pdf');//SUGERIR NOMBRE A DESCARGAR
        }
        return view('vista-html-pdf-preparaduria-aprobado');//RETORNO A MI VISTA
    }
    public function vistaHTMLPDFPreparaduriaReprobado(Request $request)
    {
        $preparaduria = Preparadurias::select('users.cedula','preparaduria.numero','users.id_dependencia','users.nombres','users.apellidos','preparaduria.semestre','preparaduria.nota','preparaduria.periodo','preparaduria.creditos_aprobados','preparaduria.promedio_general','asignatura.codigo','asignatura.codigo','asignatura.nombre','estudiante.firma','preparaduria.observacion')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('dependencia','dependencia.id_dependencia','=','estudiante.id_dependencia')
                ->join('users','estudiante.id_user','=','users.id')
                ->where('preparaduria.id_preparaduria',$request->id_preparaduria)
                ->get();//OBTENGO TODOS MIS PRODUCTO
        $materias = PreparaduriaAsignaturasCursando::select('asignatura.codigo','asignatura.nombre')
                ->join('asignatura','preparaduria_asignaturas_cursando.id_asignatura','=','asignatura.id_asignatura')
                ->where('preparaduria_asignaturas_cursando.id_preparaduria',$request->id_preparaduria)
                ->get();//OBTENGO TODOS MIS PRODUCTO
        $Profesor=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2')
                ->where('profesor.id_dependencia',$preparaduria[0]['attributes']['id_dependencia'])
                ->get();
        $UserJobDep=User::select('nombres','apellidos','sexo')->where('id',$Profesor[0]['attributes']['id_user'])->get();
        $Sello=Sellos::select('sello')->where('id_users',$Profesor[0]['attributes']['id_user'])->get();
        $Profesors=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','6')
                ->get();
        $Dependencia=Dependencia::select('nombre_dependencia','id_escuela')->where('id_dependencia',$preparaduria[0]['attributes']['id_dependencia'])->get();
        $Escuela=Escuela::select('nombre')->where('id_escuela',$Dependencia[0]['attributes']['id_escuela'])->get();
        $UserJobSchool=User::select('nombres','apellidos','sexo','id')->where('id',$Profesors[0]['attributes']['id_user'])->get();
        $SellosEscuela=SellosEscuelas::select('sello')->where('id_users',$UserJobSchool[0]['attributes']['id'])->get();
        view()->share(['Dependencia'=>$Dependencia,'Escuela'=>$Escuela,'preparaduria'=>$preparaduria,'UserJobSchool'=>$UserJobSchool,'UserJobDep'=>$UserJobDep,'materias'=>$materias,'Profesor'=>$Profesor,'Profesors'=>$Profesors,'Sello'=>$Sello,'SellosEscuela'=>$SellosEscuela]);//VARIABLE GLOBAL PRODUCTOS
        if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-preparaduria-reprobado');//CARGO LA VISTA
            return $pdf->download('preparaduria-reprobado.pdf');//SUGERIR NOMBRE A DESCARGAR
        }
        return view('vista-html-pdf-preparaduria-reprobado');//RETORNO A MI VISTA
    }
     public function vistaHTMLPDFPreparaduriaRechazado(Request $request)
    {
        $preparaduria = Preparadurias::select('users.cedula','preparaduria.numero','asignatura.codigo','users.id_dependencia','users.nombres','users.apellidos','preparaduria.semestre','preparaduria.nota','periodo.nombre as period','preparaduria.creditos_aprobados','preparaduria.promedio_general','asignatura.codigo','asignatura.nombre','estudiante.firma','preparaduria.observacion')
                ->join('asignatura','preparaduria.id_asignatura','=','asignatura.id_asignatura')
                ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                ->join('dependencia','dependencia.id_dependencia','=','estudiante.id_dependencia')
                ->join('periodo','preparaduria.id_periodo','=','periodo.id_periodo')
                ->join('users','estudiante.id_user','=','users.id')
                ->where('preparaduria.id_preparaduria',$request->id_preparaduria)
                ->get();//OBTENGO TODOS MIS PRODUCTO
        $materias = PreparaduriaAsignaturasCursando::select('asignatura.codigo','asignatura.nombre')
                ->join('asignatura','preparaduria_asignaturas_cursando.id_asignatura','=','asignatura.id_asignatura')
                ->where('preparaduria_asignaturas_cursando.id_preparaduria',$request->id_preparaduria)
                ->get();//OBTENGO TODOS MIS PRODUCTO
        $Profesor=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2')
                ->where('profesor.id_dependencia',$preparaduria[0]['attributes']['id_dependencia'])
                ->get();
        $UserJobDep=User::select('nombres','apellidos','sexo')->where('id',$Profesor[0]['attributes']['id_user'])->get();
        $Sello=Sellos::select('sello')->where('id_users',$Profesor[0]['attributes']['id_user'])->get();
        $Profesors=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','6')
                ->get();
        $Dependencia=Dependencia::select('nombre_dependencia','id_escuela')->where('id_dependencia',$preparaduria[0]['attributes']['id_dependencia'])->get();
        $Escuela=Escuela::select('nombre')->where('id_escuela',$Dependencia[0]['attributes']['id_escuela'])->get();
        $UserJobSchool=User::select('nombres','apellidos','sexo','id')->where('id',$Profesors[0]['attributes']['id_user'])->get();
        $SellosEscuela=SellosEscuelas::select('sello')->where('id_users',$UserJobSchool[0]['attributes']['id'])->get();
        view()->share(['Dependencia'=>$Dependencia,'Escuela'=>$Escuela,'preparaduria'=>$preparaduria,'UserJobSchool'=>$UserJobSchool,'UserJobDep'=>$UserJobDep,'materias'=>$materias,'Profesor'=>$Profesor,'Profesors'=>$Profesors,'Sello'=>$Sello,'SellosEscuela'=>$SellosEscuela]);//VARIABLE GLOBAL PRODUCTOS
        if($request->has('descargar')){
            
            $pdf = PDF::loadView('vista-html-pdf-preparaduria-rechazado');//CARGO LA VISTA
             $pdf->output();
           $filename = 'preparaduria-rechazado.pdf';
            return $pdf->stream($filename, array('Attachment' => false)); 
        }
        return view('vista-html-pdf-preparaduria-rechazado');//RETORNO A MI VISTA
    }
    function OficioRespuesta(){
        $Dependencia=Dependencias::pluck('nombre','id_dependencias');
        $Periodo=Periodos::pluck('nombre','id_periodo');
        $Usuarios = User::select(DB::table('users')
                ->raw("CONCAT(users.nombres,' ',users.apellidos)  AS fullname"),'id')->where('id_perfil','2')->where('id_dependencia','14')
                ->pluck('fullname','id'); 
        return view('preparaduria/crearoficio')->with(['Usuarios'=>$Usuarios,'Dependencia'=>$Dependencia,'Periodo'=>$Periodo]);
    }
    public function agregarOficioPreparador(Request $request){
        $rules = array(
            'nro_consejo' => 'required',
            'fechas_consejo'=> 'required',          
            'fechas_contratacion'=> 'required',          
            'cuerpo'=> 'required',
            'para'=> 'required',
            'periodo'=> 'required',
            'concopia'=> 'required',
            'plaza'=> 'required'
            );    
        $mensajes=array(
            'nro_consejo.required'=>'EL NUMERO DEL CONSEJO ES OBLIGATORIO',
            'fechas_consejo.required' => 'LA FECHA DEL CONSEJO ES OBLIGATORIA',
            'fechas_contratacion.required'=>'LA FECHA DE CONTRATACION ES OBLIGATORIA',
            'cuerpo.required'=>'EL CUERPO DEL OFICIO ES OBLIGATORIO',
            'para.required'=>'PARA QUIEN ES  DIRIGIDO EL OFICIO ES OBLIGATORIO',
            'periodo.required'=>'EL PERIODO ACADEMICO ES OBLGIATORIO',
            'concopia.required'=>'CON COPIA ES OBLIGATORIO',
            'plaza.required'=>'LA CANTIDAD DE PLAZAS APROBADAS ES OBLIGATORIA',
            ); 
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
            //$Funciones= new FuncionesController();
            DB::beginTransaction();
            $year=date('Y');
            $fecha=date('Y-m-d');
            $Profesor=Profesor::select('users.nombres','users.apellidos','users.sexo')->join('users','profesor.id_user','=','users.id')->where('profesor.id_dependencia',Auth::user()->id_dependencia)->where('users.id_perfil','6')->get();
            $Verificar=Documento::select('oficio.numero')->join('oficio','documento.id_documento','=','oficio.id_documento')->where('oficio.anio',$year)->where('oficio.id_dependencia',Auth::user()->id_dependencia)->get()->toArray();
            $Total=count($Verificar);
            $Sexo=$Profesor[0]['attributes']['sexo'];
            if($Sexo=='Femenino')
            {
                $de="PROFA. ". $Profesor[0]['attributes']['nombres'].' '.$Profesor[0]['attributes']['apellidos'];
            }
            if($Sexo=='Masculino')
            {
                $de="PROF. ". $Profesor[0]['attributes']['nombres'].' '.$Profesor[0]['attributes']['apellidos'];
            }
            $Dependencias=Dependencia::where('id_dependencia',Auth::user()->id_dependencia)->get();
            $codigo_documento_generado=time();
            $Documento = new Documento();
            $Documento->id_dependencia_c= Auth::user()->id_dependencia;
            $Documento->id_usuario=Auth::user()->id;
            $Documento->id_categoria='1';
            $Documento->id_subcategoria='3';
            $Documento->id_itemsubcategoria='9';
            $Documento->id_estados="10";
            $Documento->codigo_plantilla=$codigo_documento_generado;
            $Documento->descripcion_documento='Oficio De Listado De Preparadores Docentes';
            $Documento->save();
            $Oficio=new Oficio();
            if($Total>0)
            {   
                $numero=$Total+1;
                $acronimo='D'.''.substr($Dependencias[0]['attributes']['nombre_dependencia'],0,1).''.substr($Dependencias[0]['attributes']['nombre_dependencia'],11,1).' N°'.$numero;
                $Oficio->id_documento=$Documento->id_documento;
                $Oficio->id_categoria=$Documento->id_categoria;
                $Oficio->id_subcategoria=$Documento->id_subcategoria;
                $Oficio->id_itemsubcategoria=$Documento->id_itemsubcategoria;
                $Oficio->id_estados="10";
                $Oficio->id_dependencia=Auth::user()->id_dependencia;
                $Oficio->id_user=Auth::user()->id;
                $Oficio->id_para_user=$request->para;
                $Oficio->numero=$numero;
                $Oficio->anio=$year;
                $Oficio->acronimo=$acronimo;
                $Oficio->nota="Oficio De Listado De Preparadores Docentes";
                $Oficio->de=$de;
                $Oficio->cuerpo=$request->cuerpo;
                $Oficio->fecha=$fecha;
                $Oficio->save();
                $RutaOficio=new RutaOficio();
                $RutaOficio->id_estado='1';
                $RutaOficio->id_oficio=$Oficio->id_oficio;
                $RutaOficio->id_dependencia=$Oficio->id_dependencia;
                $RutaOficio->id_user=Auth::user()->id;
                $RutaOficio->fecha=date('Y-m-d');
                $RutaOficio->save();
                $RutaOficio=new RutaOficio();
                $RutaOficio->id_estado=$Oficio->id_estados;
                $RutaOficio->id_oficio=$Oficio->id_oficio;
                $RutaOficio->id_dependencia=$Oficio->id_dependencia;
                $RutaOficio->id_user=Auth::user()->id;
                $RutaOficio->fecha=date('Y-m-d');
                $RutaOficio->save();
            }
            else
            if($Total==0)
            {   
                $numero=1;
                $acronimo='D'.''.substr($Dependencias[0]['attributes']['nombre_dependencia'],0,1).''.substr($Dependencias[0]['attributes']['nombre_dependencia'],11,1).' N°'.$numero;
                $Oficio->id_documento=$Documento->id_documento;
                $Oficio->id_categoria=$Documento->id_categoria;
                $Oficio->id_subcategoria=$Documento->id_subcategoria;
                $Oficio->id_itemsubcategoria=$Documento->id_itemsubcategoria;
                $Oficio->id_estados="10";
                $Oficio->id_dependencia=Auth::user()->id_dependencia;
                $Oficio->id_user=Auth::user()->id;
                $Oficio->id_para_user=$request->para;
                $Oficio->numero=$numero;
                $Oficio->anio=$year;
                $Oficio->acronimo=$acronimo;
                $Oficio->nota="Oficio De Listado De Preparadores Docentes";
                $Oficio->de=$de;
                $Oficio->cuerpo=$request->cuerpo;
                $Oficio->fecha=$fecha;
                $Oficio->save();
                $RutaOficio=new RutaOficio();
                $RutaOficio->id_estado='1';
                $RutaOficio->id_oficio=$Oficio->id_oficio;
                $RutaOficio->id_dependencia=$Oficio->id_dependencia;
                $RutaOficio->id_user=Auth::user()->id;
                $RutaOficio->fecha=date('Y-m-d');
                $RutaOficio->save();
                $RutaOficio=new RutaOficio();
                $RutaOficio->id_estado=$Oficio->id_estados;
                $RutaOficio->id_oficio=$Oficio->id_oficio;
                $RutaOficio->id_dependencia=$Oficio->id_dependencia;
                $RutaOficio->id_user=Auth::user()->id;
                $RutaOficio->fecha=date('Y-m-d');
                $RutaOficio->save();
            }
            $Concurso=Concursos::where('id_periodo',$request->periodo)->get();
            $OficioContratacion=new OficioContratacionPreparador();
            $OficioContratacion->id_oficio=$Oficio->id_oficio;
            $OficioContratacion->id_concurso=$Concurso[0]['attributes']['id_concurso'];
            $OficioContratacion->id_periodo=$request->periodo;
            $OficioContratacion->descripcion='Oficio De Listado De Preparadores Docentes';
            $OficioContratacion->nro_consejo=$request->nro_consejo;
            $OficioContratacion->fecha_contratacion=$request->fechas_contratacion;
            $OficioContratacion->observacion=$request->cuerpo;
            $OficioContratacion->fecha_consejo=$request->fechas_consejo;
            $OficioContratacion->save();
            $data=json_decode($request->concopia,true);
            if($request->concopia!="")
            {
                $data=json_decode($request->concopia,true);
                foreach ($data as $row)
                {   
                    $OficioCopia=new OficioCopia();
                    $OficioCopia->id_oficio=$Oficio->id_oficio;
                    $OficioCopia->id_dependencia=$row;
                    $OficioCopia->save();
                } 
            }
            Concursos::where('id_concurso',$Concurso[0]['attributes']['id_concurso'])->update(['cupo_asignado' => $request->plaza]);
            $AprobadosConcursos=ConcursoPreparador::select('estudiante.id_dependencia','preparaduria.id_preparaduria')
                    ->join('preparaduria','concurso_preparador.id_preparaduria','=','preparaduria.id_preparaduria')
                    ->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                    ->join('periodo','concurso_preparador.id_periodo','=','periodo.id_periodo')
                    ->where('concurso_preparador.id_periodo',$request->periodo)->where('aprobado','1')
                    ->orderby('puntaje','desc')
                    ->get();        
            for($i=0;$i<$request->plaza;$i++)
            {
                $RutasP=new RutasP;
                $RutasP->id_estado="10";
                $RutasP->id_preparaduria=$AprobadosConcursos[$i]['attributes']['id_preparaduria'];
                $RutasP->id_dependencia=$AprobadosConcursos[$i]['attributes']['id_dependencia'];
                $RutasP->id_user='2';
                $RutasP->fecha=date('Y-m-d');
                $RutasP->save();    
                Preparadurias::where('id_preparaduria',$AprobadosConcursos[$i]['attributes']['id_preparaduria'])->update(['id_estados' =>'10']);
                ConcursoPreparador::where('id_preparaduria',$AprobadosConcursos[$i]['attributes']['id_preparaduria'])->update(['plaza' =>'1']);
            }
            Preparadurias::where('id_estados','12')->update(['id_estados' =>'11','observacion'=>'Su solicitud fue rechazada por la Escuela de Ciencias se asingo la cantidad de  '.$request->plaza.' plazas para su departamento y usted no quedo entre los seleccionados' ]);
            $c=Preparadurias::select('estudiante.id_dependencia','preparaduria.id_preparaduria')->where('id_estados','11')->join('estudiante','preparaduria.id_estudiante','=','estudiante.id_estudiante')
                    ->get();
            for($j=0;$j<count($c);$j++)
            {
                $RutasP=new RutasP;
                $RutasP->id_estado="11";
                $RutasP->id_preparaduria=$c[$j]['attributes']['id_preparaduria'];
                $RutasP->id_dependencia=$c[$j]['attributes']['id_dependencia'];
                $RutasP->id_user=Auth::user()->id;
                $RutasP->fecha=date('Y-m-d');
                $RutasP->save();    
            }        
            DB::commit();
            $success=array('success'=>true,'mensaje'=>'Oficio Creado Con Exito!!');
            return response()->json($success);
        }
    }
    public function Factores(Request $request){
        $Periodo=Periodos::where('id_periodo','1')->get();
        $factor=factores::select('users.apellidos','users.nombres','users.cedula','factores.*')->join('users','factores.id_user','=','users.id')->where('id_periodo',$Periodo[0]['attributes']['id_periodo'])->where('aprobado','1')->orderby('f10','desc')->get();
        $i=1; 
        view()->share(['factor'=>$factor,'Periodo'=>$Periodo,'i'=>$i]);//VARIABLE GLOBAL PRODUCTOS
       
        if($request->has('descargar'))
        {
            $pdf = PDF::loadView('vista-html-pdf-factores');//CARGO LA VISTA
            $pdf->output();
            $filename = 'factores.pdf';
            return $pdf->stream($filename, array('Attachment' => false)); 
        }
    }
}
