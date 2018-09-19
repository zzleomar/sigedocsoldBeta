<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Perfil;
use App\Pais;
use App\States;
use App\Municipios;
use App\Ciudades;
use App\Dependencia;
use App\Ruta;
use App\Status;
use App\Nom_Nucleo;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use View;
use App\Http\Controllers\FuncionesController;
use DB;
use Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $dir_tmp;
    private $dir_mark;
    private $tipo_validos;
    public function __construct() 
    {  $this->middleware('auth');
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
    public function index()
    {
        $rol=Perfil::pluck('nombre_perfil','id_perfil');
        $Nucleo= Nom_Nucleo::pluck('descripcion','id_nom_nucleo');  
        $User= array();
        $User= User::select('users.*','perfil.nombre_perfil','dependencia.nombre_dependencia')->join('perfil','users.id_perfil','=','perfil.id_perfil')->leftjoin('dependencia','users.id_dependencia','=','dependencia.id_dependencia')
               ->orderby('users.id','asc')
               ->paginate(10);
        return 
        [
            'pagination'=>
             [
                'total'=>$User->total(),
                'current_page'=>$User->currentPage(),
                'per_page'=>$User->perPage(),
                'last_page'=>$User->lastPage(),
                'from'=>$User->firstItem(),
                'to'=>$User->lastItem(),
            ],
            'user'=>$User , 
            'rol'=>$rol,
            'Nucleo'=>$Nucleo
    
        ];
    }
    public function AgregarUsuario(Request $request)
    {
        $rules = [
            'name'      => 'required|min:6|max:20',
            'email'     => 'required|email|unique:users',
            'dependencia_id'    =>'required',
            'id_nom_nucleo'    =>'required',
            'status_id'    =>'required',
            'rol_id'    =>'required'
            ];
            $mensajes=array(
            'name.required'=>'El  Nombre es Obligatorio',
            'name.min'=>'El  Nombre debe ser minimo de 6 Caracteres',
            'name.max'=>'El  Nombre debe ser Maximo de 20 Caracteres',
            'dependencia_id.required'=>'La Dependencia es Obligatoria',
            'rol_id.required'=>'El Rol es Obligatorio',
            'id_nom_nucleo.required'=>'El Nucleo es Obligatorio',
            'status_id.required'=>'El Status es Obligatorio',
            'email.required'=>'El correo es Obligatorio',
            'email'=>'debe introducir un email valido',
            'email.unique'=>'Ya existe un email con ese Nombre',
            );    
       
        $validator = Validator::make(Input::all(), $rules,$mensajes);
       if ($validator->fails()) 
            {
                return  \Response::json([
                    'created' => false,
                    'errors'  => $validator->errors()->all()
                ],500);
            } else 
        {
            DB::beginTransaction();
            $Funciones= new FuncionesController();
            $password=$Funciones->GenerarPassword();
            $request->password=  bcrypt($password);
            $User = new User();
            $User->id_dependencia=$request->dependencia_id;
            $User->personal_id=$request->personal_id;
            $User->id_perfil=$request->rol_id;
            $User->id_nom_nucleo=$request->id_nom_nucleo;
            $User->status_id=$request->status_id;
            $User->name=$request->name;
            $User->email=$request->email;
            $User->avatar='udologo.png';
            $User->password=$request->password;
            $User->remember_token=$request->_token;
            $User->save();
            DB::commit();
            $email=env('MAIL_USERNAME');
            $admin=$request->email;
            $name=$request->email;
            $fullname=$request->nombre;
            $Funciones->EnviarCorreo($name,$fullname,$email,$password,$admin);
            return  \Response::json([
                    'created' =>true
                ],200);
           
        }
    }
    
    public function EditarUsuario(Request $request, $id)
    {
       $rules = [
            'name'      => 'required|min:6|max:20',
            'id_nom_nucleo'    =>'required',
            'status_id'    =>'required',
            'rol_id'    =>'required'
            ];
            $mensajes=array(
            'name.required'=>'El  Nombre es Obligatorio',
            'name.min'=>'El  Nombre debe ser minimo de 6 Caracteres',
            'name.max'=>'El  Nombre debe ser Maximo de 20 Caracteres',
            'rol_id.required'=>'El Rol es Obligatorio',
            'id_nom_nucleo.required'=>'El Nucleo es Obligatorio',
            'status_id.required'=>'El Status es Obligatorio',
             );    
        $validator = Validator::make(Input::all(), $rules,$mensajes);
        if ($validator->fails()) 
        {
            return  \Response::json([
                'created' => false,
                'errors'  => $validator->errors()->all()
            ],500);
        }
        else 
        {
            DB::beginTransaction();
            DB::table('users')->where('id', $id)
                    ->update(['name' => $request->name,
                        'id_dependencia' => $request->dependencia_id,
                        'id_perfil' => $request->rol_id,
                        'status_id'=>$request->status_id,
                        'id_nom_nucleo'=>$request->id_nom_nucleo]);
            DB::commit();
              return \Response::json([
                    'created' =>true
                ],200);
//           $succarray('success'=>true,'mensaje'=>'Usuario Modificado con Exito!!');
//            return response()->json($success);ess=
        }
    }
    public function Destroy($id){
        User::destroy($id);
        return redirect()->back();
    }
   public function resetPassword(Request $request) {
        
        //verificar si la globals settings email esta configurada
//        if(!$this->emailConfig()){
//            return \Response::json(['result' => false,'errors'=>'The global settings for sending e-mail password is not configured'], 400);
//        }
        
        $rules = ['email'    =>'required'];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            if(empty($request->type)){//significa que no es por ajax
                return [
                    'created' => false,
                    'errors'  => $validator->errors()->all()
                ];
            }
            else{
                return response()->json(['created' => false,'errors'  => $validator->errors()->all()],500);
            }
        }
        //verificar si el usuario existe
        $User=User::where('email',$request->email)->get()->toArray();
        if(sizeof($User) !== 0){//el url existe
            $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            $longitudCadena=strlen($cadena);
            $pass = "";
            $longitudPass=10;
            for($i=1 ; $i<=$longitudPass ; $i++)
            {
                $pos=rand(0,$longitudCadena-1);
                $pass .= substr($cadena,$pos,1);
            }
    //        $request->password=  bcrypt($pass);
            $password= $pass;
            $email=$request->email;
            $name=$request->email;
            
            //cambiar el valor de la variable config
//            config(['mail.username'=>'carrionfn@gmail.com']);
//            config(['mail.password'=>'*FaCg_gmail#']);
            
            Mail::send('email.reset_password',['name' =>$User[0]['email'] ,'password' => $pass],
            function($message) use ($email,$name,$password)
            {
//                $message->from('no-reply@clouditapp.com', 'CIMACAST');
                $message->to($email, $name)
                    ->subject('Password reset successfully '.$name);
            });
            
            User::find($User[0]['id'])->update(['password'=>bcrypt($pass)]);
            
            if(empty($request->type)){//significa que no es por ajax
                Session::flash('success','success');
                Session::flash('mensaje','An email has been sent with your new password');
                return redirect('login');
            }
            else{
                return response()->json(['success'=>true,'mensaje'=>'An email has been sent with your new password']);
            }
        }
        else{//el url no existe
            if(empty($request->type)){//significa que no es por ajax
                Session::flash('success','danger');
                Session::flash('mensaje','Unregistered email '.$request->email);
                return redirect('login');
            }
            else{
                return response()->json(['success'=>false,'errors'=>['Unregistered email '.$request->email]],500);
            }
        }        
    }
    public function show($id){
             $User=User::
                     select('users.*','personal.nombre','dependencia_udo.descripcion','personal.apellido','personal.telefono_habitacion','personal.telefono_oficina','perfil.nombre_perfil')->where('id',$id)
                     ->join('perfil','users.id_perfil','=','perfil.id_perfil')
                      ->join('dependencia_udo','users.id_dependencia','=','dependencia_udo.id_dependencia')
                     ->join('personal','users.personal_id','=','personal.id_personal')->first();
            

        
        if($User=='[]'){
               return Response::json([
                    'created' => false,
                    'errors'  => 'Este equipo no es Propiedad de La Universidad de Oriente'
                ], 500);
            
        }
        return $User;
    }
}
