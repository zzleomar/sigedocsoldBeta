<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\User;
use App\Perfil;
use App\Nom_Nucleo;
use App\Http\Controllers\UserController;
use Auth;
use App\Status;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $V=Documento::where('id_estados','3')->get();
        $Vistos=count($V);
        $X=Documento::where('id_estados','4')->get();
        $PorCorrecion=count($X);
        $xd=Documento::where('id_estados','5')->get();
        $Entregado=count($xd);
        $X1=Documento::where('id_estados','7')->get();
        $Aprobado=count($X1);
       
     if( Auth::user()->id_perfil==1){
       $data= array();
       $data= User::select('users.*','perfil.id_perfil','perfil.nombre_perfil','dependencia.nombre_dependencia')->join('perfil','users.id_perfil','=','perfil.id_perfil')->leftjoin('dependencia','users.id_dependencia','=','dependencia.id_dependencia')->paginate(10);
 $rol=Perfil::pluck('nombre_perfil','id_perfil');
        $Nucleo= Nom_Nucleo::pluck('descripcion','id_nom_nucleo'); 
        //$data= User::select('users.*','perfil.nombre_perfil')->join('perfil','users.id_perfil','=','perfil.id_perfil')->paginate(10); 
    $Status=Status::pluck('name','id_status');
       // echo '<pre>';print_r($data); die();  
        return view('usuarios/index')->with(['data'=>$data,'Status'=>$Status,'rol'=>$rol,'Nucleo'=>$Nucleo]);
     }else{
        return view('home')->with(['Vistos'=>$Vistos,'PorCorrecion'=>$PorCorrecion,'Entregado'=>$Entregado,'Aprobado'=>$Aprobado]); 
     }
       

    }



      public function index1()
    {
      /*  $V=Documento::where('id_estados','3')->get();
        $Vistos=555;
        $X=Documento::where('id_estados','4')->get();
        $PorCorrecion=count($X);
        $xd=Documento::where('id_estados','5')->get();
        $Entregado=count($xd);
        $X1=Documento::where('id_estados','7')->get();
        $Aprobado=count($X1);
       
     if( Auth::user()->id_perfil==1){
       $data= array();
       $data= User::select('users.*','perfil.nombre_perfil','dependencia.nombre_dependencia')->join('perfil','users.id_perfil','=','perfil.id_perfil')->leftjoin('dependencia','users.id_dependencia','=','dependencia.id_dependencia')->paginate(10);

        //$data= User::select('users.*','perfil.nombre_perfil')->join('perfil','users.id_perfil','=','perfil.id_perfil')->paginate(10); 

       // echo '<pre>';print_r($data); die();  */
        return view('crear_1');//->with(['data'=>$data]);
    /* }else{
        return view('home1')->with(['Vistos'=>$Vistos,'PorCorrecion'=>$PorCorrecion,'Entregado'=>$Entregado,'Aprobado'=>$Aprobado]); 
     }*/
       

    }
}
