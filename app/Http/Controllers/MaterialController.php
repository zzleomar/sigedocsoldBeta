<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
class MaterialController extends Controller
{
    public function index()
    {
        $Material= array();
        $Material= Material::orderby('id_material','asc')->paginate(4);
        return 
        [
            'pagination'=>
             [
                'total'=>$Material->total(),
                'current_page'=>$Material->currentPage(),
                'per_page'=>$Material->perPage(),
                'last_page'=>$Material->lastPage(),
                'from'=>$Material->firstItem(),
                'to'=>$Material->lastItem(),
            ],
            'material'=>$Material
        ];
    }
    public function GuargarMaterial(Request $request)
    {
        $rules = 
        [
            'codigo'      => 'required|min:2|max:20',
            'descripcion'     => 'required|unique:material',
            'unidad_medida'    =>'required',
        ];
        $mensajes=array(
            'codigo.required'=>'El  Codigo es Obligatorio',
            'codigo.min'=>'El  Codigo debe ser minimo de 6 Caracteres',
            'codigo.max'=>'El  Codigo debe ser Maximo de 20 Caracteres',
            'unidad_medida.required'=>'La Unidad de Medida es Obligatoria',
            'descripcion.required'=>'La Descripcion del Material es Obligatoria',
            'descripcion.unique'=>'Ya se encuentra registrado un Material Llamado: '. $request->descripcion,
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
            $Material= new Material();
            $Material->codigo=$request->codigo;
            $Material->descripcion=$request->descripcion;
            $Material->unidad_medida=$request->unidad_medida;
            $Material->save();
            DB::commit();           
             return  \Response::json([
                    'created' => true,
                    'mensaje'  => "Se registro con exito el Material"
                ],200);
        } 
    }
}
