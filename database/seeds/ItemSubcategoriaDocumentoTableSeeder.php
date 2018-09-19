<?php

use Illuminate\Database\Seeder;
use App\Itemsubcategoria;
class ItemSubcategoriaDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $ItemSubCategoria=[[
            'id_itemsubcategoria'=>'1',
            'id_subcategoria'=>'1',
            'nombre_itemsubcategoria'=>'Evento',
            'descripcion_itemsubcategoria'=>'',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_itemsubcategoria'=>'2',
            'id_subcategoria'=>'1',
            'nombre_itemsubcategoria'=>'Charla',
            'descripcion_itemsubcategoria'=>'',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_itemsubcategoria'=>'3',
            'id_subcategoria'=>'1',
            'nombre_itemsubcategoria'=>'Reunion',
            'descripcion_itemsubcategoria'=>'',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_itemsubcategoria'=>'4',
            'id_subcategoria'=>'1',
            'nombre_itemsubcategoria'=>'Otro',
            'descripcion_itemsubcategoria'=>'',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_itemsubcategoria'=>'5',
            'id_subcategoria'=>'8',
            'nombre_itemsubcategoria'=>'Actas/Veredictos',
            'descripcion_itemsubcategoria'=>'Actas/Veredictos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_itemsubcategoria'=>'6',
            'id_subcategoria'=>'8',
            'nombre_itemsubcategoria'=>'Constancias de Preparaduria',
            'descripcion_itemsubcategoria'=>'Constancias de Preparaduria',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_itemsubcategoria'=>'7',
            'id_subcategoria'=>'8',
            'nombre_itemsubcategoria'=>'Solicitud de menor y mayor carga academica',
            'descripcion_itemsubcategoria'=>'',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_itemsubcategoria'=>'8',
            'id_subcategoria'=>'8',
            'nombre_itemsubcategoria'=>'Solicitud de menor carga y mayor carga acádemica',
            'descripcion_itemsubcategoria'=>'',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($ItemSubCategoria as $items){
            if(!Itemsubcategoria::find($items['id_itemsubcategoria'])){
                DB::table('itemsubcategoria')->insert($items);
            }
        } 
  
    }
}
