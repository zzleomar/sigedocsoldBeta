<?php

use Illuminate\Database\Seeder;
use App\Escuela;
class EscuelaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Escuela=[[
            'id_escuela'=>'1',
            'nombre'=>'Escuela De Ciencias',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_escuela'=>'2',
            'nombre'=>'Escuela De Ciencias Sociales',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_escuela'=>'3',
            'nombre'=>'Escuela De Administracion',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_escuela'=>'4',
            'nombre'=>'Decanato',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Escuela as $dep){
            if(!Escuela::find($dep['id_escuela'])){
                DB::table('escuela')->insert($dep);
            }
        } 
    }
}
