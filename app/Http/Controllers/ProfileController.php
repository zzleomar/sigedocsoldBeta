<?php
namespace App\Http\Controllers;
use App\Dedicacion;
use App\DedicacionEstudiante;
use Illuminate\Http\Request;
use App\User;
use App\Profesor;
use App\Estudiante;
use App\Sellos;
use App\SellosEscuelas;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\FuncionesController;
use DB;
use Auth;
class ProfileController extends Controller
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
    //
    public function index() {
        $Dedicacion=Dedicacion::pluck('nombre_dedicacion','id_dedicacion');
        $DedicacionEstudiante=DedicacionEstudiante::pluck('nombre','id_dedicacion_estudiante');
        return view('profile/edit')->with([ 'Dedicacion'=>$Dedicacion,'DedicacionEstudiante'=>$DedicacionEstudiante ]);
    }
    
    public function store(Request $request) {
        if( Auth::user()->id_perfil==6 || Auth::user()->id_perfil==2)
        { 
        $rules = [
            'nombres'  => 'required',
            'apellidos'  => 'required',
            'id_dedicacion'  => 'required',
            'password'  => 'required',
            'imgUser' =>'required_with:'.$this->tipo_validos,
            'imgSello' =>'required|required_with:'.$this->tipo_validos,
            'imgFirma' =>'required|required_with:'.$this->tipo_validos,
        ];
        $mensajes=[
            'nombres.required'=>'El  Nombre es Obligatorio',
            'apellidos.required'=>'El Apellido es Obligatorio',
            'id_dedicacion.required'=>'La Dedicacion Es Obligatoria',
            'password.required'=>'La Contraseña  es Obligatoria',
            'imgUser.required'=>'La Imagen es Obligatoria',
            'imgSello.required'=>'El Sello es Obligatoria',
            'imgFirma.required'=>'La Firma es Obligatoria',
            'imgUser.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
            'imgSello.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
            'imgFirma.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
        ];  
        $validator = \Validator::make($request->all(), $rules,$mensajes);
        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ],500);
        }
        }
        if( Auth::user()->id_perfil==4)
        { 
        $rules = [
            'nombres'  => 'required',
            'apellidos'  => 'required',
            'id_dedicacion'  => 'required',
            'password'  => 'required',
            'imgUser' =>'required_with:'.$this->tipo_validos,
            'imgFirma' =>'required|required_with:'.$this->tipo_validos,
        ];
        $mensajes=[
            'nombres.required'=>'El  Nombre es Obligatorio',
            'apellidos.required'=>'El Apellido es Obligatorio',
            'id_dedicacion.required'=>'La Dedicacion Es Obligatoria',
            'password.required'=>'La Contraseña  es Obligatoria',
            'imgUser.required'=>'La Imagen es Obligatoria',
            'imgFirma.required'=>'La Firma es Obligatoria',
            'imgUser.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
            'imgFirma.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
        ];  
        $validator = \Validator::make($request->all(), $rules,$mensajes);
        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ],500);
        }
        }
        if(Auth::user()->id_perfil==5)
        {
        $rules = [
            'nombres'  => 'required',
            'apellidos'  => 'required',
            'id_dedicacion_estudiante'  => 'required',
            'password'  => 'required',
            'imgUser' =>'required_with:'.$this->tipo_validos,
            'imgFirma' =>'required|required_with:'.$this->tipo_validos,
        ];
        $mensajes=[
            'nombres.required'=>'El  Nombre es Obligatorio',
            'apellidos.required'=>'El Apellido es Obligatorio',
            'id_dedicacion_estudiante.required'=>'La Dedicacion Es Obligatoria',
            'password.required'=>'La Contraseña  es Obligatoria',
            'imgUser.required'=>'La Imagen es Obligatoria',
            'imgFirma.required'=>'La Firma es Obligatoria',
            'imgUser.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
            'imgFirma.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
        ];  
        $validator = \Validator::make($request->all(), $rules,$mensajes);
        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ],500);
        }    
        }
        if(Auth::user()->id_perfil==1 || Auth::user()->id_perfil==3)
        {
        $rules = [
            'nombres'  => 'required',
            'apellidos'  => 'required',
            'password'  => 'required',
            'imgUser' =>'required_with:'.$this->tipo_validos,
        ];
        $mensajes=[
            'nombres.required'=>'El  Nombre es Obligatorio',
            'apellidos.required'=>'El Apellido es Obligatorio',
            'password.required'=>'La Contraseña  es Obligatoria',
            'imgUser.required'=>'La Imagen es Obligatoria',
            'imgUser.required_with'=>'La imagen debe ser de los tipo '.$this->tipo_validos,
        ];  
        $validator = \Validator::make($request->all(), $rules,$mensajes);
        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ],500);
        }    
        }
        $datos=array(
            'name' => $request->name,
        );
        DB::beginTransaction();
        if($request->password!==$request->passwordold)
        {    
            $datos['password']=  bcrypt ($request->password);
        } 
        $datos['name']=  $request->nombres;
        $datos['nombres']=  $request->nombres;
        $datos['apellidos']=$request->apellidos;
        if($request->imgUser!==$request->img_old)
        {
            $datos['avatar']= $request->imgUser;
        }  
        User::where('id',$request->id)->update($datos);
        if(Auth::user()->id_perfil==2)
        {
            $Profesor= new Profesor();
            $Profesor->id_user=Auth::user()->id;
            $Profesor->id_tipo='1';
            $Profesor->id_dependencia=Auth::user()->id_dependencia;
            $Profesor->id_dedicacion=$request->id_dedicacion;
            $Profesor->firma=$request->imgFirma;
            $Profesor->save();
            $Sello=new Sellos();
            $Sello->id_dependencia=Auth::user()->id_dependencia;
            $Sello->id_users=Auth::user()->id;
            $Sello->sello=$request->imgSello;
            $Sello->save();
            rename($this->dir_tmp . '/' . $request->imgFirma, ($this->dir_mark . '/' . $request->imgFirma));
            rename($this->dir_tmp . '/' . $request->imgSello, ($this->dir_mark . '/' . $request->imgSello));
        }
        if(Auth::user()->id_perfil==5 )
        {
            $Estudiante= new Estudiante();
            $Estudiante->id_user=Auth::user()->id;
            $Estudiante->id_tipo='2';
            $Estudiante->id_dependencia=Auth::user()->id_dependencia;
            $Estudiante->id_dedicacion_estudiante=$request->id_dedicacion_estudiante;
            $Estudiante->firma=$request->imgFirma;
            $Estudiante->save();
            rename($this->dir_tmp . '/' . $request->imgFirma, ($this->dir_mark . '/' . $request->imgFirma));
        }
        if(Auth::user()->id_perfil==6)
        {
            $Profesor= new Profesor();
            $Profesor->id_user=Auth::user()->id;
            $Profesor->id_tipo='1';
            $Profesor->id_dependencia=Auth::user()->id_dependencia;
            $Profesor->id_dedicacion=$request->id_dedicacion;
            $Profesor->firma=$request->imgFirma;
            $Profesor->save();
            $Sello=new SellosEscuelas();
            $Sello->id_dependencia=Auth::user()->id_dependencia;
            $Sello->id_users=Auth::user()->id;
            $Sello->sello=$request->imgSello;
            $Sello->save();
            rename($this->dir_tmp . '/' . $request->imgFirma, ($this->dir_mark . '/' . $request->imgFirma));
            rename($this->dir_tmp . '/' . $request->imgSello, ($this->dir_mark . '/' . $request->imgSello));
        }
        if(Auth::user()->id_perfil==4)
        {
            $Profesor= new Profesor();
            $Profesor->id_user=Auth::user()->id;
            $Profesor->id_tipo='1';
            $Profesor->id_dependencia=Auth::user()->id_dependencia;
            $Profesor->id_dedicacion=$request->id_dedicacion;
            $Profesor->firma=$request->imgFirma;
            $Profesor->save();
            
        }
        DB::commit(); 
        if($request->imgUser!==$request->img_old)
        {
                unlink($this->dir_mark . '/' . $request->img_old);
                rename($this->dir_tmp . '/' . $request->imgUser, ($this->dir_mark . '/' . $request->imgUser));
        }
        if($request->password!==$request->passwordold)
        { 
            $address=env('MAIL_USERNAME');
            $email=$request->email;
            $name=$request->email;
            $Name=$request->nombres.' '.$request->apellidos;
            $password=$request->password;
            $Funciones= new FuncionesController();
            $Funciones->EnviarCambioClave($name,$email,$password,$Name,$address);  
            return response()->json(['success'=>true,'msj'=>'Tu Cuenta fue actualizada con éxito revise su correo!!!']);
        }
        else{ 
            return response()->json(['success'=>true,'msj'=>'Tu Cuenta fue actualizada con éxito !!!']);
        }
    }
}
