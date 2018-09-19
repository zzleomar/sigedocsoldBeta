<?php

use Illuminate\Database\Seeder;
Use App\Pais;
class PaisTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $Pais=[[
            'id_pais'=>'1',
            'nombre'=>'Venezuela',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_pais'=>'2',
            'nombre'=>'España',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Pais as $paises){
            if(!Pais::find($paises['id_pais'])){
                DB::table('pais')->insert($paises);
            }
        }
    }
}
