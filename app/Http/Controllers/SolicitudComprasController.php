<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use View;
use App\Http\Controllers\FuncionesController;
use Illuminate\Support\Facades\Session;

use App\SolicitudCompras;

class SolicitudComprasController extends Controller
{
    public function Destroy($id){
        SolicitudCompras::destroy($id);
       return  \Response::json([
                    'created' => true
                ],200);
    }
}
