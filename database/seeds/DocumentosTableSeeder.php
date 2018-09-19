<?php

use Illuminate\Database\Seeder;
use App\Documento;
class DocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
    {
        $Documento=[[
            'id_documento'=>'1',
            'id_dependencia_c'=>'2',
            'id_usuario'=>'4',
            'id_categoria'=>'1',
            'id_subcategoria'=>'1',
            'id_itemsubcategoria'=>'1',
            'id_estados'=>'7',
            'codigo_plantilla'=>'1523450668',
            'descripcion_documento'=>'Circular',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Documento as $Documentos){
            if(!Documento::find($Documentos['id_documento'])){
                DB::table('documento')->insert($Documentos);
            }
        } 
    }
}
