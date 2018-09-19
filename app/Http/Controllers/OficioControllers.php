<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Categoria;
use App\Subcategoria;
use App\SellosEscuelas;
use App\Oficio;
use App\OficioCopia;
use App\Documento;
use App\User;
use App\Dependencia;
use App\Sellos;
use App\contrataciones;
use App\Profesor;
use App\RutaOficio;
use App\Ruta;
use App\ConcursoPreparador;
use App\Concursos;
use Auth;
use Illuminate\Support\Facades\Input;
use  PDF;
use App\Http\Controllers\FuncionesController;
class OficioControllers extends Controller
{
     public function __construct()
    {
            $this->middleware('auth');
    }
    public function GetUser(Request $request, $id,$id_perfil)
    {
        if ($request->ajax()) 
        {
            $User = User::usuario($id,$id_perfil);
            return response()->json($User);
        }
    }
    public function AgregarOficio(Request $request)
    {
        $perfil=Auth::user()->id_perfil;
        $rules = array(
            'para' => 'required',
            'id_categoria' => 'required',
            'id_subcategoria' => 'required',
            'id_itemsubcategoria' =>'required',
           
            
        );    
        $mensajes=array(
            'id_categoria.required'=>'La Categoria Es Obligatoria',
            'id_subcategoria.required'=>'El Tipo De Documento Es  Obligatorio',
            'id_itemsubcategoria.required'=>'La Plantilla Es  Obligatoria',
            'para.required'=>'Para Es  Obligatorio',
        ); 
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
            DB::beginTransaction();
            $year=date('Y');
            $fecha=date('Y-m-d');
            $Profesor=Profesor::select('users.nombres','users.apellidos','users.sexo')
                                ->join('users','profesor.id_user','=','users.id')
                                ->where('profesor.id_dependencia',Auth::user()->id_dependencia)
                                ->where('users.id_perfil','2')->get();
            $Verificar=Documento::select('oficio.numero')
                                  ->join('oficio','documento.id_documento','=','oficio.id_documento')
                                  ->where('oficio.anio',$year)
                                  ->where('oficio.id_dependencia',Auth::user()->id_dependencia)
                                  ->get()->toArray();
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
            $Documento->id_categoria=$request->id_categoria;
            $Documento->id_subcategoria=$request->id_subcategoria;
            $Documento->id_itemsubcategoria=$request->id_itemsubcategoria;
           // if($perfil==3)//secretaria
            $Documento->id_estados="1";
            
            $Documento->codigo_plantilla=$codigo_documento_generado;
            $Documento->descripcion_documento='Oficio de Contratacion';
		    $Documento->save();
            $Oficio=new Oficio();
            if($Total>0)
            {   
                $numero=$Total+1;
                $acronimo=substr($Dependencias[0]['attributes']['nombre_dependencia'],0,1).''.substr($Dependencias[0]['attributes']['nombre_dependencia'],16,1).'-'.$numero.'/'.$year;
                $Oficio->id_documento=$Documento->id_documento;
                $Oficio->id_categoria=$request->id_categoria;
                $Oficio->id_subcategoria=$request->id_subcategoria;
                $Oficio->id_itemsubcategoria=$request->id_itemsubcategoria;
                $Oficio->id_estados="1";
                $Oficio->id_dependencia=Auth::user()->id_dependencia;
                $Oficio->id_user=Auth::user()->id;
                $Oficio->id_para_user=$request->para;
                $Oficio->numero=$numero;
                $Oficio->anio=$year;
                $Oficio->acronimo=$acronimo;
                $Oficio->fecha=$fecha;
				$Oficio->nota="OFICIO DE CONTRATACION";
				$Oficio->de=$de; 
		       $Oficio->cuerpo='Oficio de Conratacion';	
              $Oficio->save();
            }
            else
            if($Total==0)
            {   
                $numero=1;
                $acronimo=substr($Dependencias[0]['attributes']['nombre_dependencia'],0,1).''.substr($Dependencias[0]['attributes']['nombre_dependencia'],16,1).'-'.$numero.'/'.$year;
                $Oficio->id_documento=$Documento->id_documento;
                $Oficio->id_categoria=$request->id_categoria;
                $Oficio->id_subcategoria=$request->id_subcategoria;
                $Oficio->id_itemsubcategoria=$request->id_itemsubcategoria;
                $Oficio->id_estados="1";
                $Oficio->id_dependencia=Auth::user()->id_dependencia;
                $Oficio->id_user=Auth::user()->id;
                $Oficio->id_para_user=$request->para;
                $Oficio->numero=$numero;
                $Oficio->anio=$year;
                $Oficio->acronimo=$acronimo;
                $Oficio->fecha=$fecha;
				$Oficio->nota="OFICIO DE CONTRATACION";
            $Oficio->de=$de; 
		 $Oficio->cuerpo='Oficio de Conratacion';	

			    $Oficio->save();
            }
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
            $RutaOficio=new RutaOficio();
            $RutaOficio->id_estado=$Oficio->id_estados;
            $RutaOficio->id_oficio=$Oficio->id_oficio;
            $RutaOficio->id_dependencia=$Oficio->id_dependencia;
            $RutaOficio->id_user=Auth::user()->id;
            $RutaOficio->fecha=date('Y-m-d');
            $RutaOficio->save();


              $Ruta=new Ruta;
                $Ruta->id_estado=$Documento->id_estados;
                $Ruta->id_documento=$Oficio->id_documento;
                $Ruta->id_dependencia=$Documento->id_dependencia_c;
                $Ruta->id_user=Auth::user()->id;
                $Ruta->fecha=date('Y-m-d');
                $Ruta->save();
            $Contratacion=new contrataciones();
            $Contratacion->id_oficio=$Oficio->id_oficio;
            $Contratacion->id_user=$request->contratar;
            $Contratacion->id_asignatura=$request->asignatura;
            $Contratacion->periodo=$request->periodo;
            $Contratacion->seccion=$request->seccion;        
            $Contratacion->save();
             $Ruta=new Ruta;
            
             
              
              // $Documento->id_estados="6";
            



            if($perfil==2){

                $this->CambiarEstado($Documento->id_documento);
            }



            DB::commit();
            $success=array('success'=>true,'mensaje'=>'Documento Creado con Exito!!'.$Documento->codigo_plantilla);
            return response()->json($success);
        }
    }

    public function CambiarEstado($id){
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Oficio= Oficio::where('id_documento',$id)->get();
        $RutaOficio=new RutaOficio();
        $RutaOficio->id_estado='6';
        $RutaOficio->id_oficio=$Oficio[0]['attributes']['id_oficio'];
        $RutaOficio->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
        $RutaOficio->id_user=Auth::user()->id;
        $RutaOficio->fecha=date('Y-m-d');
        $RutaOficio->save();
        Documento::where('id_documento',$id)->update(['id_estados' => '6']);
        Oficio::where('id_documento',$id)->update(['id_estados' => '6']);
        DB::commit();
    }

     public function EnviarOficio($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Oficio= Oficio::where('id_documento',$id)->get();
        $id_estado='2';//remitido
        $RutaOficio=new RutaOficio();
        $RutaOficio->id_estado=$id_estado;//remitir
        $RutaOficio->id_oficio=$Oficio[0]['attributes']['id_oficio'];
        $RutaOficio->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
        $RutaOficio->id_user=Auth::user()->id;
        $RutaOficio->fecha=date('Y-m-d');
        $RutaOficio->save();
        //******************************/
           $Ruta=new Ruta;
                $Ruta->id_estado=$id_estado;
                $Ruta->id_documento=$id;
                $Ruta->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
                $Ruta->id_user=Auth::user()->id;
                $Ruta->fecha=date('Y-m-d');
                $Ruta->save();
        /*******************************/
        Documento::where('id_documento',$id)->update(['id_estados' => $id_estado]);
        Oficio::where('id_documento',$id)->update(['id_estados' => $id_estado]);
        $User= User::where('id_dependencia',$RutaOficio->id_dependencia)->where('id_perfil','2')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Oficio[0]['attributes']['acronimo'];
        $email=env('MAIL_USERNAME');
        $Funciones->EnviarOficio($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
        return redirect()->back();
    }

      public function EnviarOficioContratacion($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Oficio= Oficio::where('id_documento',$id)->get();
        $RutaOficio=new RutaOficio();
        $RutaOficio->id_estado='2';
        $RutaOficio->id_oficio=$Oficio[0]['attributes']['id_oficio'];
        $RutaOficio->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
        $RutaOficio->id_user=Auth::user()->id;
        $RutaOficio->fecha=date('Y-m-d');
        $RutaOficio->save();
        Documento::where('id_documento',$id)->update(['id_estados' => '2']);
        Oficio::where('id_documento',$id)->update(['id_estados' => '2']);
        $User= User::where('id_dependencia',$RutaOficio->id_dependencia)->where('id_perfil','2')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Oficio[0]['attributes']['acronimo'];
        $email=env('MAIL_USERNAME');
        $Funciones->EnviarOficio($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
        return redirect()->back();
    }




     public function VistoContratacion($id)
    {
       DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Oficio= Oficio::where('id_documento',$id)->get();
        $RutaOficio=new RutaOficio();
        $RutaOficio->id_estado='3';  //visto
        $RutaOficio->id_oficio=$Oficio[0]['attributes']['id_oficio'];
        $RutaOficio->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
        $RutaOficio->id_user=Auth::user()->id;
        $RutaOficio->fecha=date('Y-m-d');
        $RutaOficio->save();
           $Ruta=new Ruta;
                $Ruta->id_estado='3';
                $Ruta->id_documento=$id;
                $Ruta->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
                $Ruta->id_user=Auth::user()->id;
                $Ruta->fecha=date('Y-m-d');
                $Ruta->save();

        Documento::where('id_documento',$id)->update(['id_estados' => '3']);
        Oficio::where('id_documento',$id)->update(['id_estados' => '3']);
        $User= User::where('id_dependencia',$RutaOficio->id_dependencia)->where('id_perfil','2')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Oficio[0]['attributes']['acronimo'];
        $email=env('MAIL_USERNAME');
        $Funciones->EnviarOficio($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
        return redirect()->back();
    }


      public function vistaHTMLPDFOficio(Request $request)
    {
         $documentos=array( );
     
$Dependencia= Dependencia::where('id_dependencia',Auth::user()->id_dependencia)->get();
        $Escuela=$Dependencia[0]['attributes']['id_escuela'];
        $documentos = Documento::select('documento.*','dependencia.*','oficio.*','contratacion.*','asignatura.nombre as materia','asignatura.codigo',
                 'escuela.nombre as escuela','users.nombres','users.apellidos','users.sexo','dedicacion.nombre_dedicacion')
                ->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('oficio','documento.id_documento','=','oficio.id_documento')
                ->join('contratacion','oficio.id_oficio','=','contratacion.id_oficio')
                ->join('profesor','dependencia.id_dependencia','=','profesor.id_dependencia')
                ->join('users','profesor.id_user','=','users.id')
                ->join('dedicacion','profesor.id_dedicacion','=','dedicacion.id_dedicacion')
                ->join('asignatura','contratacion.id_asignatura','=','asignatura.id_asignatura')
                ->where('users.id_perfil','2') 
                ->where ('escuela.id_escuela',$Escuela)
                ->where('documento.id_documento',$request->id_documento)
                ->get();//OBTENGO TODOS MIS PRODUCTO
         $Profesor=User::select('nombres','apellidos','sexo')->where('id',$documentos[0]['attributes']['id_para_user'])->get();
         $membrete=User::select('nombres','apellidos','sexo')->where('id_dependencia',Auth::user()->id_dependencia)->where('id_perfil','2')->get();
         $Contrataciones=contrataciones::where('id_oficio',$documentos[0]['attributes']['id_oficio'])->get();
         $Estudiante=User::select('nombres','apellidos','sexo','cedula')->where('id',$Contrataciones[0]['attributes']['id_user'])->get();
         $ConCopia=OficioCopia::select('dependencias.nombre as concopia')
                 ->join('dependencias','oficio_copia.id_dependencia','dependencias.id_dependencias')
                 ->where('id_oficio',$documentos[0]['attributes']['id_oficio'])->get();
           view()->share(['documentos'=>$documentos,'ConCopia'=>$ConCopia,'Estudiante'=>$Estudiante,'Profesor'=>$Profesor,'membrete'=>$membrete]);//VARIABLE GLOBAL PRODUCTOS
       // view()->share('documentos',$documentos);//VARIABLE GLOBAL PRODUCTOS
        if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-oficio');//CARGO LA VISTA
              $pdf->output();
            $filename = 'Oficiocontratacion.pdf';
            return $pdf->stream($filename, array('Attachment' => false));
      
            //return $pdf->download('circular.pdf');//SUGERIR NOMBRE A DESCARGAR
        
            
        }
        if(Auth::user()->id_perfil==2){
         $this->Visto($request->id_documento);}
        return view('vista-html-pdf');//RETORNO A MI VISTA
        
    }
     public function Oficio(Request $request)
    {
        if(Auth::user()->id_perfil==2)
        {    
            DB::beginTransaction();
            $Funciones= new FuncionesController();
            $Oficio=Oficio::where('id_documento',$request->id_documento)->get();
            $RutaOficio=new RutaOficio();
            $RutaOficio->id_estado='3';
            $RutaOficio->id_oficio=$Oficio[0]['attributes']['id_oficio'];
            $RutaOficio->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
            $RutaOficio->id_user=Auth::user()->id;
            $RutaOficio->fecha=date('Y-m-d');
            $RutaOficio->save();
            Documento::where('id_documento',$request->id_documento)->update(['id_estados' => '3']);
            Oficio::where('id_documento',$request->id_documento)->update(['id_estados' => '3']);
            DB::commit();
            $User= User::where('id_dependencia',$RutaOficio->id_dependencia)->where('id_perfil','3')->get();
            $admin=$User[0]['attributes']['email'];
            $name=$User[0]['attributes']['email'];
            $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
            $Codigo=$Oficio[0]['attributes']['numero'];
            $email=env('MAIL_USERNAME');
            $Funciones->OficioVisto($name,$fullname,$Codigo,$email,$admin);
            
        $Dependencia= Dependencia::where('id_dependencia',Auth::user()->id_dependencia)->get();
        $Escuela=$Dependencia[0]['attributes']['id_escuela'];
        $documentos = Documento::select('documento.*','dependencia.*','oficio.*','contratacion.*','asignatura.nombre as materia','asignatura.codigo',
                 'escuela.nombre as escuela','users.nombres','users.apellidos','users.sexo','dedicacion.nombre_dedicacion')
                ->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('oficio','documento.id_documento','=','oficio.id_documento')
                ->join('contratacion','oficio.id_oficio','=','contratacion.id_oficio')
                ->join('profesor','dependencia.id_dependencia','=','profesor.id_dependencia')
                ->join('users','profesor.id_user','=','users.id')
                ->join('dedicacion','profesor.id_dedicacion','=','dedicacion.id_dedicacion')
                ->join('asignatura','contratacion.id_asignatura','=','asignatura.id_asignatura')
                ->where('users.id_perfil','2') 
                ->where ('escuela.id_escuela',$Escuela)
                ->where('documento.id_documento',$request->id_documento)
                ->get();//OBTENGO TODOS MIS PRODUCTO
         $Profesor=User::select('nombres','apellidos','sexo')->where('id',$documentos[0]['attributes']['id_para_user'])->get();
         $membrete=User::select('nombres','apellidos','sexo')->where('id_dependencia',Auth::user()->id_dependencia)->where('id_perfil','2')->get();
         $Contrataciones=contrataciones::where('id_oficio',$documentos[0]['attributes']['id_oficio'])->get();
         $Estudiante=User::select('nombres','apellidos','sexo','cedula')->where('id',$Contrataciones[0]['attributes']['id_user'])->get();
         $ConCopia=OficioCopia::select('dependencias.nombre as concopia')
                 ->join('dependencias','oficio_copia.id_dependencia','dependencias.id_dependencias')
                 ->where('id_oficio',$documentos[0]['attributes']['id_oficio'])->get();
           view()->share(['documentos'=>$documentos,'ConCopia'=>$ConCopia,'Estudiante'=>$Estudiante,'Profesor'=>$Profesor,'membrete'=>$membrete]);//VARIABLE GLOBAL PRODUCTOS
      if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-oficio');//CARGO LA VISTA
      
            return $pdf->download('oficio.pdf');//SUGERIR NOMBRE A DESCARGAR
        
        return view('vista-html-pdf-oficio');//RETORNO A MI VISTA
        }
        else
         if(Auth::user()->id_perfil==3 && Auth::user()->id_perfil==6)
            {
        $Dependencia= Dependencia::where('id_dependencia',Auth::user()->id_dependencia)->get();
        $Escuela=$Dependencia[0]['attributes']['id_escuela'];
        $documentos = Documento::select('documento.*','dependencia.*','oficio.*','contratacion.*','asignatura.nombre as materia','asignatura.codigo',
                 'escuela.nombre as escuela','users.nombres','users.apellidos','users.sexo','dedicacion.nombre_dedicacion')
                ->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('oficio','documento.id_documento','=','oficio.id_documento')
                ->join('contratacion','oficio.id_oficio','=','contratacion.id_oficio')
                ->join('profesor','dependencia.id_dependencia','=','profesor.id_dependencia')
                ->join('users','profesor.id_user','=','users.id')
                ->join('dedicacion','profesor.id_dedicacion','=','dedicacion.id_dedicacion')
                ->join('asignatura','contratacion.id_asignatura','=','asignatura.id_asignatura')
                ->where('users.id_perfil','2') 
                ->where ('escuela.id_escuela',$Escuela)
                ->where('documento.id_documento',$request->id_documento)
                ->get();//OBTENGO TODOS MIS PRODUCTO
         $Profesor=User::select('nombres','apellidos','sexo')->where('id',$documentos[0]['attributes']['id_para_user'])->get();
         $membrete=User::select('nombres','apellidos','sexo')->where('id_dependencia',Auth::user()->id_dependencia)->where('id_perfil','2')->get();
         $Contrataciones=contrataciones::where('id_oficio',$documentos[0]['attributes']['id_oficio'])->get();
         $Estudiante=User::select('nombres','apellidos','sexo','cedula')->where('id',$Contrataciones[0]['attributes']['id_user'])->get();
         $ConCopia=OficioCopia::select('dependencias.nombre as concopia')
                 ->join('dependencias','oficio_copia.id_dependencia','dependencias.id_dependencias')
                 ->where('id_oficio',$documentos[0]['attributes']['id_oficio'])->get();
           view()->share(['documentos'=>$documentos,'ConCopia'=>$ConCopia,'Estudiante'=>$Estudiante,'Profesor'=>$Profesor,'membrete'=>$membrete]);//VARIABLE GLOBAL PRODUCTOS
      if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-oficio');//CARGO LA VISTA
      
            return $pdf->download('oficio.pdf');//SUGERIR NOMBRE A DESCARGAR
        
        return view('vista-html-pdf-oficio');//RETORNO A MI VISTA
        }
    }
    }
   }
   public function Firmar($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Oficio=Oficio::where('id_documento',$id)->get();
        $RutaOficio=new RutaOficio();
        $RutaOficio->id_estado='10';
        $RutaOficio->id_oficio=$Oficio[0]['attributes']['id_oficio'];
        $RutaOficio->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
        $RutaOficio->id_user=Auth::user()->id;
        $RutaOficio->fecha=date('Y-m-d');
        $RutaOficio->save();




        Documento::where('id_documento',$id)
          ->update(['id_estados' => '10']);
         Oficio::where('id_documento',$id)->update(['id_estados' => '10']);
         $User= User::where('id_dependencia',$RutaOficio->id_dependencia)->where('id_perfil','3')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Oficio[0]['attributes']['numero'];
        $email=env('MAIL_USERNAME');
        $Funciones->OficioAprobado($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
       
        return redirect()->back();
    }

    public function EnviadoContratacion($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Oficio=Oficio::where('id_documento',$id)->get();
        $RutaOficio=new RutaOficio();
        $RutaOficio->id_estado='17';
        $RutaOficio->id_oficio=$Oficio[0]['attributes']['id_oficio'];
        $RutaOficio->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
        $RutaOficio->id_user=Auth::user()->id;
        $RutaOficio->fecha=date('Y-m-d');
        $RutaOficio->save();
        Documento::where('id_documento',$id)
          ->update(['id_estados' => '17']);
         Oficio::where('id_documento',$id)->update(['id_estados' => '17']);
         $User= User::where('id_dependencia',$RutaOficio->id_dependencia)->where('id_perfil','2')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Oficio[0]['attributes']['numero'];
        $email=env('MAIL_USERNAME');
        $Funciones->OficioAprobado($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
       
        return redirect()->back();
    }
   /*  public function EnviadoOficioContratacion($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Oficio=Oficio::where('id_documento',$id)->get();
        $RutaOficio=new RutaOficio();
        $RutaOficio->id_estado='10';
        $RutaOficio->id_oficio=$Oficio[0]['attributes']['id_oficio'];
        $RutaOficio->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
        $RutaOficio->id_user=Auth::user()->id;
        $RutaOficio->fecha=date('Y-m-d');
        $RutaOficio->save();
        Documento::where('id_documento',$id)
          ->update(['id_estados' => '10']);
         Oficio::where('id_documento',$id)->update(['id_estados' => '10']);
         $User= User::where('id_dependencia',$RutaOficio->id_dependencia)->where('id_perfil','3')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Oficio[0]['attributes']['numero'];
        $email=env('MAIL_USERNAME');
        $Funciones->OficioAprobado($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
       
        return redirect()->back();
    }*/
     public function FirmarContratacion($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Oficio=Oficio::where('id_documento',$id)->get();
        $RutaOficio=new RutaOficio();
        $RutaOficio->id_estado='7';
        $RutaOficio->id_oficio=$Oficio[0]['attributes']['id_oficio'];
        $RutaOficio->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
        $RutaOficio->id_user=Auth::user()->id;
        $RutaOficio->fecha=date('Y-m-d');
        $RutaOficio->save();

        $Rutas=new Ruta;
        $Rutas->id_estado='7';
        $Rutas->id_documento=$id;
        $Rutas->id_dependencia=$Oficio[0]['attributes']['id_dependencia'];
        $Rutas->id_user=Auth::user()->id;
        $Rutas->fecha=date('Y-m-d');
        $Rutas->save();   
        Documento::where('id_documento',$id)
          ->update(['id_estados' => '7']);
         Oficio::where('id_documento',$id)->update(['id_estados' => '7']);
         $User= User::where('id_dependencia',$RutaOficio->id_dependencia)->where('id_perfil','3')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Oficio[0]['attributes']['numero'];
        $email=env('MAIL_USERNAME');
        $Funciones->OficioAprobado($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
       
        return redirect()->back();
    }
    public function OficioFirmado(Request $request)
    {
        $Dependencia= Dependencia::where('id_dependencia',Auth::user()->id_dependencia)->get();
        $Escuela=$Dependencia[0]['attributes']['id_escuela'];
        $documentos = Documento::select('documento.*','dependencia.*','oficio.*','contratacion.*','asignatura.nombre as materia','asignatura.codigo',
                 'escuela.nombre as escuela','users.nombres','users.apellidos','users.sexo','dedicacion.nombre_dedicacion')
                ->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('oficio','documento.id_documento','=','oficio.id_documento')
                ->join('contratacion','oficio.id_oficio','=','contratacion.id_oficio')
                ->join('profesor','dependencia.id_dependencia','=','profesor.id_dependencia')
                ->join('users','profesor.id_user','=','users.id')
                ->join('dedicacion','profesor.id_dedicacion','=','dedicacion.id_dedicacion')
                ->join('asignatura','contratacion.id_asignatura','=','asignatura.id_asignatura')
                ->where('users.id_perfil','2') 
                ->where ('escuela.id_escuela',$Escuela)
                ->where('documento.id_documento',$request->id_documento)
                ->get();//OBTENGO TODOS MIS PRODUCTO
         $Profesor=User::select('nombres','apellidos','sexo')->where('id',$documentos[0]['attributes']['id_para_user'])->get();
         $membrete=User::select('nombres','apellidos','sexo')->where('id_dependencia',Auth::user()->id_dependencia)->where('id_perfil','2')->get();
         $Contrataciones=contrataciones::where('id_oficio',$documentos[0]['attributes']['id_oficio'])->get();
         $Estudiante=User::select('nombres','apellidos','sexo','cedula')->where('id',$Contrataciones[0]['attributes']['id_user'])->get();
         $ConCopia=OficioCopia::select('dependencias.nombre as concopia')
                 ->join('dependencias','oficio_copia.id_dependencia','dependencias.id_dependencias')
                 ->where('id_oficio',$documentos[0]['attributes']['id_oficio'])->get();
  
          $ProfesorJefe=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2')
                ->where('profesor.id_dependencia', $documentos[0]['attributes']['id_dependencia_c'])
                ->get();
           $Sello=Sellos::select('sello')->where('id_users',$ProfesorJefe[0]['attributes']['id_user'])->get();
         
           view()->share(['documentos'=>$documentos,'ConCopia'=>$ConCopia,'Estudiante'=>$Estudiante,'ProfesorJefe'=>$ProfesorJefe,'membrete'=>$membrete,'Profesor'=>$Profesor,'Sello'=>$Sello]);//VARIABLE GLOBAL PRODUCTOS
    /*  if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-oficio-firmado');//CARGO LA VISTA
      
            return $pdf->download('Oficiofirmado.pdf');//SUGERIR NOMBRE A DESCARGAR
        
        return view('vista-html-pdf-oficio-firmado');//RETORNO A MI VISTA

    }*/
    if($request->has('descargar'))
        {
            $pdf = PDF::loadView('vista-html-pdf-oficio-firmado');//CARGO LA VISTA
            $pdf->output();
            $filename = 'oficiocontratacio.npdf';
            return $pdf->stream($filename, array('Attachment' => false)); 
        }
}
//OficioContratacionFirmado
public function OficioPreparadores(Request $request){
   
    $Oficio=Oficio::select('periodo.nombre as periodo','users.nombres','users.apellidos','users.sexo','oficio.*','oficio_contratacion_preparador.*')
            ->join('users','oficio.id_para_user','=','users.id')
            ->join('oficio_contratacion_preparador','oficio.id_oficio','=','oficio_contratacion_preparador.id_oficio')
            ->join('periodo','oficio_contratacion_preparador.id_periodo','=','periodo.id_periodo')
            ->orderby('users.apellidos','asc')
            ->where('periodo.id_periodo',$request->id_periodo)
            ->get();
    $ConCopia=OficioCopia::select('dependencias.nombre as concopia')
                 ->join('dependencias','oficio_copia.id_dependencia','dependencias.id_dependencias')
                 ->where('id_oficio',$Oficio[0]['attributes']['id_oficio'])->get();
    $Concurso= ConcursoPreparador::select('users.nombres','users.apellidos','users.cedula')
            ->join('users','concurso_preparador.id_user','=','users.id')
            ->where('concurso_preparador.plaza','1')->orwhere('concurso_preparador.plaza','2')->get();
    $C= Concursos::select('cupo_asignado')->where('id_periodo',$request->id_periodo)->get();
     $i=1;    
    $ProfesorJefe=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','6')
                ->where('profesor.id_dependencia','20')
                ->get();
    $Sello=SellosEscuelas::select('sello')->where('id_users',$ProfesorJefe[0]['attributes']['id_user'])->get();
         
    view()->share(['Oficio'=>$Oficio,'ProfesorJefe'=>$ProfesorJefe,'Sello'=>$Sello,'ConCopia'=>$ConCopia,'Concurso'=>$Concurso,'C'=>$C,'i'=>$i]);//VARIABLE GLOBAL PRODUCTOS
    if($request->has('descargar'))
        {
            $pdf = PDF::loadView('vista-html-oficio-preparadores-pdf');//CARGO LA VISTA
            $pdf->output();
            $filename = 'oficiopreparadores.pdf';
            return $pdf->stream($filename, array('Attachment' => false)); 
        }
}
}