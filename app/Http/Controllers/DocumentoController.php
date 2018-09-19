<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Categoria;
use App\Subcategoria;
use App\Itemsubcategoria;
use App\Circular;
use App\Convocatoria;
use App\Documento;
use App\User;
use App\Dependencia;
use App\Dependencias;
use App\Sellos;
use App\Profesor;
use App\Destinos;
use App\Ruta;
use App\TipoOficio;
use App\Asignaturas;
use Auth;
use App\Perfil;
use App\Periodos;
use Illuminate\Support\Facades\Input;
use  PDF;
use App\Http\Controllers\FuncionesController;

class DocumentoController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }
    

    public function recibidos(){
        
        $codigo_menu="Recibidos";
        $data= array( );
        $datad= array( );
        $id_depedencia= Auth::user()->id_dependencia;
        $id_usuario= Auth::user()->id;
        $id_estados=12; // Enviados
        $id_perfil=Auth::user()->id_perfil;
       // $User=User::where('id',Auth::user()->id)->get();
        //if( Auth::user()->id_dependencia==2 || Auth::user()->id_dependencia==20 || Auth::user()->id_dependencia==14){
            $data= Documento::select('documento.*','subcategoria_documento.nombre_subcategoria','estados.nombre as estados')
                ->join('estados','documento.id_estados','=','estados.id_estados')
                ->join('subcategoria_documento','documento.id_subcategoria','=','subcategoria_documento.id_subcategoria')->
                join('ruta','documento.id_documento','=','ruta.id_documento')
                ->
                where('documento.id_dependencia_c',$id_depedencia)
                ->
                 where('ruta.id_dependencia',$id_depedencia)
                ->
                where('ruta.id_estado',$id_estados)
                ->
                 where('ruta.id_estado',$id_estados)
                ->where('documento.id_estados',$id_estados)
        
                ->paginate(10);


                /*SELECT documento.*, ruta.* FROM `documento`
join ruta on documento.id_documento=ruta.id_documento
WHERE ruta.id_dependencia=2 and ruta.id_user=3 and documento.id_dependencia_c=2 and ruta.id_estado=3 */

             
        
        $periodos=Periodos::where('nombre','I-2018')->get();
        $id_periodo=$periodos[0]['attributes']['id_periodo'];
        $Dependencia= Dependencia::pluck('nombre_dependencia','id_dependencia');
       // $Rol=Perfil::pluck('nombre_perfil','id_perfil');
       // return View::make('usuarios/create')->with(['Ciudad' => $Ciudades,'Pais' => $Pais,'States' => $States,'Municipios'=>$Municipios,'Dependencia'=>$Dependencia,'Rol'=>$Rol]); 
        return view('documentos/index_')->with(['data'=>$data,'id_periodo'=>$id_periodo
            ,'Dependencia'=>$Dependencia,'destinos'=>$datad,'codigo_menu'=> $codigo_menu]);


    }

 public function DocEnviados(){
        
        $codigo_menu="Enviados";
        $data= array( );
        $datad= array( );
        $id_depedencia= Auth::user()->id_dependencia;
        $id_usuario= Auth::user()->id;
        $id_estados=17; // Enviados
        $id_perfil=Auth::user()->id_perfil;
       // $User=User::where('id',Auth::user()->id)->get();
        //if( Auth::user()->id_dependencia==2 || Auth::user()->id_dependencia==20 || Auth::user()->id_dependencia==14){
            $data= Documento::select('documento.*','subcategoria_documento.nombre_subcategoria','estados.nombre as estados')
                ->join('estados','documento.id_estados','=','estados.id_estados')
                ->join('subcategoria_documento','documento.id_subcategoria','=','subcategoria_documento.id_subcategoria')
                //->
               // join('ruta','documento.id_documento','=','ruta.id_documento')
               // ->
              /*  where('documento.id_dependencia_c',$id_depedencia)
                ->
                 where('ruta.id_dependencia',$id_depedencia)
                ->
                where('ruta.id_estado',$id_estados)
                ->
                 where('ruta.id_estado',$id_estados)*/
                ->where('documento.id_estados',$id_estados)
        
                ->paginate(10);


                /*SELECT documento.*, ruta.* FROM `documento`
join ruta on documento.id_documento=ruta.id_documento
WHERE ruta.id_dependencia=2 and ruta.id_user=3 and documento.id_dependencia_c=2 and ruta.id_estado=3 */

             
        
        $periodos=Periodos::where('nombre','I-2018')->get();
        $id_periodo=$periodos[0]['attributes']['id_periodo'];
        $Dependencia= Dependencia::pluck('nombre_dependencia','id_dependencia');
       // $Rol=Perfil::pluck('nombre_perfil','id_perfil');
       // return View::make('usuarios/create')->with(['Ciudad' => $Ciudades,'Pais' => $Pais,'States' => $States,'Municipios'=>$Municipios,'Dependencia'=>$Dependencia,'Rol'=>$Rol]); 
        return view('documentos/tablaenviados')->with(['data'=>$data,'id_periodo'=>$id_periodo
            ,'Dependencia'=>$Dependencia,'destinos'=>$datad,'codigo_menu'=> $codigo_menu]);


    }


    public function Creados(){
 $codigo_menu="Borradores";
        $data= array( );
        $datad= array( );
        $id_depedencia= Auth::user()->id_dependencia;
        $id_usuario= Auth::user()->id;
        $id_estados=1; // remitido por la secretaria
        $id_perfil=Auth::user()->id_perfil;
       // $User=User::where('id',Auth::user()->id)->get();
        //if( Auth::user()->id_dependencia==2 || Auth::user()->id_dependencia==20 || Auth::user()->id_dependencia==14){
            $data= Documento::select('documento.*','subcategoria_documento.nombre_subcategoria','estados.nombre as estados')
                ->join('estados','documento.id_estados','=','estados.id_estados')
                ->join('subcategoria_documento','documento.id_subcategoria','=','subcategoria_documento.id_subcategoria')->
                //join('ruta','documento.id_documento','=','ruta.id_documento')
               // ->
                where('documento.id_dependencia_c',$id_depedencia)
               // ->
                // where('ruta.id_dependencia',$id_depedencia)
                //->
               // where('ruta.id_estado',$id_estados)
               // ->
               //  where('ruta.id_estado',$id_estados)
                ->where('documento.id_estados',$id_estados)
                ->where('documento.id_usuario',Auth::user()->id)
                ->paginate(10);


                /*SELECT documento.*, ruta.* FROM `documento`
join ruta on documento.id_documento=ruta.id_documento
WHERE ruta.id_dependencia=2 and ruta.id_user=3 and documento.id_dependencia_c=2 and ruta.id_estado=3 */

             
        
        $periodos=Periodos::where('nombre','I-2018')->get();
        $id_periodo=$periodos[0]['attributes']['id_periodo'];
        $Dependencia= Dependencia::pluck('nombre_dependencia','id_dependencia');
       // $Rol=Perfil::pluck('nombre_perfil','id_perfil');
       // return View::make('usuarios/create')->with(['Ciudad' => $Ciudades,'Pais' => $Pais,'States' => $States,'Municipios'=>$Municipios,'Dependencia'=>$Dependencia,'Rol'=>$Rol]); 
       // if(count($data)>0)
        return view('documentos/index_')->with(['data'=>$data,'id_periodo'=>$id_periodo
            ,'Dependencia'=>$Dependencia,'destinos'=>$datad,'codigo_menu'=> $codigo_menu]);
    
    }

    public function Remitidos(){
         $codigo_menu="Por Enviar";
      $data= array( );
        $datad= array( );
        $id_depedencia= Auth::user()->id_dependencia;
        $id_usuario= Auth::user()->id;
        $id_estados=2; // remitido por la secretaria
        $id_estados_visto=3;

        $id_perfil=Auth::user()->id_perfil;
       // $User=User::where('id',Auth::user()->id)->get();
        //if( Auth::user()->id_dependencia==2 || Auth::user()->id_dependencia==20 || Auth::user()->id_dependencia==14){
            $data= Documento::select('documento.*','subcategoria_documento.nombre_subcategoria','estados.nombre as estados')
                ->join('estados','documento.id_estados','=','estados.id_estados')
                ->join('subcategoria_documento','documento.id_subcategoria','=','subcategoria_documento.id_subcategoria')->
                //join('ruta','documento.id_documento','=','ruta.id_documento')
               // ->
                where('documento.id_dependencia_c',$id_depedencia)
               // ->
                // where('ruta.id_dependencia',$id_depedencia)
                //->
               // where('ruta.id_estado',$id_estados)
               // ->
               //  where('ruta.id_estado',$id_estados)
                ->where('documento.id_estados',$id_estados)
                ->orwhere('documento.id_estados',$id_estados_visto)
                 ->orwhere('documento.id_estados',4)//POR CORRECION
                   ->orwhere('documento.id_estados',5)//CORREGIDO
                     ->orwhere('documento.id_estados',6)//POR FIRMAR
                       ->orwhere('documento.id_estados',7)//FIRMADO

                ->paginate(10);


                /*SELECT documento.*, ruta.* FROM `documento`
join ruta on documento.id_documento=ruta.id_documento
WHERE ruta.id_dependencia=2 and ruta.id_user=3 and documento.id_dependencia_c=2 and ruta.id_estado=3 */

             
        
        $periodos=Periodos::where('nombre','I-2018')->get();
        $id_periodo=$periodos[0]['attributes']['id_periodo'];
        $Dependencia= Dependencia::pluck('nombre_dependencia','id_dependencia');
       // $Rol=Perfil::pluck('nombre_perfil','id_perfil');
       // return View::make('usuarios/create')->with(['Ciudad' => $Ciudades,'Pais' => $Pais,'States' => $States,'Municipios'=>$Municipios,'Dependencia'=>$Dependencia,'Rol'=>$Rol]); 
        return view('documentos/index_')->with(['data'=>$data,'id_periodo'=>$id_periodo
            ,'Dependencia'=>$Dependencia,'destinos'=>$datad,'codigo_menu'=> $codigo_menu]);


    }





    public function enviados(){
        $data= array( );
        $datad= array( );
        $id_depedencia= Auth::user()->id_dependencia;
       // $User=User::where('id',Auth::user()->id)->get();
        //if( Auth::user()->id_dependencia==2 || Auth::user()->id_dependencia==20 || Auth::user()->id_dependencia==14){
            $data= Documento::select('documento.*','subcategoria_documento.nombre_subcategoria','estados.nombre as estados')
                ->join('estados','documento.id_estados','=','estados.id_estados')
                ->join('subcategoria_documento','documento.id_subcategoria','=','subcategoria_documento.id_subcategoria')->
                where('documento.id_dependencia_c',$id_depedencia)->paginate(10);

             
        
        $periodos=Periodos::where('nombre','I-2018')->get();
        $id_periodo=$periodos[0]['attributes']['id_periodo'];
        $Dependencia= Dependencia::pluck('nombre_dependencia','id_dependencia');
       // $Rol=Perfil::pluck('nombre_perfil','id_perfil');
       // return View::make('usuarios/create')->with(['Ciudad' => $Ciudades,'Pais' => $Pais,'States' => $States,'Municipios'=>$Municipios,'Dependencia'=>$Dependencia,'Rol'=>$Rol]); 
        return view('documentos/index')->with(['data'=>$data,'id_periodo'=>$id_periodo
            ,'Dependencia'=>$Dependencia,'destinos'=>$datad]);


    }
    public function index($id=null)
    {
        $data= array( );
        $datad= array( );
       // $User=User::where('id',Auth::user()->id)->get();
        if( Auth::user()->id_dependencia==2 || Auth::user()->id_dependencia==20 || Auth::user()->id_dependencia==14){

            $data= Documento::select('documento.*','subcategoria_documento.nombre_subcategoria','estados.nombre as estados')
                ->join('estados','documento.id_estados','=','estados.id_estados')
                ->join('subcategoria_documento','documento.id_subcategoria','=','subcategoria_documento.id_subcategoria')->paginate(10); 
             
        }else{
            //destinos
           // DB::
           $id_depedencia= Auth::user()->id_dependencia;
           $datad =Ruta::select('ruta.*','subcategoria_documento.nombre_subcategoria',
            'estados.nombre as estados','documento.*','users.nombres','users.apellidos','dependencia.*')->
           join('estados','ruta.id_estado','=','estados.id_estados')->
           join('documento','documento.id_documento','=','ruta.id_documento')->
           join('subcategoria_documento','documento.id_subcategoria','=','subcategoria_documento.id_subcategoria')->
           join('users','ruta.id_user','=','users.id')->
           join('dependencia','dependencia.id_dependencia','=','users.id_dependencia')->
           where('ruta.id_dependencia',$id_depedencia)->paginate(10);
        }
        $periodos=Periodos::where('nombre','I-2018')->get();
        $id_periodo=$periodos[0]['attributes']['id_periodo'];
        $Dependencia= Dependencia::pluck('nombre_dependencia','id_dependencia');
       // $Rol=Perfil::pluck('nombre_perfil','id_perfil');
       // return View::make('usuarios/create')->with(['Ciudad' => $Ciudades,'Pais' => $Pais,'States' => $States,'Municipios'=>$Municipios,'Dependencia'=>$Dependencia,'Rol'=>$Rol]); 
        if(count($data)>0){
        return view('documentos/index')->with(['data'=>$data,'id_periodo'=>$id_periodo
            ,'Dependencia'=>$Dependencia,'destinos'=>$datad]);
        }else{
            /************FUNCION CREAR DOCUMENTO*/
            //$this->create();
             $Categoria=Categoria::pluck('nombre_categoria','id_categoria');
        $SubCategoria=Subcategoria::pluck('nombre_subcategoria','id_subcategoria');
        $ItemSubCategoria= Itemsubcategoria::pluck('nombre_itemsubcategoria','id_itemsubcategoria');
        $Dependencia=Dependencias::pluck('nombre','id_dependencias');
        $TipoOficio=TipoOficio::pluck('nombre','id_tipo_oficio');
        $Perfil=Perfil::pluck('nombre_perfil','id_perfil');
        $Profesor = User::select(DB::table('users')
                ->raw("CONCAT(users.nombres,' ',users.apellidos)  AS nombre"),'id')->where('id_dependencia',Auth::user()->id_dependencia)->where('id_perfil','4')
                ->pluck('nombre','id'); 
        $Asignatura= Asignaturas::pluck('nombre','id_asignatura');
        $Usuarios = User::select(DB::table('users')
                ->raw("CONCAT(users.nombres,' ',users.apellidos)  AS fullname"),'id')->where('id_perfil','6')
                ->pluck('fullname','id'); 
        return view('documentos/create')->with(['Asignatura'=>$Asignatura,'Profesor'=>$Profesor,'TipoOficio'=>$TipoOficio,'Usuarios'=>$Usuarios,'Perfil'=>$Perfil,'Dependencia'=>$Dependencia,'Categoria'=>$Categoria,'SubCategoria'=>$SubCategoria,'ItemSubCategoria'=>$ItemSubCategoria]);
        }

    }
    public function create()
    {
        $Categoria=Categoria::pluck('nombre_categoria','id_categoria');
        $SubCategoria=Subcategoria::pluck('nombre_subcategoria','id_subcategoria');
        $ItemSubCategoria= Itemsubcategoria::pluck('nombre_itemsubcategoria','id_itemsubcategoria');
        $Dependencia=Dependencias::pluck('nombre','id_dependencias');
        $TipoOficio=TipoOficio::pluck('nombre','id_tipo_oficio');
        $Perfil=Perfil::pluck('nombre_perfil','id_perfil');
        $Profesor = User::select(DB::table('users')
                ->raw("CONCAT(users.nombres,' ',users.apellidos)  AS nombre"),'id')->where('id_dependencia',Auth::user()->id_dependencia)->where('id_perfil','4')
                ->pluck('nombre','id'); 
        $Asignatura= Asignaturas::pluck('nombre','id_asignatura');
        $Usuarios = User::select(DB::table('users')
                ->raw("CONCAT(users.nombres,' ',users.apellidos)  AS fullname"),'id')->where('id_perfil','6')
                ->pluck('fullname','id'); 
        return view('documentos/create')->with(['Asignatura'=>$Asignatura,'Profesor'=>$Profesor,'TipoOficio'=>$TipoOficio,'Usuarios'=>$Usuarios,'Perfil'=>$Perfil,'Dependencia'=>$Dependencia,'Categoria'=>$Categoria,'SubCategoria'=>$SubCategoria,'ItemSubCategoria'=>$ItemSubCategoria]);
    }


        public function create_documento($id)
    {

         $Categoria=Categoria::pluck('nombre_categoria','id_categoria');
        $SubCategoria=Subcategoria::pluck('nombre_subcategoria','id_subcategoria');
        $ItemSubCategoria= Itemsubcategoria::pluck('nombre_itemsubcategoria','id_itemsubcategoria');
        $Dependencia=Dependencias::pluck('nombre','id_dependencias');
        $TipoOficio=TipoOficio::pluck('nombre','id_tipo_oficio');
        $Perfil=Perfil::pluck('nombre_perfil','id_perfil');
        $Profesor = User::select(DB::table('users')
                ->raw("CONCAT(users.nombres,' ',users.apellidos)  AS nombre"),'id')->where('id_dependencia',Auth::user()->id_dependencia)->where('id_perfil','4')
                ->pluck('nombre','id'); 
        $Asignatura= Asignaturas::pluck('nombre','id_asignatura');
        $Usuarios = User::select(DB::table('users')
                ->raw("CONCAT(users.nombres,' ',users.apellidos)  AS fullname"),'id')->where('id_perfil','6')
                ->pluck('fullname','id'); 
        


        switch ($id) {
            case '1':
                $url='circulares/create';
                break;
             case '2':
                $url='convocatorias/create';
                break;
                 case '3':
                $url='contratacion/create';
                break;
            default:
              
                break;

        }
        return view($url)->with(['Asignatura'=>$Asignatura,'Profesor'=>$Profesor,'TipoOficio'=>$TipoOficio,'Usuarios'=>$Usuarios,'Perfil'=>$Perfil,'Dependencia'=>$Dependencia,'Categoria'=>$Categoria,'SubCategoria'=>$SubCategoria,'ItemSubCategoria'=>$ItemSubCategoria]);
    }



    public function AgregarDocumento(Request $request){
         $rules = array(
            'descripcion_documento' => 'required',
            'para' => 'required',
            'cuerpo' => 'required',
            'id_categoria' => 'required',
            'id_subcategoria' => 'required',
            'id_itemsubcategoria' =>'required',
           
            
            );    
        $mensajes=array(
            'id_categoria.required'=>'La Categoria Es Obligatoria',
            'id_subcategoria.required'=>'El Tipo De Documento Es  Obligatorio',
            'id_itemsubcategoria.required'=>'La Plantilla Es  Obligatoria',
            'descripcion_documento.required'=>'Descripcion del Documento Es  Obligatoria',
            'para.required'=>'Para Es  Obligatorio',
            'cuerpo.required'=>'El Cuerpo del Documento es Obligatorio',
             ); 
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
            DB::beginTransaction();
            $User=User::where('id',Auth::user()->id)->get();
            $IdDependencia=$User[0]['attributes']['id_dependencia'];
            $id_perfil=$User[0]['attributes']['id_perfil'];
            $Dependencia=Dependencia::where('id_dependencia',$IdDependencia)->get();
            $Profesor=Profesor::select('users.nombres','users.apellidos','users.sexo')
                    ->join('users','profesor.id_user','=','users.id')
                    ->where('profesor.id_dependencia',$Dependencia[0]['attributes']['id_dependencia'])
                    ->where('users.id_perfil','2')->get();
            $codigo_documento_generado=time();
            $Documento = new Documento();
            $Documento->id_dependencia_c= Auth::user()->id_dependencia;
            $Documento->id_usuario=Auth::user()->id;
            $Documento->id_categoria=$request->id_categoria;
            $Documento->id_subcategoria=$request->id_subcategoria;
            $Documento->id_itemsubcategoria=$request->id_itemsubcategoria;
            
            if($id_perfil==2){//jefe de departamento
               $Documento->id_estados="6";
            }else{
                $Documento->id_estados="1";
            }
            
            
            $Documento->codigo_plantilla=$codigo_documento_generado;
            $Documento->descripcion_documento=$request->descripcion_documento;
            $Documento->save();
            $Circular=new Circular;
            $year=date('Y');
            $Verificar=Documento::select('circular.numero')
                                  ->join('circular','documento.id_documento','=','circular.id_documento')
                                  ->where('circular.anio_circular',$year)
                                  ->where('documento.id_dependencia_c',Auth::user()->id_dependencia)
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
            if($Total>0)
            {   
                $numero=$Total+1;
                $Circular->id_documento=$Documento->id_documento;
                $Circular->id_itemsubcategoria=$request->id_itemsubcategoria;
                $Circular->nota_circular=$request->descripcion_documento;
                $Circular->para_circular=$request->para;
                $Circular->de_circular=$de;
                $Circular->cuerpo_circular =$request->cuerpo;
                $Circular->numero=$numero;
                $Circular->anio_circular=$year;
                $Circular->save();
            }
            else
            if($Total==0)
            {   
                $numero=1;
                $Circular->id_documento=$Documento->id_documento;
                $Circular->id_itemsubcategoria=$request->id_itemsubcategoria;
                $Circular->nota_circular=$request->descripcion_documento;
                $Circular->para_circular=$request->para;
                $Circular->de_circular=$de;
                $Circular->cuerpo_circular =$request->cuerpo;
                $Circular->numero=$numero;
                $Circular->anio_circular=$year;
                $Circular->save();
            }
        $Ruta=new Ruta;
            if($id_perfil==2){//jefe de departamento
               $Documento->id_estados="1";
                $Ruta=new Ruta;
                $Ruta->id_estado=$Documento->id_estados;
                $Ruta->id_documento=$Circular->id_documento;
                $Ruta->id_dependencia=$Documento->id_dependencia_c;
                $Ruta->id_user=Auth::user()->id;
                $Ruta->fecha=date('Y-m-d');
                $Ruta->save();
               $Documento->id_estados="6";
                $Ruta=new Ruta;
            $Ruta->id_estado=$Documento->id_estados;
            $Ruta->id_documento=$Circular->id_documento;
            $Ruta->id_dependencia=$Documento->id_dependencia_c;
            $Ruta->id_user=Auth::user()->id;
            $Ruta->fecha=date('Y-m-d');
            $Ruta->save();
            }else{
                $Documento->id_estados="1";
                 //$Ruta=new Ruta;
            $Ruta->id_estado=$Documento->id_estados;
            $Ruta->id_documento=$Circular->id_documento;
            $Ruta->id_dependencia=$Documento->id_dependencia_c;
            $Ruta->id_user=Auth::user()->id;
            $Ruta->fecha=date('Y-m-d');
            $Ruta->save();
            }

           
            DB::commit();
            $success=array('success'=>true,'mensaje'=>'Documento Creado con Exito!!'.$Documento->codigo_plantilla);
            return response()->json($success);
    }
       }


public function AgregarDocumentoConvocatoria(Request $request){
         $rules = array(
            'descripcion_documento' => 'required',
            'para' => 'required',
            'cuerpo' => 'required',
            'id_categoria' => 'required',
            'id_subcategoria' => 'required',
            'id_itemsubcategoria' =>'required',
           
            
            );    
        $mensajes=array(
            'id_categoria.required'=>'La Categoria Es Obligatoria',
            'id_subcategoria.required'=>'El Tipo De Documento Es  Obligatorio',
            'id_itemsubcategoria.required'=>'La Plantilla Es  Obligatoria',
            'descripcion_documento.required'=>'Descripcion del Documento Es  Obligatoria',
            'para.required'=>'Para Es  Obligatorio',
            'cuerpo.required'=>'El Cuerpo del Documento es Obligatorio',
             ); 
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
            DB::beginTransaction();
            $User=User::where('id',Auth::user()->id)->get();
            $IdDependencia=$User[0]['attributes']['id_dependencia'];
            $id_perfil=$User[0]['attributes']['id_perfil'];
            $Dependencia=Dependencia::where('id_dependencia',$IdDependencia)->get();
            $Profesor=Profesor::select('users.nombres','users.apellidos','users.sexo')
                    ->join('users','profesor.id_user','=','users.id')
                    ->where('profesor.id_dependencia',$Dependencia[0]['attributes']['id_dependencia'])
                    ->where('users.id_perfil','2')->get();
            $codigo_documento_generado=time();// codigo aleatori
            $Documento = new Documento();
            $Documento->id_dependencia_c= Auth::user()->id_dependencia;// id de la dependencia que crea el documento""
            $Documento->id_usuario=Auth::user()->id;
            $Documento->id_categoria=$request->id_categoria;
            $Documento->id_subcategoria=$request->id_subcategoria;
            $Documento->id_itemsubcategoria=$request->id_itemsubcategoria;
            
            if($id_perfil==2){//jefe de departamento
               $Documento->id_estados="6";
            }else{
                $Documento->id_estados="1";
            }
            
            
            $Documento->codigo_plantilla=$codigo_documento_generado;
            $Documento->descripcion_documento=$request->descripcion_documento;
            $Documento->save();
            $Circular=new Convocatoria;
            $year=date('Y');
            $Verificar=Documento::select('convocatoria.numero')
                                  ->join('convocatoria','documento.id_documento','=','convocatoria.id_documento')
                                  ->where('convocatoria.anio_convocatoria',$year)
                                  ->where('documento.id_dependencia_c',Auth::user()->id_dependencia)
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
            if($Total>0)
            {   
                $numero=$Total+1;
                $Circular->id_documento=$Documento->id_documento;
                $Circular->id_itemsubcategoria=$request->id_itemsubcategoria;
                $Circular->nota_convocatoria=$request->descripcion_documento;
                $Circular->para_convocatoria=$request->para;
                $Circular->de_convocatoria=$de;
                $Circular->cuerpo_convocatoria =$request->cuerpo;
                $Circular->numero=$numero;
                $Circular->anio_convocatoria=$year;
                $Circular->save();
            }
            else
            if($Total==0)
            {   
                /*$numero=1;
                $Circular->id_documento=$Documento->id_documento;
                $Circular->id_itemsubcategoria=$request->id_itemsubcategoria;
                $Circular->nota_circular=$request->descripcion_documento;
                $Circular->para_circular=$request->para;
                $Circular->de_circular=$de;
                $Circular->cuerpo_circular =$request->cuerpo;
                $Circular->numero=$numero;
                $Circular->anio_circular=$year;
                $Circular->save();*/
                $numero=1;
                $Circular->id_documento=$Documento->id_documento;
                $Circular->id_itemsubcategoria=$request->id_itemsubcategoria;
                $Circular->nota_convocatoria=$request->descripcion_documento;
                $Circular->para_convocatoria=$request->para;
                $Circular->de_convocatoria=$de;
                $Circular->cuerpo_convocatoria =$request->cuerpo;
                $Circular->numero=$numero;
                $Circular->anio_convocatoria=$year;
                $Circular->save();
            }
        $Ruta=new Ruta;
            if($id_perfil==2){//jefe de departamento
               $Documento->id_estados="1";
                $Ruta=new Ruta;
                $Ruta->id_estado=$Documento->id_estados;
                $Ruta->id_documento=$Circular->id_documento;
                $Ruta->id_dependencia=$Documento->id_dependencia_c;
                $Ruta->id_user=Auth::user()->id;
                $Ruta->fecha=date('Y-m-d');
                $Ruta->save();
               $Documento->id_estados="6";
                $Ruta=new Ruta;
            $Ruta->id_estado=$Documento->id_estados;
            $Ruta->id_documento=$Circular->id_documento;
            $Ruta->id_dependencia=$Documento->id_dependencia_c;
            $Ruta->id_user=Auth::user()->id;
            $Ruta->fecha=date('Y-m-d');
            $Ruta->save();
            }else{
                $Documento->id_estados="1";
                 //$Ruta=new Ruta;
            $Ruta->id_estado=$Documento->id_estados;
            $Ruta->id_documento=$Circular->id_documento;
            $Ruta->id_dependencia=$Documento->id_dependencia_c;
            $Ruta->id_user=Auth::user()->id;
            $Ruta->fecha=date('Y-m-d');
            $Ruta->save();
            }

            $url='creados';
             if($id_perfil==2){//jefe de departamento
                $url='remitidos';
             }
            
            $success=array('success'=>true,'mensaje'=>'Documento Creado con Exito!!'.$Documento->codigo_plantilla,'url'=>$url);
            return response()->json($success);
    }
       }
    public function CorregirDocumentos(Request $request)   
    {
       $rules = array(
            'descripcion_documento' => 'required',
            'para' => 'required',
            'cuerpo' => 'required',
            'id_categoria' => 'required',
            'id_subcategoria' => 'required',
            'id_itemsubcategoria' =>'required',
            );    
        $mensajes=array(
            'id_categoria.required'=>'La Categoria Es Obligatoria',
            'id_subcategoria.required'=>'El Tipo De Documento Es  Obligatorio',
            'id_itemsubcategoria.required'=>'La Plantilla Es  Obligatoria',
            'descripcion_documento.required'=>'Descripcion del Documento Es  Obligatoria',
            'para.required'=>'Para  Obligatorio',
            'cuerpo.required'=>'El Cuerpo del Documento es Obligatorio',
             ); 
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
              return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
            DB::beginTransaction();
            Documento::where('id_documento',$request->id_documento)->update([
                'id_categoria' => $request->id_categoria,
                'id_subcategoria' => $request->id_subcategoria,
                'id_itemsubcategoria' => $request->id_itemsubcategoria,
                'descripcion_documento' => $request->descripcion_documento
                ]);
            Circular::where('id_documento',$request->id_documento)->update([
                   'id_itemsubcategoria' => $request->id_itemsubcategoria,
                   'para_circular' => $request->para,
                   'cuerpo_circular' => $request->cuerpo,
                   'nota_circular' => $request->descripcion_documento,
                ]);
            $id=$request->id_documento;
            $Documento=Documento::where('id_documento',$id)->get();
         //echo '<pre>';print_r( $Documento);
          if( $Documento[0]['attributes']['id_estados']!=1)
           $this->Correcion($request->id_documento);
            DB::commit();
            $success=array('success'=>true,'mensaje'=>'Documento Corregido con Exito!!');
            return response()->json($success);
   
        } 
    }
     public function Correcion($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Documento=Documento::where('id_documento',$id)->get();
        $Circular=Circular::where('id_documento',$id)->get();
        $Rutas=new Ruta;
        $Rutas->id_estado='5';
        $Rutas->id_documento=$id;
        $Rutas->id_dependencia=$Documento[0]['attributes']['id_dependencia_c'];
        $Rutas->id_user=Auth::user()->id;
        $Rutas->fecha=date('Y-m-d');
        $Rutas->save();
        Documento::where('id_documento',$id)
          ->update(['id_estados' => '5']);
        $User= User::where('id_dependencia',$Rutas->id_dependencia)->where('id_perfil','2')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Circular[0]['attributes']['numero'];
        $email=env('MAIL_USERNAME');
        $Funciones->Corregido($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
     //   return redirect()->back();
    }
    public function GetSubcategoria(Request $request, $id)
    {
        if ($request->ajax()) 
        {
            $Subcategoria =Subcategoria::subcategorias($id);
            return response()->json($Subcategoria);
        }
    }
    public function GetItemSubcategoria(Request $request, $id)
    {
        if ($request->ajax()) 
        {
            $ItemSubcategoria = Itemsubcategoria::itemsubcategorias($id);
            return response()->json($ItemSubcategoria);
        }
    }
    public function EnviarDocumento($id)
    {  $Codigo=$id;
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Documento=Documento::where('id_documento',$id)->get();
        $Circular=Circular::where('id_documento',$id)->get();
        $Rutas=new Ruta;
        $Rutas->id_estado='2';
        $Rutas->id_documento=$id;
        $Rutas->id_dependencia=$Documento[0]['attributes']['id_dependencia_c'];
        $Rutas->id_user=Auth::user()->id;
        $Rutas->fecha=date('Y-m-d');
        $Rutas->save();
        Documento::where('id_documento',$id)
          ->update(['id_estados' => '2']);
        $User= User::where('id_dependencia',$Rutas->id_dependencia)->where('id_perfil','2')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
       // $Codigo=$Circular[0]['attributes']['numero'];

        $email=env('MAIL_USERNAME');
        $Funciones->EnviarDocumento($name,$fullname,$Codigo,$email,$admin);
         DB::commit();

        return redirect()->back();
    }
     public function PorCorrecion($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Documento=Documento::where('id_documento',$id)->get();
        $Circular=Circular::where('id_documento',$id)->get();
        $Rutas=new Ruta;
        $Rutas->id_estado='4';
        $Rutas->id_documento=$id;
        $Rutas->id_dependencia=$Documento[0]['attributes']['id_dependencia_c'];
        $Rutas->id_user=Auth::user()->id;
        $Rutas->fecha=date('Y-m-d');
        $Rutas->save();
        Documento::where('id_documento',$id)
          ->update(['id_estados' => '4']);
        $User= User::where('id_dependencia',$Rutas->id_dependencia)->where('id_perfil','3')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Circular[0]['attributes']['numero'];
        $email=env('MAIL_USERNAME');
        $Funciones->PorCorrecion($name,$fullname,$Codigo,$email,$admin);
         DB::commit();
        return redirect()->back();
    }
    public function Visto($id)
    {   $Codigo=$id;
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Documento=Documento::where('id_documento',$id)->get();
        $Circular=Circular::where('id_documento',$id)->get();
        $Rutas=new Ruta;
        $Rutas->id_estado='3';
        $Rutas->id_documento=$id;
        $Rutas->id_dependencia=$Documento[0]['attributes']['id_dependencia_c'];
        $Rutas->id_user=Auth::user()->id;
        $Rutas->fecha=date('Y-m-d');
        $Rutas->save();
        Documento::where('id_documento',$id)
          ->update(['id_estados' => '3']);
         DB::commit();
        $User= User::where('id_dependencia',$Rutas->id_dependencia)->where('id_perfil','3')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        //$Codigo=$Circular[0]['attributes']['numero'];
        $email=env('MAIL_USERNAME');
        $Funciones->Visto($name,$fullname,$Codigo,$email,$admin);
        return redirect()->back();
    }
    public function Firmado($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Documento=Documento::where('id_documento',$id)->get();
        $Circular=Circular::where('id_documento',$id)->get();
        $Rutas=new Ruta;
        $Rutas->id_estado='7';
        $Rutas->id_documento=$id;
        $Rutas->id_dependencia=$Documento[0]['attributes']['id_dependencia_c'];
        $Rutas->id_user=Auth::user()->id;
        $Rutas->fecha=date('Y-m-d');
        $Rutas->save();
        Documento::where('id_documento',$id)
          ->update(['id_estados' => '7']);
         $User= User::where('id_dependencia',$Rutas->id_dependencia)->where('id_perfil','3')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Circular[0]['attributes']['numero'];
        $email=env('MAIL_USERNAME');
        $Funciones->Firmado($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
       
        return redirect()->back();
    }
    public function CorregirDocumento($id)
    {
        $Categoria=Categoria::pluck('nombre_categoria','id_categoria');
        $SubCategoria=Subcategoria::pluck('nombre_subcategoria','id_subcategoria');
        $ItemSubCategoria= Itemsubcategoria::pluck('nombre_itemsubcategoria','id_itemsubcategoria'); 
        $Documento =Documento::find($id);
        $Circular=Circular::where('id_documento',$id)->get();
        return view('documentos/porcorrecion')->with(['Documento'=>$Documento,'Circular'=>$Circular,'Categoria'=>$Categoria,'SubCategoria'=>$SubCategoria,'ItemSubCategoria'=>$ItemSubCategoria]);
    }
  
     public function vistaHTMLPDF(Request $request)
    {
         
        $documentos = Documento::select('documento.*','dependencia.*','circular.*','escuela.nombre as escuela','users.nombres','users.apellidos','users.sexo')
                ->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('circular','documento.id_documento','=','circular.id_documento')
                ->join('profesor','dependencia.id_dependencia','=','profesor.id_dependencia')
                ->join('users','profesor.id_user','=','users.id')
                ->where('documento.id_documento',$request->id_documento)->where('profesor.id_profesor','2')
                ->get();//OBTENGO TODOS MIS PRODUCTO
        view()->share('documentos',$documentos);//VARIABLE GLOBAL PRODUCTOS
        if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf');//CARGO LA VISTA
              $pdf->output();
            $filename = 'circular.pdf';
            return $pdf->stream($filename, array('Attachment' => false));
      
            //return $pdf->download('circular.pdf');//SUGERIR NOMBRE A DESCARGAR
        
            
        }
        if(Auth::user()->id_perfil==2){
         $this->Visto($request->id_documento);}
        return view('vista-html-pdf');//RETORNO A MI VISTA
        
    }
     public function vistaHTMLPDFConvocatoria(Request $request)
    {
         
        $documentos = Documento::select('documento.*','dependencia.*','convocatoria.*','escuela.nombre as escuela','users.nombres','users.apellidos','users.sexo')
                ->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('convocatoria','documento.id_documento','=','convocatoria.id_documento')
                ->join('profesor','dependencia.id_dependencia','=','profesor.id_dependencia')
                ->join('users','profesor.id_user','=','users.id')
                ->where('documento.id_documento',$request->id_documento)->where('users.id_perfil','2')
                ->get();//OBTENGO TODOS MIS PRODUCTO
             // echo '<pre>';  printf($documentos); die();
        view()->share('documentos',$documentos);//VARIABLE GLOBAL PRODUCTOS
        if($request->has('descargar')){
            $pdf = PDF::loadView('convocatorias/vista-html-pdf_convocatoria');//CARGO LA VISTA
              $pdf->output();
            $filename = 'circular.pdf';
            return $pdf->stream($filename, array('Attachment' => false));
      
            //return $pdf->download('circular.pdf');//SUGERIR NOMBRE A DESCARGAR
        
            
        }
        if(Auth::user()->id_perfil==2){
         $this->Visto($request->id_documento);}
        return view('convocatorias/vista-html-pdf_convocatoria');//RETORNO A MI VISTA
        
    }

    public function PorFirmar($id)
    {
        DB::beginTransaction();
        $Funciones= new FuncionesController();
        $Documento=Documento::where('id_documento',$id)->get();
        $Circular=Circular::where('id_documento',$id)->get();
        $Rutas=new Ruta;
        $Rutas->id_estado='6';
        $Rutas->id_documento=$id;
        $Rutas->id_dependencia=$Documento[0]['attributes']['id_dependencia_c'];
        $Rutas->id_user=Auth::user()->id;
        $Rutas->fecha=date('Y-m-d');
        $Rutas->save();
        Documento::where('id_documento',$id)
          ->update(['id_estados' => '6']);
        
        $User= User::where('id_dependencia',$Rutas->id_dependencia)->where('id_perfil','3')->get();
        $admin=$User[0]['attributes']['email'];
        $name=$User[0]['attributes']['email'];
        $fullname=$User[0]['attributes']['nombres'].' , '.$User[0]['attributes']['apellidos'];
        $Codigo=$Circular[0]['attributes']['numero'];
        $email=env('MAIL_USERNAME');
        $Funciones->PorFirmar($name,$fullname,$Codigo,$email,$admin);
        DB::commit();
        return redirect()->back();
    }
   
    public function vistaHTMLPDFPorFirmar(Request $request)
    {
        
         $documentos = Documento::select('documento.*','dependencia.*','circular.*','escuela.nombre as escuela','users.nombres','users.apellidos','users.sexo')
                ->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('circular','documento.id_documento','=','circular.id_documento')
                ->join('profesor','dependencia.id_dependencia','=','profesor.id_dependencia')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2') 
                ->where('documento.id_documento',$request->id_documento)
                ->get();//OBTENGO TODOS MIS PRODUCTO
         $Profesor=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2')
                ->where('profesor.id_dependencia', $documentos[0]['attributes']['id_dependencia_c'])
                ->get();
           $Sello=Sellos::select('sello')->where('id_users',$Profesor[0]['attributes']['id_user'])->get();
          view()->share(['Profesor'=>$Profesor,'documentos'=>$documentos,'Sello'=>$Sello]);//VARIABLE GLOBAL PRODUCTOS
    if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-porfirmar');//CARGO LA VISTA
      
            return $pdf->download('circularporfirmar.pdf');//SUGERIR NOMBRE A DESCARGAR
   
        return view('vista-html-pdf-porfirmar');//RETORNO A MI VISTA
    }

    /**/
    }
     
    public function vistaHTMLPDFFirmado(Request $request)
    {
         $documentos = Documento::select('documento.*','dependencia.*','circular.*','escuela.nombre as escuela','users.nombres','users.apellidos','users.sexo')
                ->join('dependencia','documento.id_dependencia_c','=','dependencia.id_dependencia')
                ->join('escuela','dependencia.id_escuela','=','escuela.id_escuela')
                ->join('circular','documento.id_documento','=','circular.id_documento')
                ->join('profesor','dependencia.id_dependencia','=','profesor.id_dependencia')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2') 
                ->where('documento.id_documento',$request->id_documento)
                ->get();//OBTENGO TODOS MIS PRODUCTO
          $Profesor=Profesor::select('id_user','firma')
                ->join('users','profesor.id_user','=','users.id')
                ->where('users.id_perfil','2')
                ->where('profesor.id_dependencia', $documentos[0]['attributes']['id_dependencia_c'])
                ->get();
           $Sello=Sellos::select('sello')->where('id_users',$Profesor[0]['attributes']['id_user'])->get();
         
           view()->share(['Profesor'=>$Profesor,'documentos'=>$documentos,'Sello'=>$Sello]);//VARIABLE GLOBAL PRODUCTOS
      if($request->has('descargar')){
            $pdf = PDF::loadView('vista-html-pdf-firmado');//CARGO LA VISTA
      
          // return $pdf->download('circularfirmado.pdf');//SUGERIR NOMBRE A DESCARGAR
        
        //return view('vista-html-pdf-firmado');//RETORNO A MI VISTA
        $pdf->output();
            $filename = 'circular.pdf';
            return $pdf->stream($filename, array('Attachment' => false));
    }
    /*  $pdf->output();
            $filename = 'circular.pdf';
            return $pdf->stream($filename, array('Attachment' => false));*/


    }

    public function EnviarDocumentocircular(Request $request){
//echo '<pre>';print_r($request->concopia);
        if($request->concopia!="")
            {
                $data=json_decode($request->concopia,true);
                foreach ($data as $row)
                {   
                    $OficioCopia=new Destinos();
                    $OficioCopia->id_documento=$request->id_documento;
                    $OficioCopia->id_estado=17;//enviados a otros departamentos
                    $OficioCopia->id_dependencia=$row;
                    $OficioCopia->save();
                    $Rutas=new Ruta;
                    $Rutas->id_estado='17';
                    $Rutas->id_documento=$request->id_documento;
                    $Rutas->id_dependencia=$row;//$Documento[0]['attributes']['id_dependencia_c'];
                    $Rutas->id_user=Auth::user()->id;
                    $Rutas->fecha=date('Y-m-d');
                    $Rutas->save();
                } 
            }
            Documento::where('id_documento',$request->id_documento)->update(['id_estados' => '17']);

           
             DB::commit();
            $success=array('success'=>true,'mensaje'=>'Documento Enviado con exito!!');
            return response()->json($success);
    }
}


