<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    public function run()
    {
        $status=[
            ['id_status'=>'1','name'=>'Aprobado'],
            ['id_status'=>'2','name'=>'Pendiente'],
            ['id_status'=>'3','name'=>'Suspendido'],
            ['id_status'=>'4','name'=>'Bloqueado']
        ];
        
        foreach($status as $statu){
            if(!Status::find($statu['id_status'])){
                DB::table('status')->insert($statu);
            }
        }
    }
}
