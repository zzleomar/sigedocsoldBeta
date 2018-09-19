<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOficio extends Model
{
    protected $table = 'tipo_oficio';
    protected $primaryKey='id_tipo_oficio';
    protected $fillable=['nombre'];

}
