<?php
/*

 * 
 * 
 *  */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class AdminFileController extends Controller
{
    private $dir_tmp;
    public function __construct() 
    {
        //inicializar las variables de configuracion
        $this->dir_tmp=env('TMP_DIR');
        //verificar si el directorio tmp existes
        if(!is_dir($this->dir_tmp))
        {
            //crear el directorio
            mkdir($this->dir_tmp,0777);
            chmod($this->dir_tmp,0777);
        }
    }
    public function uploadFile(Request $request) 
    {             
        if ($request->myfile) 
        {
            $ret = array();
            if ($request->myfile->getClientOriginalName()) 
            { //single file
                $fileName = strtotime(date('d-m-y h:i:s')).'.'.$request->myfile->getClientOriginalExtension();
                if ($request->myfile->isValid()) 
                {
                    $request->myfile->move($this->dir_tmp, $fileName);            
                }
                $ret[] = $fileName;
            }
            return json_encode($ret);
        }  
    }
    public function deleteFile(Request $request) 
    {
        $fileName = $request->name;        
        $filePath = $this->dir_tmp .'/'. $fileName;
        if (file_exists($filePath)) 
        {
            unlink($filePath);
        }
        return  json_encode(array('success'=>true,'msg'=>"Deleted File " . $fileName . "<br>"));
    }
}