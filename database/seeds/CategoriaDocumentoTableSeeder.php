<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriaDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $Categoria=[[
            'id_categoria'=>'1',
            'nombre_categoria'=>'Administrativos',
            'descripcion_categoria'=>'Administrativos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_categoria'=>'2',
            'nombre_categoria'=>'Academicos',
            'descripcion_categoria'=>'Academicos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Categoria as $categorias){
            if(!Categoria::find($categorias['id_categoria'])){
                DB::table('categoria_documento')->insert($categorias);
            }
        } 
  
    }
}
