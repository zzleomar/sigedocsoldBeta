<?php

use Illuminate\Database\Seeder;
use App\DedicacionEstudiante;
class DedicacionEstudianteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DedicacionEstudiantes=[[
            'id_dedicacion_estudiante'=>'1',
            'nombre'=>'Preparador',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dedicacion_estudiante'=>'2',
            'nombre'=>'Ayudante Tecnico',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dedicacion_estudiante'=>'3',
            'nombre'=>'Tesista',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dedicacion_estudiante'=>'4',
            'nombre'=>'Estudiante',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dedicacion_estudiante'=>'5',
            'nombre'=>'Auxiliar Docente',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($DedicacionEstudiantes as $DedicacionEstudiante){
            if(!DedicacionEstudiante::find($DedicacionEstudiante['id_dedicacion_estudiante'])){
                DB::table('dedicacion_estudiante')->insert($DedicacionEstudiante);
            }
        } 
    }
}
