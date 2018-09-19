<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nom_Nucleo extends Model
{
   protected $table = 'nom_nucleo';
    protected $primaryKey = 'id_nom_nucleo';
    protected $fillable = [
        'nucleo_1','nucleo_2','descripcion'
    ];
}
