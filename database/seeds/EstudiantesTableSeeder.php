<?php

use Illuminate\Database\Seeder;
use App\Estudiante;
class EstudiantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $Estudiante=[[
            'id_estudiante'=>'1',
            'id_user'=>'1',
            'id_tipo'=>'1',
            'id_dependencia'=>'2',
           'id_dedicacion_estudiante'=>'1',
           'firma'=>'firma.png',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Estudiante as $estudiantes){
            if(!Estudiante::find($estudiantes['id_estudiante'])){
                DB::table('estudiante')->insert($estudiantes);
            }
    }
}
}