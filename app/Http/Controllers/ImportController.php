<?php
namespace App\Http\Controllers;
use App\User;
use App\Profesionales;
use App\Ciudad;
use App\Comunidad;
use App\Provincia;
use App\Privacity;
use App\Pais;
use DB;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\FuncionesCotroller;
class ImportController extends Controller
{
    private $dir_tmp;
    private $dir_mark;
    private $tipo_validos;
    public function __construct() 
    {
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
    public function importar()
    {
        return view('perfil/importar');
    }
    public function import(Request $request)
    {
        $rules = array(
            'file' =>'required|required_with:'.$this->tipo_validos,
            );    
        $mensajes=array(
            'file.required'=>'El Archivo CSV A Importar es Obligatorio',
            'file.required_with'=>'El archivo CSV debe ser de los tipos '.$this->tipo_validos,
     );    
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails())
            return Response::json(array('success'=>false,'errors' => $validator->errors()->all()));
        else 
        {
        Excel::load('file/tmp/'.$request->file, function($reader) 
        {
            foreach ($reader->get() as $user) 
            {
                $email="";
                $Consulta=DB::table('users')->select('email','id')->where('email',$user->email)->get()->toArray();
                foreach($Consulta as $x){
                    $email=$x->email;
                    $id=$x->id;
                }
                if($email==$user->email)
                {  
                    DB::beginTransaction();
                    $rol="2";
                    $Funciones= new FuncionesCotroller();
                    $Hexadecimal=$Funciones->GenerarPGA($rol);  
                    $curriculum = array(
                                    "easociadoe" => $user->asoc,
                                    "licenciafederativa"=>$user->codigo,
                                    "clubpga" => $Hexadecimal,
                    );
                    
//                    $Ciudad=Ciudad::where('nombre',$user->poblacion)->get();
//                     
//                    $Id_Ciudad=$Ciudad[0]['attributes']['id_ciudad'];
                    $Provincia= Provincia::where('nombre',$user->provincia)->get();
                    $Id_Provincia=$Provincia[0]['attributes']['id_provincia'];
                    $Comunidad= Comunidad::select('comunidad.id_comunidad')->join('provincia','comunidad.id_comunidad','=','provincia.comunidad_id')->where('provincia.nombre',$user->provincia)->get();
                    $Id_Comunidad=$Comunidad[0]['attributes']['id_comunidad'];
                    $Pais=Pais::select('pais.id_pais')->join('comunidad','pais.id_pais','=','comunidad.pais_id')->where('comunidad.id_comunidad',$Id_Comunidad)->get();
                    $Id_Pais=$Pais[0]['attributes']['id_pais'];
                    DB::table('profesionales')->where('users_id',$id)->update([
                    'users_id'=>$id,
                    'pais_id'=>$Id_Pais,               
                    'ciudad_id'=>'1',
                    'provincia_id'=>$Id_Provincia,
                    'comunidad_id'=>$Id_Comunidad,
                    'clubpga'=>$Hexadecimal,
                    'nombre'=>$user->nombre,
                    'curriculum'=>json_encode($curriculum),
                    'direccion'=>'editar',
                    'telefono_1'=>$id,
                    'telefono_2'=>$id,
                    'extracto'=>'editar'
                    ]);
                    DB::commit();
                }
//                else
//                {  
//                    DB::beginTransaction();
//                    $rol="2";
//                    $Funciones= new FuncionesCotroller();
//                    $Hexadecimal=$Funciones->GenerarPGA($rol);  
//                    $password=$Funciones->GenerarPassword();
//                    $clave=  bcrypt($password);
//                    $User=User::create
//                    ([
//                        'rol_id'=>'2',
//                        'estatus_id'=>'1',               
//                        'name'=>$user->nombre,
//                        'email'=>$user->email,
//                        'password'=> $clave,
//                        'foto'=>'admin.png',
//                        'hexadecimal'=>$Hexadecimal
//                    ]);
//                    $curriculum = array(
//                                    "easociadoe" => $user->asoc,
//                                    "licenciafederativa"=>$user->codigo,
//                                    "clubpga" => $Hexadecimal,
//                    );
////                    $Ciudad=Ciudad::where('nombre',$user->poblacion)->get();
////                    $Id_Ciudad=$Ciudad[0]['attributes']['id_ciudad'];
//                    $Provincia= Provincia::where('nombre',$user->provincia)->get();
//                    $Id_Provincia=$Provincia[0]['attributes']['id_provincia'];
//                    $Comunidad= Comunidad::select('comunidad.id_comunidad')->join('provincia','comunidad.id_comunidad','=','provincia.comunidad_id')->where('provincia.nombre',$user->provincia)->get();
//                    $Id_Comunidad=$Comunidad[0]['attributes']['id_comunidad'];
//                    $Pais=Pais::select('pais.id_pais')->join('comunidad','pais.id_pais','=','comunidad.pais_id')->where('comunidad.id_comunidad',$Id_Comunidad)->get();
//                    $Id_Pais=$Pais[0]['attributes']['id_pais'];
//                    Profesionales::create
//                    ([
//                        'users_id'=>$User->id,
//                        'pais_id'=>$Id_Pais,               
//                        'ciudad_id'=>'1',
//                        'provincia_id'=>$Id_Provincia,
//                        'comunidad_id'=>$Id_Comunidad,
//                        'clubpga'=>$Hexadecimal,
//                        'nombre'=>$user->nombre,
//                        'curriculum'=>json_encode($curriculum),
//                        'direccion'=>'editar',
//                        'telefono_1'=>$User->id,
//                        'telefono_2'=>$User->id,
//                        'extracto'=>'editar'
//                    ]);
//                    $Privacity = new Privacity();
//                    $Privacity->users_id = $User->id;
//                    $Privacity->correo = '0';
//                    $Privacity->telefono = '0';
//                    $Privacity->direccion = '0';
//                    $Privacity->servicios = '0';
//                    $Privacity->curriculum = '0';
//                    $Privacity->mapa= '0';
//                    $Privacity->save();
//                    DB::commit();
//                    $admin=env('MAIL_USERNAME');
//                    $email=env('MAIL_USERNAME');;
//                    $name=$user->email;
//                    $fullname=$user->nombre;
//                    $x=$Funciones->EnviarCorreo($name,$fullname,$email,$password,$admin,$Hexadecimal);
//                }
                
            }
        });
        $success=array('success'=>true,'mensaje'=>'Se importo con exito el csv: '. $request->file);
        return response()->json($success);
        }
    }
}