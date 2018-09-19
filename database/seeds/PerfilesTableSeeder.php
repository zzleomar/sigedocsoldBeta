<?php

use Illuminate\Database\Seeder;
use App\Perfil;
class PerfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Perfil=[[
            'id_perfil'=>'1',
            'nombre_perfil'=>'ADMINISTRADOR',
            'descripcion_perfil'=>'ADMINISTRADOR',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_perfil'=>'2',
            'nombre_perfil'=>'JEFE DE DEPARTAMENTO',
            'descripcion_perfil'=>'JEFE DE DEPARTAMENTO',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_perfil'=>'3',
            'nombre_perfil'=>'SECRETARIA',
            'descripcion_perfil'=>'SECRETARIA',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_perfil'=>'4',
            'nombre_perfil'=>'PROFESOR',
            'descripcion_perfil'=>'PROFESOR',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_perfil'=>'5',
            'nombre_perfil'=>'ESTUDIANTE',
            'descripcion_perfil'=>'ESTUDIANTE',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_perfil'=>'6',
            'nombre_perfil'=>'JEFE DE ESCUELA',
            'descripcion_perfil'=>'JEFE DE ESCUELA',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_perfil'=>'7',
            'nombre_perfil'=>'JEFE DE COMISION',
            'descripcion_perfil'=>'',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Perfil as $Perfiles){
            if(!Perfil::find($Perfiles['id_perfil'])){
                DB::table('perfil')->insert($Perfiles);
            }
        } 
    }
}
