<?php

use Illuminate\Database\Seeder;
use App\Circular;
class CircularesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $Circular=[[
            'id_circular'=>'1',
            'id_documento'=>'1',
            'id_itemsubcategoria'=>'1',
            'nota_circular'=>'La consideracion debe ser debidamente justificada.',
            'para_circular'=>'PROFESORES DEL PROGRAMA DE LA LICENCIATURA EN INFORMATICA',
            'de_circular'=>'PROFA. DIANELINA AGUIAR (COORDINADORA)',
            'cuerpo_circular'=>'Estimados colegas si usted necesita que se tome en cuenta alguna consideración en la asignación de sus horas academicas para el venidero Semestre I-2013, favor enviarlo por correo a mas tardar el dia 01/02/2013.'
             . ''
             . 'Sin Otra particular y seguro de contar con su colaboracion, se despide. Gato motas',
             'numero'=>'8',
             'anio_circular'=>'2018',
            'created_at'=>'2017-05-21 10:48:05',
            'updated_at'=>'2017-05-21 10:48:05',
        ]];
         foreach($Circular as $circulares){
            if(!Circular::find($circulares['id_circular'])){
                DB::table('circular')->insert($circulares);
            }
    }
    }
}
