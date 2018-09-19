<?php

use Illuminate\Database\Seeder;
use App\Institucion;
class InstitucionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Institucion=[[
            'id_institucion'=>'1',
            'nombre_institucion'=>'Universidad De Oriente',
            'siglas_institucion'=>'UDO',
            'descripcion_institucion'=>'UNIVERSIDAD DE ORIENTE Nucleo de Sucre',
            'nucleo_institucion'=>'Nucleo de Sucre',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Institucion as $Instituciones){
            if(!Institucion::find($Instituciones['id_institucion'])){
                DB::table('institucion')->insert($Instituciones);
            }
        } 
    }
}