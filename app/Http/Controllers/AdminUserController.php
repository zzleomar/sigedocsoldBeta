<?php
namespace App\Http\Controllers;

use App\Perfil;
use App\Nom_Nucleo;
use App\Status;
use View;
class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $rol=Perfil::pluck('nombre_perfil','id_perfil');
        $Nucleo= Nom_Nucleo::pluck('descripcion','id_nom_nucleo');   
    $Status=Status::pluck('name','id_status');
        return View::make('usuarios/index')->with(['Status'=>$Status,'rol'=>$rol,'Nucleo'=>$Nucleo]);
    }
    
 
}
