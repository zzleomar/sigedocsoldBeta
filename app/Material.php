<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $primaryKey='id_material';
    protected $fillable=['codigo','descripcion','unidad_medida'];
}
