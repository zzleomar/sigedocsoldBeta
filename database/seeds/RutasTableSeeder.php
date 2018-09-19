<?php

use Illuminate\Database\Seeder;
use App\Ruta;
class RutasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Ruta=[[
            'id_ruta'=>'1',
            'id_estado'=>'1',
            'id_documento'=>'1',
            'id_dependencia'=>'2',
            'id_user'=>'4',
            'fecha'=>'2017-04-01',
           'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_ruta'=>'2',
            'id_estado'=>'2',
            'id_documento'=>'1',
            'id_dependencia'=>'2',
            'id_user'=>'3',
            'fecha'=>'2017-04-02',
           'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_ruta'=>'3',
            'id_estado'=>'3',
            'id_documento'=>'1',
            'id_dependencia'=>'2',
            'id_user'=>'3',
            'fecha'=>'2017-04-03',
           'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
        'id_ruta'=>'4',
            'id_estado'=>'4',
            'id_documento'=>'1',
            'id_dependencia'=>'2',
            'id_user'=>'4',
            'fecha'=>'2017-04-04',
           'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        
        ],[
        'id_ruta'=>'5',
            'id_estado'=>'5',
            'id_documento'=>'1',
            'id_dependencia'=>'2',
            'id_user'=>'4',
            'fecha'=>'2017-04-05',
           'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        
        ],[
        'id_ruta'=>'6',
            'id_estado'=>'6',
            'id_documento'=>'1',
            'id_dependencia'=>'2',
            'id_user'=>'3',
            'fecha'=>'2017-04-07',
           'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        
        ],[
        'id_ruta'=>'7',
            'id_estado'=>'7',
            'id_documento'=>'1',
            'id_dependencia'=>'2',
            'id_user'=>'3',
            'fecha'=>'2017-04-08',
           'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        
        ]];
         foreach($Ruta as $rutas){
            if(!Ruta::find($rutas['id_ruta'])){
                DB::table('ruta')->insert($rutas);
            }
    }
}
}