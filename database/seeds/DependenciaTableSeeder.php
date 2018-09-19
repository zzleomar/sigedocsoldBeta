<?php

use Illuminate\Database\Seeder;
use App\Dependencias;
class DependenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Dependencias=[[
            'id_dependencias'=>'1',
            'id_departamento'=>'21',
            'nombre'=>'Decano(a)',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dependencias'=>'2',
            'id_departamento'=>'14',
            'nombre'=>'Delegación de Personal',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dependencias'=>'3',
            'id_departamento'=>'15',
            'nombre'=>'Coordinacion Academica',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dependencias'=>'4',
            'id_departamento'=>'16',
            'nombre'=>'Coordinacion Administrativa',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dependencias'=>'5',
            'id_departamento'=>'17',
            'nombre'=>'Delegación de Finanzas',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dependencias'=>'6',
            'id_departamento'=>'18',
            'nombre'=>'Contraloria Delegada',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dependencias'=>'7',
            'id_departamento'=>'19',
            'nombre'=>'Delegación de Presupuesto',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dependencias'=>'8',
            'id_departamento'=>'22',
            'nombre'=>'Sección de Nomina',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dependencias'=>'9',
            'id_departamento'=>'2',
            'nombre'=>'COMISION DE PREPARADURIAS',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_dependencias'=>'9',
            'id_departamento'=>'2',
            'nombre'=>'ARCHIVO',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Dependencias as $Dependencia){
            if(!Dependencias::find($Dependencia['id_dependencias'])){
                DB::table('dependencias')->insert($Dependencia);
            }
        } 
   
    }
}
