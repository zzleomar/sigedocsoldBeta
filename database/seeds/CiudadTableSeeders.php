<?php

use Illuminate\Database\Seeder;
Use App\Ciudades;
class CiudadTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $Ciudad=[[
            'id_ciudad'=>'1',
            'id_pais'=>'1',   
            'id_state'=>'1' ,            
            'id_municipio'=>'1',
            'nombre'=>'Cumana',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_ciudad'=>'2',
            'id_pais'=>'1',   
            'id_state'=>'1' , 
            'id_municipio'=>'2',
            'nombre'=>'Guiria',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',],[
            'id_ciudad'=>'3',
            'id_pais'=>'1',   
            'id_state'=>'1' ,            
            'id_municipio'=>'3',
            'nombre'=>'Cumanacoa',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_ciudad'=>'4',
            'id_pais'=>'1',   
            'id_state'=>'4' ,            
            'id_municipio'=>'4',
            'nombre'=>'Puerto La Cruz',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
            ],[
            'id_ciudad'=>'5',
            'id_pais'=>'2',   
            'id_state'=>'3' ,            
            'id_municipio'=>'5',
            'nombre'=>'Madrid',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
                ],[
                    'id_ciudad'=>'6',
            'id_pais'=>'2',   
            'id_state'=>'2' ,            
            'id_municipio'=>'6',
            'nombre'=>'Barcelona',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
                ],[
                    'id_ciudad'=>'7',
            'id_pais'=>'2',   
            'id_state'=>'2' ,            
            'id_municipio'=>'6',
            'nombre'=>'Girona/Gerona',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
                ]];
         foreach($Ciudad as $Ciudades){
            if(!Ciudades::find($Ciudades['id_ciudad'])){
                DB::table('ciudad')->insert($Ciudades);
            }
        }
    }
     
}
