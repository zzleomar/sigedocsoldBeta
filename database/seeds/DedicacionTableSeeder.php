<?php

use Illuminate\Database\Seeder;
use App\Dedicacion;
class DedicacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $Dedicacion=[[
            'id_dedicacion'=>'1',
            'nombre_dedicacion'=>'Exclusiva',
            'descripcion_dedicacion'=>'Exclusiva',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dedicacion'=>'2',
            'nombre_dedicacion'=>'Tiempo Completo',
            'descripcion_dedicacion'=>'Tiempo Completo',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dedicacion'=>'3',
            'nombre_dedicacion'=>'Medio Tiempo',
            'descripcion_dedicacion'=>'Medio Tiempo',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Dedicacion as $Dedicaciones){
            if(!Dedicacion::find($Dedicaciones['id_dedicacion'])){
                DB::table('dedicacion')->insert($Dedicaciones);
            }
        } 
}}
