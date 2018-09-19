<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $User=[[
            'id'=>'1',
            'status_id'=>'1',
            'id_nom_nucleo'=>'1',
            'id_dependencia'=>'58',
            'id_perfil'=>'1',
            'personal_id'=>'267',
            'name'=>'ebetancourt',
            'email'=>'ebetancourt@udo.edu.ve',
            'avatar'=>'udologo.png',
            'password'=>bcrypt('123456'),
            'created_at'=>'2018-06-20 17:00:00',
            'updated_at'=>'2018-06-20 17:00:00'
             ],[
            'id'=>'2',
            'status_id'=>'1',
            'id_nom_nucleo'=>'1',
            'id_dependencia'=>'58',
            'id_perfil'=>'7',
            'personal_id'=>'1662',
            'name'=>'mpagliarulo',
            'email'=>'mpagiarulo@udo.edu.ve',
            'avatar'=>'udologo.png',
            'password'=>bcrypt('123456'),
            'created_at'=>'2018-06-20 17:00:00',
            'updated_at'=>'2018-06-20 17:00:00'
            ]];
         foreach($User as $Usuarios){
            if(!User::find($Usuarios['id'])){
                DB::table('users')->insert($Usuarios);
            }
        } 
}}
