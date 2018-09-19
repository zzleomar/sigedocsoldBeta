<?php

use Illuminate\Database\Seeder;
Use App\States;
class StatesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $State=[[
            'id_state'=>'1' ,            
            'id_pais'=>'1',
            'nombre'=>'Sucre',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_state'=>'2' ,
            'id_pais'=>'2',
            'nombre'=>'Barcelona',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_state'=>'3' ,
            'id_pais'=>'2',
            'nombre'=>'Madrid',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_state'=>'4' ,
            'id_pais'=>'1',
            'nombre'=>'Anzoategui',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($State as $states){
            if(!States::find($states['id_state'])){
                DB::table('states')->insert($states);
            }
        }
    }
}
