<?php

use Illuminate\Database\Seeder;
Use App\Municipios;
class MunicipiosTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $Municipio=[[
            'id_municipio'=>'1',
            'id_state'=>'1' ,            
            'id_pais'=>'1',
            'nombre'=>'Sucre',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_municipio'=>'2',
            'id_state'=>'1' ,            
            'id_pais'=>'1',
            'nombre'=>'Valdez',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05'],
         [
            'id_municipio'=>'3',
            'id_state'=>'1' ,            
            'id_pais'=>'1',
            'nombre'=>'Montes',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_municipio'=>'4',
            'id_state'=>'4' ,            
            'id_pais'=>'1',
            'nombre'=>'Sotillo',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
            ],[
            'id_municipio'=>'5',    
            'id_state'=>'3' ,
            'id_pais'=>'2',
            'nombre'=>'Comunidad De Madrid',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
                ],[
            'id_municipio'=>'6',    
            'id_state'=>'2' ,
            'id_pais'=>'2',
            'nombre'=>'Cataluña',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
                ]];
         foreach($Municipio as $Municipios){
            if(!Municipios::find($Municipios['id_municipio'])){
                DB::table('municipio')->insert($Municipios);
            }
        }
    }
}
