<?php

use Illuminate\Database\Seeder;
use App\Tipo;
class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Tipo=[[
            'id_tipo'=>'1',
            'nombre_tipo'=>'DOCENTE',
            'descripcion_tipo'=>'DOCENTE',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_tipo'=>'2',
            'nombre_tipo'=>'ADMINISTRATIVO',
            'descripcion_tipo'=>'ADMINISTRATIVO',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
       
        ],[
            'id_tipo'=>'3',
            'nombre_tipo'=>'ESTUDIANTE',
            'descripcion_tipo'=>'ESTUDIANTE',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
       
        ]];
         foreach($Tipo as $tipos){
            if(!Tipo::find($tipos['id_tipo'])){
                DB::table('tipo')->insert($tipos);
            }
        } 
  
    }
}
