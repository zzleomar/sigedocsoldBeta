<?php

use Illuminate\Database\Seeder;
use App\Profesor;
class ProfesoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $Profesor=[[
            'id_profesor'=>'1',
            'id_user'=>'3',
            'id_tipo'=>'1',
            'id_dependencia'=>'2',
            'id_dedicacion'=>'1',
            'firma'=>'firma1.jpg',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
        'id_profesor'=>'2',
            'id_user'=>'6',
            'id_tipo'=>'1',
            'id_dependencia'=>'1',
            'id_dedicacion'=>'1',
            'firma'=>'firma2.png',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Profesor as $profesores){
            if(!Profesor::find($profesores['id_profesor'])){
                DB::table('profesor')->insert($profesores);
            }
    }
}

            }