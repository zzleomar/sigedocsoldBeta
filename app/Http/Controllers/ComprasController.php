<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Compras;
use App\Material;
use App\SolicitudCompras;
use App\DependenciaUDO;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class ComprasController extends Controller
{
    public function index()
    {
        $Material= Material::pluck('descripcion','id_material');
        return view('compras/index')->with(['Material'=>$Material]);
    }
     public function GuargarSolicitudCompra(Request $request)
    {
        $rules = 
        [
            'observacion'    =>'required',
            'material_id'    =>'required',
            'cantidad'    =>'required|numeric',
        ];
        $mensajes=array(
            'observacion.required'=>'La Observacion es Obligatoria',
            'material_id.required'=>'El Material a Solicitar es Obligatoria',
            'cantidad.required'=>'La Cantidad es Obligatoria',
            'cantidad.numeric'=>'La Cantidad debe ser numerica',
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
            $Dependencia=DependenciaUDO::where('id_dependencia','59')->first();
            $P=Compras::where('estatus_id','1')->count();
            $D=Compras::where('estatus_id','1')->first();
            $C=Compras::select('nrosol')->where('anio',date('Y'))->count();
            $Material=Material::where('id_material',$request->material_id)->first();
           
            if($C>0)
            {
                $nrooficio=$C+1;
            }    
            else
            {
                    $nrooficio=1;
            }
            if( $P>0)
            {
               $F=SolicitudCompras::where('compra_id',$D->id_compra)->where('material_id',$request->material_id)->count();
               if($F>0){
                    return  \Response::json([
                    'created' => false,
                    'errores'  => 'El Material '. $Material->descripcion. ' ya se encuentra registrado en la Solicitud de Compra N°: '.$D->nro_solicitud
                ],500);
               }
               else
               {          
                 $Sol_Compra=new SolicitudCompras();
                 $Sol_Compra->compra_id=$D->id_compra;
                 $Sol_Compra->material_id=$request->material_id;
                 $Sol_Compra->cantidad=$request->cantidad;
                 $Sol_Compra->save();
               }  
            }
            else
            {
               $NroSolicitud=$Dependencia->siglas.'-N°'.$nrooficio.'/'.date('Y');
               $Compra=new Compras();
               $Compra->dependencia_id=Auth::user()->id_dependencia;
               $Compra->estatus_id='1';
               $Compra->nrosol=$nrooficio;
               $Compra->nro_solicitud=$NroSolicitud;
               $Compra->fecha=date('Y-m-d');
               $Compra->anio=date('Y'); 
               $Compra->observacion=$request->observacion;
               $Compra->solicitado_por=$Dependencia->responsable_ejec;
               $Compra->conformado_por='Licdo. Homer Jesus Mendez Morillo';
               $Compra->autorizado_por='R-VRA-VRAD-S-D';
               $Compra->save();
               $Sol_Compra=new SolicitudCompras();
               $Sol_Compra->compra_id=$Compra->id_compra;
               $Sol_Compra->material_id=$request->material_id;
               $Sol_Compra->cantidad=$request->cantidad;
               $Sol_Compra->save();
            }
            
            $Dx=Compras::where('estatus_id','1')->first();        
            DB::commit();           
            return  \Response::json([
                    'created' => true,
                    'mensaje'  => "Se registro con exito el Material: ".$Material->descripcion.' En la Solicitud de Compra N° '.$Dx->nro_solicitud,
                   'id_compra'=> $Sol_Compra->compra_id
                ],200);
        } 
    }
    public function AgregarSolicitudCompra(Request $request)
    {
        $rules = 
        [
            'material_id'    =>'required',
            'cantidad'    =>'required|numeric',
        ];
        $mensajes=array(
            'material_id.required'=>'El Material a Solicitar es Obligatoria',
            'cantidad.required'=>'La Cantidad es Obligatoria',
            'cantidad.numeric'=>'La Cantidad debe ser numerica',
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
            $Dependencia=DependenciaUDO::where('id_dependencia','59')->first();
            $P=Compras::where('estatus_id','17')->count();
            $D=Compras::where('estatus_id','17')->first();
            $C=Compras::select('nrosol')->where('anio',date('Y'))->count();
            $Material=Material::where('id_material',$request->material_id)->first();
           
            if($C>0)
            {
                $nrooficio=$C+1;
            }    
            else
            {
                    $nrooficio=1;
            }
            if( $P>0)
            {
               $F=SolicitudCompras::where('compra_id',$D->id_compra)->where('material_id',$request->material_id)->count();
               if($F>0){
                    return  \Response::json([
                    'created' => false,
                    'errores'  => 'El Material '. $Material->descripcion. ' ya se encuentra registrado en la Solicitud de Compra N°: '.$D->nro_solicitud
                ],500);
               }
               else
               {          
                 $Sol_Compra=new SolicitudCompras();
                 $Sol_Compra->compra_id=$D->id_compra;
                 $Sol_Compra->material_id=$request->material_id;
                 $Sol_Compra->cantidad=$request->cantidad;
                 $Sol_Compra->save();
               }  
            }
            $Dx=Compras::where('estatus_id','17')->first();        
            DB::commit();           
            return  \Response::json([
                    'created' => true,
                    'mensaje'  => "Se registro con exito el Material: ".$Material->descripcion.' En la Solicitud de Compra N° '.$Dx->nro_solicitud,
                   'id_compra'=> $Sol_Compra->compra_id
                ],200);
        } 
    }
    public function MostrarCompras()
    {
        $Compras= array();
        $Compras= Compras::select('compra.*','dependencia_udo.descripcion','estados.nombre')->join('dependencia_udo','compra.dependencia_id','=','dependencia_udo.id_dependencia')->join('estados','compra.estatus_id','=','estados.id_estados')->orderby('compra.estatus_id','asc')->orderby('compra.id_compra','asc')->paginate(10);
        return 
        [
            'pagination'=>
             [
                'total'=>$Compras->total(),
                'current_page'=>$Compras->currentPage(),
                'per_page'=>$Compras->perPage(),
                'last_page'=>$Compras->lastPage(),
                'from'=>$Compras->firstItem(),
                'to'=>$Compras->lastItem(),
            ],
            'compras'=>$Compras
        ];
    }
    public function editshow($id){
        $Compras= array();
        $Compras= Compras::select('compra.*','material.descripcion as material','material.unidad_medida','material.codigo','dependencia_udo.descripcion','estados.nombre','solicitud_compra.cantidad','solicitud_compra.id_solicitud_compra')
                ->join('dependencia_udo','compra.dependencia_id','=','dependencia_udo.id_dependencia')
                ->join('solicitud_compra','compra.id_compra','=','solicitud_compra.compra_id')
                ->join('material','solicitud_compra.material_id','=','material.id_material')
                ->join('estados','compra.estatus_id','=','estados.id_estados')
                ->where('compra.id_compra',$id)
                ->orderby('compra.id_compra','asc')
                ->paginate(4);
        return 
        [
            'pagination_edit_materiales'=>
             [
                'totals_edit'=>$Compras->total(),
                'current_pages_edit'=>$Compras->currentPage(),
                'per_pages_edit'=>$Compras->perPage(),
                'last_pages_edit'=>$Compras->lastPage(),
                'froms_edit'=>$Compras->firstItem(),
                'tos_edit'=>$Compras->lastItem(),
            ],
            'compras'=>$Compras
        ];
    }
    public function show($id)
    {
        $Compras= array();
        $Compras= Compras::select('compra.*','material.descripcion as material','material.unidad_medida','material.codigo','dependencia_udo.descripcion','estados.nombre','solicitud_compra.cantidad','solicitud_compra.id_solicitud_compra')
                ->join('dependencia_udo','compra.dependencia_id','=','dependencia_udo.id_dependencia')
                ->join('solicitud_compra','compra.id_compra','=','solicitud_compra.compra_id')
                ->join('material','solicitud_compra.material_id','=','material.id_material')
                ->join('estados','compra.estatus_id','=','estados.id_estados')
                ->where('compra.id_compra',$id)
                ->orderby('compra.id_compra','asc')
                ->paginate(4);
        return 
        [
            'pagination_edit_materiales'=>
             [
                'totals_edit'=>$Compras->total(),
                'current_pages_edit'=>$Compras->currentPage(),
                'per_pages_edit'=>$Compras->perPage(),
                'last_pages_edit'=>$Compras->lastPage(),
                'froms_edit'=>$Compras->firstItem(),
                'tos_edit'=>$Compras->lastItem(),
            ],
            'compras'=>$Compras
        ];
    }
    public function showMateriales($id)
    {
        $Compras= array();
        $Compras= Compras::select('compra.*','material.descripcion as material','material.unidad_medida','material.codigo','dependencia_udo.descripcion','estados.nombre','solicitud_compra.cantidad','solicitud_compra.id_solicitud_compra')
                ->join('dependencia_udo','compra.dependencia_id','=','dependencia_udo.id_dependencia')
                ->join('solicitud_compra','compra.id_compra','=','solicitud_compra.compra_id')
                ->join('material','solicitud_compra.material_id','=','material.id_material')
                ->join('estados','compra.estatus_id','=','estados.id_estados')
                ->where('compra.id_compra',$id)
                ->orderby('compra.id_compra','asc')
                ->paginate(4);
        return 
        [
            'pagination_edit_materiales'=>
             [
                'totals_edit'=>$Compras->total(),
                'current_pages_edit'=>$Compras->currentPage(),
                'per_pages_edit'=>$Compras->perPage(),
                'last_pages_edit'=>$Compras->lastPage(),
                'froms_edit'=>$Compras->firstItem(),
                'tos_edit'=>$Compras->lastItem(),
            ],
            'compras'=>$Compras
        ];
    }
    public function Materiales($id)
    {
        $Compras= array();
        $Compras= Compras::select('compra.id_compra','material.descripcion as material','material.unidad_medida','material.codigo','solicitud_compra.cantidad','solicitud_compra.id_solicitud_compra')
                ->join('solicitud_compra','compra.id_compra','=','solicitud_compra.compra_id')
                ->join('material','solicitud_compra.material_id','=','material.id_material')
                ->where('compra.id_compra',$id)
                ->paginate(4);
        return 
        [
            'pagination_materiales'=>
             [
                'totals'=>$Compras->total(),
                'current_pages'=>$Compras->currentPage(),
                'per_pages'=>$Compras->perPage(),
                'last_pages'=>$Compras->lastPage(),
                'froms'=>$Compras->firstItem(),
                'tos'=>$Compras->lastItem(),
            ],
            'compras'=>$Compras
        ];
    }
    public function MaterialesNew($id)
    {
        $Compras= array();
        $Compras= Compras::select('compra.id_compra','material.descripcion as material','material.unidad_medida','material.codigo','solicitud_compra.cantidad','solicitud_compra.id_solicitud_compra')
                ->join('solicitud_compra','compra.id_compra','=','solicitud_compra.compra_id')
                ->join('material','solicitud_compra.material_id','=','material.id_material')
                ->where('compra.id_compra',$id)
                ->paginate(4);
        return 
        [
            'pagination_materiales_new'=>
             [
                'total_new'=>$Compras->total(),
                'current_page_new'=>$Compras->currentPage(),
                'per_page_new'=>$Compras->perPage(),
                'last_page_new'=>$Compras->lastPage(),
                'from_new'=>$Compras->firstItem(),
                'to_new'=>$Compras->lastItem(),
            ],
            'compras'=>$Compras
        ];
    }
    public function Borrador($id_compra){
         Compras::where('id_compra',$id_compra)->update(['estatus_id' =>'17']);
    }
    public function PorAutorizar($id_compra){
         Compras::where('id_compra',$id_compra)->update(['estatus_id' =>'18']);
    }
    public function ModificarCompras(){
        
    }
}