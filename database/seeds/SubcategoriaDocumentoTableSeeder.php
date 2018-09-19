<?php

use Illuminate\Database\Seeder;
use App\Subcategoria;
class SubcategoriaDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
    {
        $SubCategoria=[[
            'id_subcategoria'=>'1',
            'id_categoria'=>'1',
            'nombre_subcategoria'=>'Circular',
            'descripcion_subcategoria'=>'Administrativos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
          'id_subcategoria'=>'2',
            'id_categoria'=>'1',
            'nombre_subcategoria'=>'Invitacion',
            'descripcion_subcategoria'=>'Administrativos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
          'id_subcategoria'=>'3',
            'id_categoria'=>'1',
            'nombre_subcategoria'=>'Oficio',
            'descripcion_subcategoria'=>'Administrativos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
          'id_subcategoria'=>'4',
            'id_categoria'=>'1',
            'nombre_subcategoria'=>'Solicitud',
            'descripcion_subcategoria'=>'Administrativos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
          'id_subcategoria'=>'5',
            'id_categoria'=>'2',
            'nombre_subcategoria'=>'Concurso',
            'descripcion_subcategoria'=>'Administrativos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
          'id_subcategoria'=>'6',
            'id_categoria'=>'2',
            'nombre_subcategoria'=>'Estudiante',
            'descripcion_subcategoria'=>'Administrativos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
          'id_subcategoria'=>'7',
            'id_categoria'=>'2',
            'nombre_subcategoria'=>'Profesor',
            'descripcion_subcategoria'=>'Administrativos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
          'id_subcategoria'=>'8',
            'id_categoria'=>'2',
            'nombre_subcategoria'=>'Planificacion Academica',
            'descripcion_subcategoria'=>'Administrativos',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($SubCategoria as $subcategorias){
            if(!Subcategoria::find($subcategorias['id_subcategoria'])){
                DB::table('subcategoria_documento')->insert($subcategorias);
            }
        } 
  
    }
}
