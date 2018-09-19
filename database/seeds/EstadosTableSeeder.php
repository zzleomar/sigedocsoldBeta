<?php

use Illuminate\Database\Seeder;
use App\Estado;
class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $Estados=[[
            'nombre'=>'Creado',
            'id_estados'=>'1',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'2',
            'nombre'=>'Enviado',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'3',
            'nombre'=>'Visto',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'4',
            'nombre'=>'Por Correcion',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'5',
            'nombre'=>'Corregido',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'6',
            'nombre'=>'Por Firmar',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'7',
            'nombre'=>'Firmado',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'8',
            'nombre'=>'Verificado',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'9',
            'nombre'=>'Entregado',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'10',
            'nombre'=>'Aprobado',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'11',
            'nombre'=>'Rechazado',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'12',
            'nombre'=>'Remitido',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'13',
            'nombre'=>'aperturado',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'14',
            'nombre'=>'cerrado',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ],[
            'id_estados'=>'15',
            'nombre'=>'asignado',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Estados as $status){
            if(!Estado::find($status['id_estados'])){
                DB::table('estados')->insert($status);
            }
        } 
}}
